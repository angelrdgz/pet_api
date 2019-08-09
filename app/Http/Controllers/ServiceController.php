<?php

namespace App\Http\Controllers;

use App\Service;

use Validator;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('admin.services.index', ['services'=>$services]);
    }

    public function create(){
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $service = new Service();
        $service->name = $request->name;
        $service->save();

        return redirect('admin/servicios')->with('success-message', 'Servicio guardado correctamente');

    }
}
