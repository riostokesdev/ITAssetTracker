<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Asset;
use Inertia\Inertia;

class StoreRoomController extends Controller
{
    public function fetchStoreRoomAssets()
    {
        $assets = Asset::where('employee_id', 1)->get();

        return Inertia::render('Storage', [
            'assets' => $assets
        ]);
    }
}
