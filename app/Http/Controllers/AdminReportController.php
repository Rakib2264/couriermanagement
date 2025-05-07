<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminReportController extends Controller
{
    public function index()
    {
     $statusCounts = Package::select('status', DB::raw('count(*) as total'))
     ->groupBy('status')
     ->get();

    $couriers = User::where('role', 'courier')
    ->withCount(['packages as delivered_count' => function ($query) {
    $query->where('status', 'Delivered');
    }])->get();

        return view('admin.reports', compact('statusCounts', 'couriers'));
    }
}
