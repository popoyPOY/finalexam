<?php

namespace App\Models;

use App\Models\Author;

use Illuminate\Database\Eloquent\Model;


class Author extends Model {

    protected $table = 'tblauthors';


    //protected $fillable = ['jobid', 'jobname'];

    public $timestamp = false;

    protected $primaryKey = 'id';

}