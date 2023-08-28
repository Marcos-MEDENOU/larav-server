<?php

namespace App\Http\Controllers;

use App\Models\Blocks;
use App\Models\Blog\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    //
    public function index(){
        /*$articles = Post::latest()->take(3)->get();
         $data= Blocks::all();
         return inertia('Home', [
             'articles' => $articles,
             'data'=>$data,
         ]);*/
         return inertia('Home');
    }


   
    public function blog(){
       
        return Inertia::render('Bloging');
    }

    public function smbuilder(){
        return Inertia::render('Smbuilder');
    }
    public function LeGroupe(){
        return Inertia::render('LeGroupe');
    }
    public function RSE(){
        return Inertia::render('RSE');
    }
    public function vousaccompagner(){
        return Inertia::render('vousaccompagner');
    }
    public function prestations(){
        return Inertia::render('Prestations');
    }
    public function mentionslegales(){
        return Inertia::render('mentionslegales');
    }
    public function recrutements(){
        return Inertia::render('Recrutements');
    }
    public function contact(){
        return Inertia::render('Contact');
    }
    public function politique(){
        return Inertia::render('Politique');
    }
    public function plan(){
        return Inertia::render('Plan');
    }

    public function notFound()
    {
        return Inertia::render('Error')->toResponse(request())->setStatusCode(404);
    }
}

