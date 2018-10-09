<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Dept extends Model
{
    //

    use softDeletes;
    
    protected $table='dept';
    protected $primaryKey='id';

}
