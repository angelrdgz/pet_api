<?php

namespace App\Http\Controllers;

use App\Service;

use Validator;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', ['services' => $services]);
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
            ],
            [
                "name.required" => "El nombre es requerido",
            ]
        );

        $service = new Service();
        $service->name = $request->name;
        $service->save();

        return redirect('admin/servicios')->with('success-message', 'Servicio guardado correctamente');
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.services.edit', ["service"=>$service]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
            ],
            [
                "name.required" => "El nombre es requerido",
            ]
        );

        $service = Service::find($id);
        $service->name = $request->name;
        $service->save();

        return redirect('admin/servicios')->with('success-message', 'Servicio modificado correctamente');
    }
}
