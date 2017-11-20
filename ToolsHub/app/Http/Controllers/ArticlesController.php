<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Article;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;


class ArticlesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function addScript() {
        $article = new Article();
        $article->title = addslashes(Input::get('title'));
        $article->body = addslashes(Input::get('script'));
        $article->tags = addslashes(Input::get('tags'));
        $article->repositorylink = addslashes(Input::get('repo'));
        $article->department = addslashes(Input::get('dept'));;
      //  $article->description = Input::get('desc');
        $article->save();
    }
    
}
