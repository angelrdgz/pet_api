<?php

namespace App\Http\Controllers;

use App\Job;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(){
        $tasks = Job::all();
        return view('admin.calendar', ["tasks"=>$tasks]);
    }
}
