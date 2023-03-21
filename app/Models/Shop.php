<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    /**
     * One-To-Many
     * Shop-Customer Relationship
     */
    public function customers()
    {
        return $this->hasMany(Customer::class,'shop_id','id');
    }

    /**
     * Shop-City Relationship
     */
    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
}
