<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

    /**
     * login request.
     *
     * @param Request $request
     * @return type
     */
    protected function login(Request $request) {

        $validator = Validator::make(Input::all(), [
                    'uname' => 'required|string|max:255',
                    'password' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::to("")
                            ->withErrors($validator);
        }
        if (Auth::attempt(['email' => Input::get('uname'), 'password' => Input::get('password')])) {
            
        }
        return Redirect::to("")
                 ->with('message', 'Invalid Email or Password!');   
    }

}
