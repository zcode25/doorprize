<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    public function index() {
        $employees = Employee::where('value', 1)->orderBy('updated_at', 'desc')->get();

        return view('winner.index', [
            'employees' =>  $employees
        ]);
    }
}
