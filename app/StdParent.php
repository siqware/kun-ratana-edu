<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StdParent extends Model
{
    protected $fillable = ['name','job','parent_type','tel'];
}
