<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    //
    public function modules() {
    	return $this->belongsTo('App\FacultyModules');
	}
}
