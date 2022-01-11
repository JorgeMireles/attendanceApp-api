<?php

namespace App\Http\Controllers;

use App\Models\ministries;
use Illuminate\Http\Request;

class ministriesController extends Controller
{
    public function getMinistries(){
        $ministry = ministries::select('id','name')->get();

        return response()->json([
            'data' => $ministry,
        ], 200);
    }
}
