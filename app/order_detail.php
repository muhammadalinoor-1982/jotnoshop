<?php

namespace App;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->custom_id = IdGenerator::generate(['table' => 'order_details','field'=>'custom_id','length' => 20, 'prefix' =>'JNS-ODID-']);
        });
    }

    public function product()
    {
        return $this->belongsTo(product::class,'product_id','id');
    }

    public function weight()
    {
        return $this->belongsTo(weight::class,'weight_id','id');
    }
}