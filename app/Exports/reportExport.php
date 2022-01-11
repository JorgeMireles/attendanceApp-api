<?php

namespace App\Exports;

use App\Models\Discipled_report;
use Maatwebsite\Excel\Concerns\FromCollection;

class reportExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {


        return Discipled_report::all();
    }
}
