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

    public function payment()
    {
        return $this->belongsTo(payment::class,'payment_id','id');
    }

    public function shipping()
    {
        return $this->belongsTo(shipping::class,'shipping_id','id');
    }

    public function orderDetails()
    {
        return $this->hasMany(order_detail::class,'order_id','id');
    }
}
