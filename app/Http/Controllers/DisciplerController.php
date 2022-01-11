<?php

namespace App\Http\Controllers;

use App\Models\discipler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisciplerController extends Controller
{
    public function getDisciplers(){
        $disciplers = DB::table('members')
            ->select(['members.id as memberId','disciplers.id as disciplerId' ,'members.name', 'members.lastName','ministries.name as ministryName'])
            ->join('ministries','ministries.id','=','members.ministryId')
            ->join('disciplers', 'disciplers.memberId', '=', 'members.id')
            ->get();
        return response()->json([
            'data' => $disciplers
        ], 200);
    }

    public function assignDiscipler(Request $request){
        $discipler = new discipler();
        $discipler->memberId = $request->input('memberId');
        $discipler->active = true;
        $discipler->save();

        return response()->json([
            'message' => 'Discipulador Creado',
        ], 200);
    }


}
