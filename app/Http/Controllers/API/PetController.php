<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Auth;
use App\Pet;
use App\Http\Controllers\Controller;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
        return response()->json(['data'=>$pets]);
    }
}
