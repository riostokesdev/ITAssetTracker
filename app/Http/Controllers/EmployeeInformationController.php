<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use PHPUnit\Event\Event;

class EmployeeInformationController extends Controller
{


    public function createAsset(Request $request)
    {


       $asset = Asset::create([
            'asset_name' => $request->asset_name,
            'serial_number' => $request->serial_number,
            'fa_code' => $request->fa_code,
            'employee_id' => $request->employee_id,
        ]);

        return Redirect::route('assets');
    }

    public function fetchAsset()
    {
        $assets = Asset::all();

        return Inertia::render('Assets', [
            'assets' => $assets
        ]);
    }

    public function index($id)
    {
        $employee = Employee::whereid($id)->first();
        $asset = Employee::find($id)->Assets;

        return Inertia::render('EmployeeProfileView',[
            'employees' => $employee,
            'assets' => $asset
        ]);

    }
    public function deleteAsset($id)
    {
        $asset = Asset::find($id);
        $asset->delete();

        return Redirect::route('dashboard');

    }

    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return Redirect::route('dashboard');
    }


}
