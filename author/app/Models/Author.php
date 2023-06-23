<?php

namespace App\Models;

use App\Models\Author;

use Illuminate\Database\Eloquent\Model;


class Author extends Model {

    protected $table = 'tblauthors';
    
    public $timestamps = false;

    protected $fillable = ['fullname', 'gender', 'birthday'];

    

    protected $primaryKey = 'id';
}