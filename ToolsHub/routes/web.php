<?php

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

use App\Articles\ArticlesRepository;
use App\Http\Controllers\ArticlesController;

Route::get('/', function () {
    return view('articles.index', [
        'articles' => App\Article::all(),
    ]);
})->name('index');

Route::get('/search', function (ArticlesRepository $repository) {

    if((string) request('q') == 'all' || (string) request('q') == "") {
        return view('articles.search', [
            'articles' => App\Article::all(),
        ]); 
    }
    else {
        $articles = $repository->search((string) request('q'));
        return view('articles.search', [
            'articles' => $articles,
        ]);
    }
    
});

Route::post('addScript', 'ArticlesController@addScript');