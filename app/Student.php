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

}
