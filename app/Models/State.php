<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    /**
     * One-to-Many
     * State-City Relation
     */
    public function citys()
    {
        return $this->hasMany(City::class,'state_id','id');
    }

    /**
     * State-Country Relation
     */
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
