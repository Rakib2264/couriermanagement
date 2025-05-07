<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\User;

class TrackController extends Controller
{
    public function showTrackForm()
    {
        return view('track');
    }

    public function track(Request $request)
    {
        $request->validate([
            'tracking_number' => 'required'
        ]);

        $package = Package::with('courier')
            ->where('tracking_number', $request->tracking_number)
            ->first();
        return view('tracking-result', compact('package'));
    }
}
