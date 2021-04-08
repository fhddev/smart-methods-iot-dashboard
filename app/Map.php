<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    //
    public function sides() {
        return $this->belongsToMany('App\Side', 'catalog_map_side', 'map_id', 'side_id')->withPivot('meters', 'move_order')->orderBy('move_order', 'ASC');
    }
}
