<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Traits\ListingApiTrait;
use Illuminate\Http\Request;

class CityController extends Controller
{
    use ListingApiTrait;

    public function list(Request $request)
    {
        $this->ListingValidation();

        $query = City::query();
        $searchable_fields = ['name','pincode','created_at'];
        
        $data = $this->filterSearchPagination($query,$searchable_fields);

       return ok('City List',[
            'cities'    => $data['query']->get(),
            'count'     => $data['count'],
        ]);
    }

    public function get($id)
    {
        $city = City::with('shops','customers','state')->withCount('shops')->findOrFail($id);
        return ok('City Data',$city);
    }
}
