<?php

namespace App\Http\Controllers;

use App\Imports\EmployeesImport;
use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::all();

        return view('employee.index', [
            'employees' =>  $employees
        ]);
    }

    public function import(Request $request) 
    {
        // Validate incoming request data
        $request->validate([
            'file' => 'required|max:2048',
        ]);
  
        Excel::import(new EmployeesImport, $request->file('file'));
                 
        return back()->with('success', 'Employee imported successfully.');
    }

    public function delete() {
        Employee::truncate();
        return back()->with('success', 'Employee deleted successfully.');
    }

    public function reset() {
        Employee::query()->update(['value' => 0]);
        return back()->with('success', 'Reset Value successfully.');
    }
}
