<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * One-To-Many
     * City-Shop Relation
     */
    public function shops()
    {
        return $this->hasMany(Shop::class,'city_id','id');
    }

    /**
     * City-State Relationship
     */
    public function state()
    {
        return $this->belongsTo(State::class,'state_id','id');
    }

    /**
     * One-to-Many
     * City-Customer Relation
     */
    public function customers()
    {
        return $this->hasMany(Customer::class,'city_id','id');
    }
}
