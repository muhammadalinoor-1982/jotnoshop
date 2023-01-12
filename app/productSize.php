<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productSize extends Model
{
    public function size()
    {
        return $this->belongsTo(size::class,'size_id','id');
    }
}
