<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class wellcomeController extends Controller
{
   public function index(){
       return view("welcome");
   }
   
}
