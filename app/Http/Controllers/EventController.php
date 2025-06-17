<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class EventController extends Controller {
    public function showAdmEvent() {
        $events = Event::all()->map(function($event) {
            $event->tanggal_formatted = date('d-m-Y', strtotime($event->tanggal_pelaksanaan));
            $event->biaya_label = $event->biaya_pendaftaran ? 'Rp ' . number_format($event->biaya_pendaftaran, 0, ',', '.') : 'Gratis';
            $event->tenggat_formatted = date('d-m-Y', strtotime($event->tenggat_pendaftaran));
            $event->image = asset('storage/' . $event->poster);
            $event->contact_link = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $event->contact);
            return $event;
        });

        return view('event', compact('events'));
    }

    public function showEvent() {
        $events = Event::all();
        return view('eventStatus', compact('events'));
    }

    public function create() {
        return view('formEvent');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_pelaksana' => 'required|string|max:255',
            'nim_nip' => 'required|string|max:50',
            'nama_kegiatan' => 'required|string|max:255',
            'jenis_kegiatan' => 'required|in:Seminar,Workshop,Konferensi,Pelatihan',
            'narasumber_pemateri' => 'required|string|max:50',
            'tanggal_pelaksanaan' => 'required|date',
            'tempat_kegiatan' => 'required|in:Ruang Kuliah B1 & B2,Aula Utama,Laboratorium,Online',
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
        ]);

        return redirect()->route('eventStatus')->with('success', 'Berhasil mengajukan event');
    }

    public function edit($id) {
        $event = Event::findOrFail($id);
        return view('editEvent', compact('event'));
    }

    public function update (Request $request, $id) {
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

        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('posters', 'public');
            $event->poster = $path;
        }

        $event->save();

        return redirect()->route('eventStatus')->with('success', 'Data berhasil diperbarui.');
    }
}
