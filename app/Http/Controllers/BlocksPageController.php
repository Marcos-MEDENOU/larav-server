<?php

namespace App\Http\Controllers;

use App\Models\BlocksPage;
use Illuminate\Http\Request;
use Dotlogics\Grapesjs\App\Traits\EditorTrait;
use Inertia\Inertia;

class BlocksPageController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('homebody', ["name" => "Aymar"]);
    }

 }
