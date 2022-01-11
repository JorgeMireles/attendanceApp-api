<?php

namespace App\Http\Controllers;

use App\Models\members;
use App\Models\ministries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class memberController extends Controller
{
    public function getMembers() {
        $member = DB::table('members')
            ->select(['members.id','members.name', 'members.lastName','ministries.name as ministryName'],'ministries.id as ministryId')
            ->join('ministries', 'ministries.id', '=', 'members.ministryId')
            ->get();

        return response()->json([
            'data' => $member
        ], 200);
    }

    public function getMembersByMinistrie(Request $request){
        $members = DB::table('members')->select('name','lastname as lastName')
            ->where('ministryId',$request->input('ministryId'))->get();

        return response()->json([
            'data' => $members
        ], 200);
    }

    public function newMember(Request $request) {
        $member  = new members;
        $member->name = $request->input('name');
        $member->lastname = $request->input('lastname');
        $member->ministryId = $request->input('ministryId');
        $member->roleId = $request->input('roleId');
        $member->active = true;
        $member->save();

        return response()->json([
            'message' => 'Miembro Guardado',
        ], 200);
    }
}
