<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel,WithHeadingRow
{
    public function headings():array
    {
        return ['Id','Name','Email','Phone'];

    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'name'=>$row['name'],
            'email'=>$row['email'],
            'phone'=>$row['phone'],

        ]);
    }
}
