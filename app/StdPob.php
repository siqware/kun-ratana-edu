<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StdPob extends Model
{
    protected $fillable = ['village','commune','district','province','study_year'];
}
