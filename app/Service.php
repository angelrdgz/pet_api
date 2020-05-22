<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function getPrice($zone, $service)
    {
        return $this->hasOne('App\ZoneService')->where('zone_id', $zone)->where('service_id', $service)->first();
    }
}
