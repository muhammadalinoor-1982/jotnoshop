<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productWeight extends Model
{
    public function weight()
    {
        return $this->belongsTo(weight::class,'weight_id','id');
    }
}
