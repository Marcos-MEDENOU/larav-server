<?php

namespace App\Http\Controllers;

use App\Models\Blocks;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use function Laravel\Prompts\alert;

class PostController extends Controller
{
    protected $postRepository;
    public function show(Request $request, $slug)
    {
        // $post = $this->postRepository->getPostBySlug($slug);
        $post = Post::where('slug', '=', $slug)->firstOrFail()['content'];
        return view('testarticle', compact('post'));
    }
    public function status(Request $request)
    {
        redirect('/blog/posts');
        // dd($request);
    }
    
}
