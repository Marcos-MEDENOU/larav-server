<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeBobyController extends Controller
{
    //
    public function index(){
       
        return Inertia::render('homebody', ["name" => "Aymar"]);
    }
}