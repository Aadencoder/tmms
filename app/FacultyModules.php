<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyModules extends Model
{
    //
    public function faculty() {
        return $this->hasMany('App\Faculty');
    }
}
