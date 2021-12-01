<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/articles', [ArticleController::class, "getArticles"]);
Route::get('/articles/{id}', [ArticleController::class, "getOneArticle"]);

Route::post('/articles', [ArticleController::class, "store"]);

Route::put('/articles/{id}', [ArticleController::class, "updateArticle"]);

Route::delete('/articles/{id}', [ArticleController::class, "deleteArticle"]);
