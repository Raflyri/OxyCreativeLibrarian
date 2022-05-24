<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    public function issuebook()
    {
        return $this->hasMany(bookissue::Class, 'book_id');
    }
}
