<?php

namespace App\Http\Controllers;

use App\Models\ministries;
use App\Models\roles;
use Illuminate\Http\Request;

class roleController extends Controller
{
    public function roleController(){
        $role = roles::select('id','name')->get();

        return response()->json([
            'data' => $role,
        ], 200);
    }

}
