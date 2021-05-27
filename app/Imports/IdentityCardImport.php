<?php

namespace App\Imports;

use App\Models\IdentityCard;
use Maatwebsite\Excel\Concerns\ToModel;

class IdentityCardImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new IdentityCard([
            'nik' => $row[0],
            'name' => $row[1],
            'born_at' => $row[2],
            'birth' => $row[3],
            'gender' => $row[4],
            'blood_type' => $row[5],
            'region' => $row[6],
            'is_married' => $row[7],
            'jobs' => $row[8],
            'nationality' => $row[9],
            'valid_until' => $row[10],
            'age' => $row[11]
        ]);
    }
}
