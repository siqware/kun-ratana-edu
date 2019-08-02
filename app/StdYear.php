<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StdYear extends Model
{
    public function year_std_detail(){
        return $this->hasOne(StdYearDetail::class);
    }
    /*view higher student list*/
    public function view_higher_students(){
        return $this->hasMany(StdYearDetail::class)->select(['id','std_year_id','student_id'])->with('students');
    }
}
