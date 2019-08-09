<?php

namespace App\Http\Controllers\API;

use App\Zone;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZoneController extends Controller
{
    public function index(){
        $zones = Zone::all();
        return response()->json(["data"=>$zones],200);
    }
}
