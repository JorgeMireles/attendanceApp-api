<?php

namespace App\Http\Controllers;

use App\Models\disciple;
use App\Models\Discipled_report;
use App\Models\discipler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscipleController extends Controller

{
    public function getDiscipleByDisciple(Request $request){
        $disciples = DB::table('disciples')->select('disciples.id','members.name','members.lastname as lastName','ministries.name as ministryName')
            ->join('members','members.id','=','disciples.memberId')
            ->join('ministries','ministries.id','=','members.ministryId')
            ->where('disciplerId',"=",$request->input('disciplerId'))
            ->get();

        return response()->json([
            'data' => $disciples,
        ], 200);
    }

    public function getDisciples(){
        $disciples = DB::table('members')
            ->select(['disciples.id as discipleId','members.name as memberName', 'members.lastName as memberLastName','ministries.name as ministryName'])
            ->join('ministries','ministries.id','=','members.ministryId')
            ->join('disciples', 'disciples.memberId', '=', 'members.id')
            ->get();
        return response()->json([
            'data' => $disciples,
        ], 200);
    }

    public function assignDisciple(Request $request){
        $disciple = new disciple();
        $disciple->memberId = $request->input('memberId');
        $disciple->disciplerId = $request->input('disciplerId');
        $disciple->active = true;
        $disciple->save();

        return response()->json([
            'message' => 'Discipulo Creado',
        ], 200);
    }

    public function transferDisciple(Request $request){

        $disciple = DB::table('disciples')->where('id',$request->input('discipleId'))->update(['disciplerId'=>$request->input('disciplerId')]);



        return response()->json([
            'data' => $disciple,
        ], 200);
    }

    public function saveReport(Request $request){
        $report = new Discipled_report();
        $report->disciplerId = $request->input('disciplerId');
        $report->discipleId = $request->input('discipleId');
        $report->goalsId = $request->input('goalId');
        $report->lessonId = $request->input('lessonId');
        $report->lecture_report = $request->input('reading');
        $report->comments = $request->input('comments');
        $report->date = $request->input('date');
        $report->discipled_report = $request->input('active');
        $report->save();
        return response()->json([
            'message' => 'Reporte Enviado',
        ], 200);

    }

    public function deleteDisciple(Request $request){
        $withdraw = disciple::where('id',$request->input('discipleId'))->delete();

        return response()->json([
            'message' => 'Discipulo eliminado',
        ], 200);
    }

}
