<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapMarker extends Model
{
    protected $fillable = ['name', 'address', 'lat', 'lng'];
}
