<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ZoneService;
use App\Service;

class ServiceController extends Controller
{
    
    public function getServices($id){
        $servicesIds = ZoneService::where('zone_id', $id)->pluck('service_id');
        $services = Service::whereIn('id', $servicesIds)->get();
        foreach ($services as $key => $service) {
            $service->price = ZoneService::where('service_id', $service->id)->where('zone_id', $id)->first()->price;
        }
        return response()->json(['data' => $services], 200);
    }    
}
