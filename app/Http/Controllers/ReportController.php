<?php

namespace App\Http\Controllers;

use App\Exports\reportExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function createReport(Request $request){

        $disciple = $request->input('disciple');


        return response()->json([
            'message' => 'ok',
        ], 200);

    }

    public function getExcel(){
        return Excel::download(new reportExport(), 'report.xlsx');
    }

}
