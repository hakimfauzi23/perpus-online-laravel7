<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Book extends Model
{
    use Sortable;
    //
    protected $fillable = ['author','title','category','publisher','year_released'];

    public $sortable = ['id','author','title','category','publisher','year_released','created_at', 'updated_at'];
}
