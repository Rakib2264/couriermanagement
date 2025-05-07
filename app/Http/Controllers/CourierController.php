<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function index()
    {
        $packages = Package::where('courier_id', auth()->id())
            ->whereIn('status', ['pending', 'In Transit'])
            ->get();

        return view('courier.dashboard', compact('packages'));
    }

    public function updateStatus(Request $request, $id)
    {
        $package = Package::findOrFail($id);
        $package->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status updated');
    }
}
