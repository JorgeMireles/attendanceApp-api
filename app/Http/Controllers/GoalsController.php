<?php

namespace App\Http\Controllers;

use App\Models\goals;
use Illuminate\Http\Request;

class GoalsController extends Controller
{
    public function getGoals (){
        $goals = goals::select('id','name')->get();

        return response()->json([
            'data' => $goals,
        ], 200);
    }
}
