<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTypeController;
use App\Http\Controllers\QuarryController;
use App\Http\Controllers\StoneController;
use App\Http\Controllers\StoneTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Middleware of localization
use App\Http\Middleware\LocaleMiddleware;

Route::middleware([LocaleMiddleware::class])->group(function () {

    Route::get('/setlocale/{locale}', function ($locale) {
        if (!in_array($locale, ['en', 'fa'])) {
            abort(400);
        }
        session(['locale' => $locale]);
        session()->save(); // Force session save
        return redirect()->back();
    });

});


//Articles
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/create', [ArticleController::class, 'create'])->middleware('auth');
Route::get('/articles/manage', [ArticleController::class, 'manage'])->middleware('auth');
Route::post('/articles', [ArticleController::class, 'store'])->middleware('auth');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->middleware('auth');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->middleware('auth');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->middleware('auth');
Route::get('/articles/{article}', [ArticleController::class, 'show']);

//projectTypes
Route::get('/projectTypes/create', [ProjectTypeController::class, 'create'])->middleware('auth');
Route::get('/projectTypes/manage', [ProjectTypeController::class, 'manage'])->middleware('auth');
Route::post('/projectTypes', [ProjectTypeController::class, 'store'])->middleware('auth');
Route::get('/projectTypes/{projectType}/edit', [ProjectTypeController::class, 'edit'])->middleware('auth');
Route::put('/projectTypes/{projectType}', [ProjectTypeController::class, 'update'])->middleware('auth');
Route::delete('/projectTypes/{projectType}', [ProjectTypeController::class, 'destroy'])->middleware('auth');

//stoneTypes
Route::get('/stoneTypes/create', [StoneTypeController::class, 'create'])->middleware('auth');
Route::get('/stoneTypes/manage', [StoneTypeController::class, 'manage'])->middleware('auth');
Route::post('/stoneTypes', [StoneTypeController::class, 'store'])->middleware('auth');
Route::get('/stoneTypes/{stoneType}/edit', [StoneTypeController::class, 'edit'])->middleware('auth');
Route::put('/stoneTypes/{stoneType}', [StoneTypeController::class, 'update'])->middleware('auth');
Route::delete('/stoneTypes/{stoneType}', [StoneTypeController::class, 'destroy'])->middleware('auth');

//quarries
Route::get('/quarries', [QuarryController::class, 'index']);
Route::get('/quarries/create', [QuarryController::class, 'create'])->middleware('auth');
Route::get('/quarries/manage', [QuarryController::class, 'manage'])->middleware('auth');
Route::post('/quarries', [QuarryController::class, 'store'])->middleware('auth');
Route::get('/quarries/{quarry}/edit', [QuarryController::class, 'edit'])->middleware('auth');
Route::put('/quarries/{quarry}', [QuarryController::class, 'update'])->middleware('auth');
Route::delete('/quarries/{quarry}', [QuarryController::class, 'destroy'])->middleware('auth');
Route::get('/quarries/{quarry}', [QuarryController::class, 'show']);

//projects
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/create', [ProjectController::class, 'create'])->middleware('auth');
Route::get('/projects/manage', [ProjectController::class, 'manage'])->middleware('auth');
Route::post('/projects', [ProjectController::class, 'store'])->middleware('auth');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->middleware('auth');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->middleware('auth');
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->middleware('auth');
Route::get('/projects/{project}', [ProjectController::class, 'show']);

//stones
Route::get('/stones', [StoneController::class, 'index']);
Route::get('/stones/create', [StoneController::class, 'create'])->middleware('auth');
Route::get('/stones/manage', [StoneController::class, 'manage'])->middleware('auth');
Route::post('/stones', [StoneController::class, 'store'])->middleware('auth');
Route::get('/stones/{stone}/edit', [StoneController::class, 'edit'])->middleware('auth');
Route::put('/stones/{stone}', [StoneController::class, 'update'])->middleware('auth');
Route::delete('/stones/{stone}', [StoneController::class, 'destroy'])->middleware('auth');
Route::get('/stones/{stone}', [StoneController::class, 'show']);

//home
Route::get('/', [HomeController::class, 'home']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/about', [HomeController::class, 'about']);


//user
Route::get('/user/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/user/logout', [UserController::class, 'logout']);
Route::post('/user/authenticate', [UserController::class, 'authenticate']);


