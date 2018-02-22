<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Validator;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }/*

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function showLogin(){
        return View::make('login');
    }

    public function doLogin(){
        $rules = array(
            'user'      => 'required|alphaNum',
            'password'  => 'required|alphaNum|min:5'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){

            return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));

        }else{

            $userdata = array(
                    'user'      => Input::get('user'),
                    'password'  => Input::get('password')
                );

            if(Auth::attempt($userdata)){

                echo 'SUCCES!';
            
            }else{

                return Redirect::to('login');
            }
        }

    }
}
