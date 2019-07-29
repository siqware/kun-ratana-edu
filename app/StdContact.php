<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StdContact extends Model
{
    protected $fillable = ['tel','fb','email','line'];
}
