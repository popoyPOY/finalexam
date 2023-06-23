<?php

namespace App\Models;

use App\Models\Book;

use Illuminate\Database\Eloquent\Model;


class Book extends Model {

    public $timestamps = false;

    protected $table = 'tblbooks';

    protected $fillable = [
        'bookname', 'yearpublish', 'authorid'
    ];

    protected $hidden =[];
}