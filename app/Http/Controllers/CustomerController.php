<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Traits\ListingApiTrait;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    use ListingApiTrait;

    public function list(Request $request)
    {
        $this->ListingValidation();

        $query = Customer::query();
        $searchable_fields = ['name'];

        $data = $this->filterSearchPagination($query,$searchable_fields);
        return ok('data',[
            'customerList'  =>  $data['query']->get(),
            'count'     =>  $data['count'],
        ]);      
    }

    public function get($id)
    {
        $shop = Customer::with('shop','city')->withCount('city AS No-Of-City')->findOrFail($id);
        return ok('Shop Data',$shop);
    }
}
