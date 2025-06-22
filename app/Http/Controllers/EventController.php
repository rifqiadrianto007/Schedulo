<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use App\Models\Venue;

class EventController extends Controller
{
    public function showPendingEvents()
    {
        $events = Event::whereIn('status', ['Belum Disetujui', 'Revisi'])->get();
        return view('admPengajuanEvent', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('admFormDataEvent', compact('event'));
    }

    public function updateStatus(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $event->status = $request->input('status');

        if ($request->input('status') === 'Revisi') {
            $event->catatan_admin = $request->input('catatan_admin');
        }

        $event->save();

        return redirect()->route('admEvent')->with('success', 'Status event berhasil diperbarui.');
    }

    public function homepage()
    {
        $events = Event::where('status', 'Disetujui')->latest()->take(6)->get();
        return view('home', compact('events'));
    }

    public function showAdmEvent()
    {
        $events = Event::where('status', 'Disetujui')->orderBy('tanggal_pelaksanaan', 'desc')->get();
        return view('event', compact('events'));
    }

    // public function showEvent() {
    //     $events = Event::all();
    //     return view('eventStatus', compact('events'));
    // }

    public function create()
    {
        $venues = Venue::all();
        return view('formEvent', compact('venues'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelaksana' => 'required|string|max:255',
            'nim_nip' => 'required|string|max:50',
            'nama_kegiatan' => 'required|string|max:255',
            'jenis_kegiatan' => 'required|in:Seminar,Workshop,Konferensi,Pelatihan',
            'narasumber_pemateri' => 'required|string|max:510',
            'tanggal_pelaksanaan' => 'required|date',
            'tempat_kegiatan' => 'required|exists:venues,nama_tempat',
            'link_zoom' => 'nullable|url',
            'biaya_pendaftaran' => 'nullable|numeric',
            'tenggat_pendaftaran' => 'required|date',
            'link_form' => 'required|url',
            'kuota' => 'required|numeric',
            'deskripsi' => 'required|string|max:1000',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'contact' => 'required|regex:/^[0-9]+$/|min:9|max:15',
        ]);

        $path = $request->file('poster')->store('events', 'public');

        $event = Event::create([
            'nama_pelaksana' => $request->nama_pelaksana,
            'nim_nip' => $request->nim_nip,
            'nama_kegiatan' => $request->nama_kegiatan,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'narasumber_pemateri' => $request->narasumber_pemateri,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'tempat_kegiatan' => $request->tempat_kegiatan,
            'link_zoom' => $request->link_zoom ?: null,
            'biaya_pendaftaran' => $request->biaya_pendaftaran ?? 0,
            'tenggat_pendaftaran' => $request->tenggat_pendaftaran,
            'link_form' => $request->link_form,
            'kuota' => $request->kuota,
            'deskripsi' => $request->deskripsi,
            'poster' => $path,
            'contact' => $request->contact,
            'status' => 'Belum Disetujui',
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('eventStatus')->with('success', 'Berhasil mengajukan event');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $event->user_id !== Auth::id() ? abort(403, 'Unauthorized action.') : null;
        return view('editEvent', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $event->nama_pelaksana = $request->nama_pelaksana;
        $event->nim_nip = $request->nim_nip;
        $event->nama_kegiatan = $request->nama_kegiatan;
        $event->jenis_kegiatan = $request->jenis_kegiatan;
        $event->narasumber_pemateri = $request->narasumber_pemateri;
        $event->tanggal_pelaksanaan = $request->tanggal_pelaksanaan;
        $event->tempat_kegiatan = $request->tempat_kegiatan;
        $event->link_zoom = $request->link_zoom;
        $event->biaya_pendaftaran = $request->biaya_pendaftaran;
        $event->tenggat_pendaftaran = $request->tenggat_pendaftaran;
        $event->link_form = $request->link_form;
        $event->kuota = $request->kuota;
        $event->deskripsi = $request->deskripsi;
        $event->contact = $request->contact;
        $event->status = 'Belum Disetujui';
        $event->catatan_admin = null;

        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('posters', 'public');
            $event->poster = $path;
        }

        $event->save();

        return redirect()->route('eventStatus')->with('success', 'Data berhasil diperbarui.');
    }

    public function eventList()
    {
        $events = Event::where('status', 'Disetujui')->get();

        return view('admEvent', compact('events'));
    }

    public function showDetail($id)
    {
        $event = Event::findOrFail($id);
        return view('eventDetailAdm', compact('event'));
    }

    public function showPublicDetail($id)
    {
        $event = Event::where('status', 'Disetujui')->findOrFail($id);
        return view('eventDetail', compact('event'));
    }

    public function fetchDetailAjax($id): JsonResponse
    {
        $event = Event::findOrFail($id);

        return response()->json([
            'id' => $event->id,
            'nama_kegiatan' => $event->nama_kegiatan,
            'tanggal_pelaksanaan' => \Carbon\Carbon::parse($event->tanggal_pelaksanaan)->translatedFormat('d F Y'),
            'tenggat_pendaftaran' => \Carbon\Carbon::parse($event->tenggat_pendaftaran)->translatedFormat('d F Y'),
            'kuota' => $event->kuota,
            'poster' => $event->poster,
            'deskripsi' => $event->deskripsi,
            'tempat_kegiatan' => $event->tempat_kegiatan,
            'narasumber_pemateri' => $event->narasumber_pemateri,
            'link_zoom' => $event->link_zoom,
            'biaya_pendaftaran' => $event->biaya_pendaftaran,
            'contact' => $event->contact_person,
            'nim_nip' => Auth::check() ? Auth::user()->nim ?? Auth::user()->nip : null
        ]);
    }
}
