<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productColor extends Model
{
    public function color()
    {
        return $this->belongsTo(color::class,'color_id','id');
    }
}
