<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\AccountVerifyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
   public function register(Request $request)
   {
        $request->validate([
            'name'                  =>  'required|string|min:3|max:50',
            'email'                 =>  'required|email|unique:users,email',
            'password'              =>  'required|confirmed',
        ]);

        $user = User::create($request->only(['name','email'])
        +[
            'password'              =>  Hash::make($request->password),
            'email_verify_token'    =>  Str::random(64),
        ]);

        $user->notify(new AccountVerifyMail($user));
        
        return ok("Account Created Successfully");
   }

   public function verifyAccount($token)
   {

        $user = User::where('email_verify_token','=',$token)->first();
        if($user)
        {
            $user->update([
                'email_verify_token'    =>  null,
                'email_verified_at'     =>  now(),
                'is_active'             =>  true,
            ]);
            return ok('Account Verify Successfuly');
        }else{
            return ok('Account Already Verified');
        }
   }

   public function login(Request $request)
   {

        $request->validate([
            'email'                 =>  'required|email|exists:users,email',
            'password'              =>  'required',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password , 'is_active' => true]))
        {
            $user   =   auth()->user();
            $token  =  $user->createToken('API TOKEN')->plainTextToken;
            return ok('User Login Successfully',$token);
        }
        return ok('Invalid Email & Password');
   }
}
