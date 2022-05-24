<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookissue extends Model
{
    public function student()
    {
        return $this->belongsTo(student::Class, 'student_id');
    }
    public function book()
    {
        return $this->belongsTo(book::Class, 'book_id');
    }
}
