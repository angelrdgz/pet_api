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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'services'=>'required|array'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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

    public function edit(){

    }

    public function update(){}
    public function destroy(){}
}
