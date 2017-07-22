<?php

namespace App\Http\Controllers;

use Hash;
use App\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Input;

class UserController extends Controller
{
    public function registerUsers () 
    {
    	$user = new User;

    	$user->first_name =Input::get('first_name');
    	$user->last_name =Input::get('last_name');
    	$user->email =Input::get('email');
    	$user->telephone_number =Input::get('telephone_number');
    	$user->store_type =Input::get('store_type');
    	$user->user_type =Input::get('user_type');
    	$user->password =Hash::make(Input::get('password'));

    	$user->save();

    	return redirect ('/users');
    }
}
