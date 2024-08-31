<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class DoorprizeController extends Controller
{
    public function index() {

        $employees = Employee::where('value', 0)->get();

        return view('doorprize.index', [
            'employees' => $employees
        ]);
    }

    public function doorprize(Request $request) {
        // dd($request);
        Employee::where('employeeId', $request->winner_id)->update(['value' => 1]);
        return back();
    }
}
