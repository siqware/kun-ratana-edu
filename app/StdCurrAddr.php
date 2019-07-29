<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StdCurrAddr extends Model
{
    protected $fillable = ['village','commune','district','province'];
}
