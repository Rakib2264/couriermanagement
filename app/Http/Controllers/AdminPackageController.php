<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = Package::with('courier')->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        $couriers = User::where('role', 'courier')->get();
        return view('admin.packages.create', compact('couriers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sender_name' => 'required',
            'receiver_name' => 'required',
            'pickup_address' => 'required',
            'delivery_address' => 'required',
            'courier_id' => 'required|exists:users,id',
        ]);

        $validated['tracking_number'] = 'RAKIBUL' . uniqid();
        $validated['status'] = 'pending';

        Package::create($validated);
        return redirect()->route('packages.index');
    }

    public function show(Package $package)
    {
        return view('admin.packages.show', compact('package'));
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $couriers = User::where('role', 'courier')->get();
        return view('admin.packages.edit', compact('package', 'couriers'));
    }

    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'sender_name' => 'required',
            'receiver_name' => 'required',
            'pickup_address' => 'required',
            'delivery_address' => 'required',
            'courier_id' => 'required|exists:users,id',
        ]);

        $package->update($validated);

        return redirect()->route('packages.index');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index');
    }
}
