<?php

namespace App\Http\Controllers;

use App\Models\lessons;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function getLessons () {
        $lessons = lessons::select('id','name')->get();

        return response()->json([
            'data' => $lessons,
        ], 200);
    }
}
