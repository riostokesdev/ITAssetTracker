<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;



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

        return Redirect::route('dashboard');


    }

    public function fetchEmployee()
    {
        $employees = Employee::where('id', '>', 1)->get();


        return Inertia::render('Dashboard',[
            'employees' => $employees
    ]);

    }
}
