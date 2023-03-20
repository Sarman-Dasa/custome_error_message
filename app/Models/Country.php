<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
    ];

    /**
     * One-To-many
     * Country-State Relation
     */
    public function states()
    {
        return $this->hasMany(State::class,'country_id','id');
    }

    /**
     * Has many
     * Country-city Relation 
     */
    public function citys()
    {
        return $this->hasManyThrough(City::class,State::class,'country_id','state_id','id','id');
    }

}
