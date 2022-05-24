<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    public function issuebook()
    {
        return $this->hasMany(bookissue::Class, 'student_id');
    }
}
