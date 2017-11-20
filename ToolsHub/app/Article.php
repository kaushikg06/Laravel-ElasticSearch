<?php

namespace App;

use App\Search\Searchable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    use Searchable;
    protected $table = 'articles';
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = array(
        'title',
        'body',
        'tags',
        'repositorylink',
        'department'
    );
}
