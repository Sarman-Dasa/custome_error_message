<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Traits\ListingApiTrait;
use Illuminate\Http\Request;

class StateController extends Controller
{
    use ListingApiTrait;

    public function list(Request $request)
    {
        $this->ListingValidation();

        $query = State::query();
        $searchable_fields = ['name','created_at'];
        
        $data = $this->filterSearchPagination($query,$searchable_fields);

       return ok('State List',[
            'states'    => $data['query']->get(),
            'count'     => $data['count'],
        ]);
    }

    public function get($id)
    {
        $state = State::with('country','citys')->withCount('citys AS Number-Of-Cities')->findOrFail($id);
        return ok('States Data',$state); 
    }
}
