<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Traits\ListingApiTrait;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    use ListingApiTrait;

    public function list(Request $request)
    {
        $this->ListingValidation();

        $query = Shop::query();
        $searchable_fields = ['name','mobile','email'];

        $data = $this->filterSearchPagination($query,$searchable_fields);
        return ok('data',[
            'shopList'  =>  $data['query']->get(),
            'count'     =>  $data['count'],
        ]);      
    }

    public function get($id)
    {
        $shop = Shop::with('city','customers')->findOrFail($id);
        return ok('Shop Data',$shop);
    }
}
