<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use AppTarjeta;
use App\User;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }
    public function prueba(){
       $user=User::find(3);
       return  $user;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   
}