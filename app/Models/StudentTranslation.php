<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentTranslation extends Model
{
    
    public $timestamps = false; 

    
    protected $fillable = ['name'];
    
     protected $table = 'student_translations';
}
