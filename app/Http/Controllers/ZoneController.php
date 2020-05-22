<?php

namespace App\Http\Controllers;

use App\Zone;
use App\ZoneService;
use App\Service;

use Validator;

use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index(){
        $zones = Zone::all();
        return view('admin.zones.index', ['zones'=>$zones]);
    }

    public function create()
    {
        $services = Service::all();
        return view('admin.zones.create', ['services'=>$services]);
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'services'=>'required|array'
            ],
            [
                "name.required" => "El nombre es requerido",
                "services.required" => "Es necesario agregar al menos un servicio",
            ]
        );

        $zone = new Zone();
        $zone->name = $request->name;
        $zone->save();

        foreach($request->services as $key => $service){
            $zoneService = new ZoneService();
            $zoneService->zone_id = $zone->id;
            $zoneService->service_id = $service;
            $zoneService->price = $request->prices[$key];
            $zoneService->save();
        }

        return redirect('admin/zonas')->with('success-message', 'Zona guardada correctamente');

    }

    public function edit($id)
    {
        $zone = Zone::find($id);
        $ids = Array();//$zone->services()->pluck('id');
        foreach ($zone->services()->pluck('service_id') as $key => $item) {
            $ids[$item] =  $item;
        }
        
        $services = Service::all();
        return view('admin.zones.edit', [ 'services'=>$services, "zone"=>$zone, 'ids'=>$ids]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'services'=>'required|array'
            ],
            [
                "name.required" => "El nombre es requerido",
                "services.required" => "Es necesario agregar al menos un servicio",
            ]
        );

        $zone = Zone::find($id);
        $zone->name = $request->name;
        $zone->save();

        $zone->services()->delete();

        foreach($request->services as $key => $service){
            $zoneService = new ZoneService();
            $zoneService->zone_id = $zone->id;
            $zoneService->service_id = $service;
            $zoneService->price = $request->prices[$key];
            $zoneService->save();
        }

        return redirect('admin/zonas')->with('success-message', 'Zona modificada correctamente');

    }
    public function destroy(){}
}
