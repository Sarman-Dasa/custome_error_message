<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Traits\ListingApiTrait;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    use ListingApiTrait;

    public function list(Request $request)
    {
        $this->ListingValidation();

        $query = Country::query();

        $searchable_fields = ['name','created_at'];
        $data = $this->filterSearchPagination($query,$searchable_fields);

        return ok('Country List',[
            'countrys'  => $data['query']->get(),
            'count'     => $data['count'], 
        ]);
    }

    public function get($id)
    {
        $country = Country::with('states','citys')->withCount('states AS Number-Of-States','citys AS Number-Of-Cities')->findOrFail($id);
        return ok('Country Data',$country); 
    }
}
