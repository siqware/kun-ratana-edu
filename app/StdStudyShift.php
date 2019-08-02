<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StdStudyShift extends Model
{
    protected $fillable = ['time','grade','grade_type','study_year'];
}
