<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;
use Illuminate\Support\Facades\Storage;

class VenueController extends Controller
{
public function showUserVenue()
{
    $venues = Venue::all()->map(function($venue) {
        $venue->facilities = array_map('trim', explode(',', $venue->fasilitas));
        $venue->rules = array_map('trim', explode(',', $venue->ketentuan));
        $venue->image = asset('storage/' . $venue->gambar_venue);
        return $venue;
    });

    return view('venue', compact('venues'));
}
    public function index()
{
    $venues = Venue::all();
    return view('admVenue', compact('venues'));
}
    public function create()
    {
        return view('admTambahVenue');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'fasilitas' => 'required|string',
            'ketentuan' => 'required|string',
            'gambar_venue' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('gambar_venue')->store('venues', 'public');

        Venue::create([
            'nama_tempat' => $request->nama_tempat,
            'alamat' => $request->alamat,
            'fasilitas' => $request->fasilitas,
            'ketentuan' => $request->ketentuan,
            'gambar_venue' => $path,
        ]);

        return redirect()->route('admVenue')->with('success', 'Venue berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $venue = Venue::findOrFail($id);
        return view('admEditVenue', compact('venue'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'fasilitas' => 'required|string',
            'ketentuan' => 'required|string',
            'gambar_venue' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $venue = Venue::findOrFail($id);

        if ($request->hasFile('gambar_venue')) {
            if ($venue->gambar_venue && Storage::disk('public')->exists($venue->gambar_venue)) {
                Storage::disk('public')->delete($venue->gambar_venue);
            }

            $path = $request->file('gambar_venue')->store('venues', 'public');
            $venue->gambar_venue = $path;
        }

        $venue->nama_tempat = $request->nama_tempat;
        $venue->alamat = $request->alamat;
        $venue->fasilitas = $request->fasilitas;
        $venue->ketentuan = $request->ketentuan;
        $venue->save();

        return redirect()->route('admVenue')->with('success', 'Venue berhasil diupdate.');
    }

    public function destroy($id)
    {
        $venue = Venue::findOrFail($id);

        if ($venue->gambar_venue && Storage::disk('public')->exists($venue->gambar_venue)) {
            Storage::disk('public')->delete($venue->gambar_venue);
        }

        $venue->delete();

        return response()->json(['message' => 'Venue berhasil dihapus.'], 200);
    }

    public function showLokasi()
    {
        $venues = Venue::all();
        return view('event', compact('venues'));
}
}
