<?php

namespace App;

use App\Search\Searchable;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    //
    protected $table = 'ToolsHub';

    use Searchable;
    protected $casts = [
        'tags' => 'json',
    ];

}
