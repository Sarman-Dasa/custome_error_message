<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * Customer-Shop Relation
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id','id');
    }

    /**
     * Customer-city relation
     */
    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
}
