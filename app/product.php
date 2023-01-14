<?php

namespace App;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public const VALIDATION_RULES = [
        'category_id' => [
            'required',
            'array',
        ],
        'brand_id' => [
            'required',
            'array',
        ],
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->custom_id = IdGenerator::generate(['table' => 'products','field'=>'custom_id','length' => 8, 'prefix' =>'JNSP-']);
        });
    }

    public function category()
    {
        return $this->belongsTo(category::class,'category_id','name');
    }

    public function brand()
    {
        return $this->belongsTo(brand::class,'brand_id','name');
    }
}
