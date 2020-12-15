<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Member extends Model
{
    //
    use Sortable;

    protected $fillable = ['id','name','gender','birth_day','birth_place','address','phone_number','path'];

    public $sortable = ['id','name','phone_number','address'];


}
