<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function pob(){
        return $this->hasOne(StdPob::class);
    }
    public function curr_addr(){
        return $this->hasOne(StdCurrAddr::class);
    }
    public function parents(){
        return $this->hasMany(StdParent::class);
    }
    public function contact(){
        return $this->hasOne(StdContact::class);
    }
    public function former_study(){
        return $this->hasOne(StdFormerStudy::class);
    }
    public function shift(){
        return $this->hasOne(StdStudyShift::class);
    }
    /*show*/
    public function show_pob(){
        return $this->hasOne(StdPob::class)->latest('created_at')->select(['student_id','village','commune','district','province']);
    }
    public function show_curr_addr(){
        return $this->hasOne(StdCurrAddr::class)->latest('created_at')->select(['student_id','village','commune','district','province']);
    }
    public function show_parents(){
        return $this->hasMany(StdParent::class)->latest('created_at')->select(['student_id','name','job','parent_type','tel']);
    }
    public function show_contact(){
        return $this->hasOne(StdContact::class)->latest('created_at')->select(['student_id','tel','fb','email','line']);
    }
    public function show_former_study(){
        return $this->hasOne(StdFormerStudy::class)->latest('created_at')->select(['student_id','grade','school','card_id']);
    }
    public function show_shift(){
        return $this->hasOne(StdStudyShift::class)->latest('created_at')->select(['student_id','time','grade']);
    }

}
