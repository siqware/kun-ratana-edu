<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StdYearDetail extends Model
{
    protected $fillable = ['student_id','std_year_id'];
    public function students(){
        return $this->belongsTo(Student::class,'student_id','id')
            ->with(['show_pob','show_curr_addr','show_parents','show_contact','show_former_study','show_shift']);
    }
}
