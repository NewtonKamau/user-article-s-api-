<?php

use Illuminate\Http\Request;
use App\Article;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//get all articles
Route::get('articles', function(){
return Article::all();
});

//find an article by id
Route::get('articles/{id}', function ($id) {
    return Article::find($id);
});


//post an article
Route::post('articles', function(Request $request){
return Article::create($request->all);
});

//update an article
Route::put('articles/{id}', function($id){
   $article = Article::findOrFail($id);
   $article->update($request->all());
});

//delete an article

Route::delete('article/{$id}', function($id){
    Article::find($id)->delete();
});


Route::get('articles', 'ArticleController@index');
Route::get('articles/{article}', 'ArticleController@show');
Route::post('articles', 'ArticleController@store');
Route::put('articles/{article}', 'ArticleController@update');
Route::delete('articles/{article}', 'ArticleController@delete');
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
