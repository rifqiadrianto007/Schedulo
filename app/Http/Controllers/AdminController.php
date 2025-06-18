<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Venue;

class AdminController extends Controller
{
    public function dashboard() {
        $totalEvent = Event::where('status', 'Disetujui')->count();
        $totalVenue = Venue::count();
        $totalAdmin = 1;

        return view('admDashboard', compact('totalEvent', 'totalVenue', 'totalAdmin'));
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admEvent')->with('success', 'Event berhasil dihapus.');
    }
}
