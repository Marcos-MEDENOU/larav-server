<?php

namespace App\Http\Controllers;

use App\Models\Blocks;
use App\Models\Blog\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Groupe extends Controller
{
    //
    public function LeGroupe(){
        return Inertia::render('LeGroupe');
    }
   
    public function blog(){
       
        return Inertia::render('Bloging');
    }

    public function smbuilder(){
        return Inertia::render('Smbuilder');
    }
}