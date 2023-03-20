<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ListingApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use ListingApiTrait;

    public function list(Request $request)
    {
        $this->ListingValidation();
        $query = User::query();
        $searchable_fields = ['name','email','created_at'];
        $data = $this->filterSearchPagination($query, $searchable_fields);
        return ok('User Data',[
            'users'=>$data['query']->get(),
            'count'=>$data['count']
        ]);
    }

    public function logout()
    {
       $user = auth()->user();
       $user->tokens()->delete();

       return ok('User Logout successfully');
    }
}
