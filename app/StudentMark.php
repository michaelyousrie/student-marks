<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    protected $fillable = [
        'student_id', 'subject_id', 'mark'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function getPcg()
    {
        return ($this->mark / $this->subject->max_mark) * 100 . '%';
    }
}
