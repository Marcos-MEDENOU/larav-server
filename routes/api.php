<?php

use App\Http\Controllers\contact\StoreContactController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewslettersController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/blog/{id}', [PostController::class, 'blogshow'])->name('Home');
Route::get('/politique', [HomeController::class, 'politique'])->name('politique');


Route::name('display')->get('/view/{slug}', [PostController::class, 'show']);
Route::name('display')->get('/blocks/{block}', [PostController::class, 'blocks']);
Route::name('display')->get('/{page}', [PageController::class, 'show']);
Route::get('/api/actualite', [PostController::class, 'actualite']);

// Route::get('/categories/articles', [PostController::class, 'all_articles']);
Route::get('/categories/{category}/articles', [PostController::class, 'articles']);
Route::get('/home3Articles/articles', [PostController::class, 'getThreeLastArticles']);
Route::get('/HomeInfos/articles', [PostController::class, 'getHomeArticles']);
Route::get('/Actualites/data', [PostController::class, 'getActualiteData']);
Route::get('/articles/{id}', [PostController::class, 'getArticlesById']);

//Contact 
Route::post('/contact/store',[ContactController::class, 'store'])->name('contact.store');

Route::post('/store/contact',StoreContactController::class)->name('store.contact');

//Newsletters
Route::post('/newsletters/store',[NewslettersController::class, 'store'])->name('newsletters.store');