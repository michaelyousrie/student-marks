<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name', 'max_mark'
    ];

    public function acceptsMark($mark)
    {
        if ($mark > $this->max_mark) {
            return false;
        }

        return true;
    }
}
