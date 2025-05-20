<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    protected $table = 'student_courses';

    protected $fillable = [
        'student_id',
        'course_id',
        'enrolled_at',
        'progress',
    ];

    protected $casts = [
        'enrolled_at' => 'datetime',
       'progress' => 'integer',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
