<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'nip' => $row[0],
            'name' => $row[1],
            'position' => $row[2],
            'department' => $row[3],
            'unit' => $row[4],
            'value' => $row[5],
        ]);
    }
}
