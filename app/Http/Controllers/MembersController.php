<?php

namespace App\Http\Controllers;

use App\Models\members;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function getMembers() {
        $members = members::select('id','name','lastname')->get();

        return response()->json([
            'data' => $members,
        ], 200);
    }
}
