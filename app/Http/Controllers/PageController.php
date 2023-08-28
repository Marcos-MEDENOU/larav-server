<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    protected $postRepository;


    // public function getPostBySlug($slug)
    // {
    //     // Post for slug with user, tags and categories
    //     $post = Post::with('blog_post')->where('slug', '=', $slug)->firstOrFail();

    //     return $post;
    // }

    public function show($id){
    //    $post = $this->postRepository->getPostBySlug($slug);
       $page = Pages::where('id', '=', $id)->firstOrFail()['url'];
    
       return redirect($page);
    }
   
}


