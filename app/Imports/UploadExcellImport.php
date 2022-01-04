<?php

namespace App\Imports;

use App\Models\coininfos;
use Maatwebsite\Excel\Concerns\ToModel;

class UploadExcellImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new coininfos([
            //
        ]);
    }
}
