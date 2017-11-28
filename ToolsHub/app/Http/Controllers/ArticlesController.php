<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Article;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class ArticlesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function addScript() {
        $article = new Article();
        // retrieving input from the form using name attribute

        echo Input::get('titleIndex');
        if(Input::hasFile('attachFile')) {
            $file_name= Input::file('attachFile'); 
            $fp      = fopen($file_name, 'r');
            $content = fread($fp, filesize($file_name));
            $article->body = addslashes($content);
            echo  $content;
        }
        else {
            $article->body = addslashes(Input::get('bodyIndex'));
            echo $article->body;
        }
        $article->title = addslashes(Input::get('titleIndex'));
        $article->tags = addslashes(Input::get('tagsIndex'));
        $article->repositorylink = addslashes(Input::get('repoIndex'));
        $article->department = addslashes(Input::get('deptIndex'));
        $article->description = Input::get('descIndex');
        
        $article->save();
        
    }
    
}
