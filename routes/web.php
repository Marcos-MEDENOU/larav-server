<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
// use Illuminate\Support\Facades\Route;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlocksPageController;
use App\Http\Controllers\EditorController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewslettersController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('display')->get('/view/{slug}', [PostController::class, 'show']);
Route::get('/posts/status',[PostController::class, 'status'])->name('posts.status');