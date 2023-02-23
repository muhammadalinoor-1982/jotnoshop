<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class order extends Model
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->custom_id = IdGenerator::generate(['table' => 'orders','field'=>'custom_id','length' => 20, 'prefix' =>'JNS-OID-']);
        });
    }
}
