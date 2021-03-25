<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherDetails extends Model
{
    //
      public function nationality(){
    	return $this->belongsTo('App\Nationalities');
    }
      public function gender(){
    	return $this->belongsTo('App\Genders');
    }
      public function faculty(){
    	return $this->belongsTo('App\Faculties');
    }
      public function facultyModule(){
    	return $this->belongsTo('App\FacultyModules');
    }
}
