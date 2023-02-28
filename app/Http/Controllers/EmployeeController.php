<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    public function createEmployee(Request $request)
    {
        $employee = Employee::create([
            'name' => $request->name,
            'job_title' => $request->job_title,
            'manager' => $request->manager,
            'office' => $request->office,
        ]);

    }
}
