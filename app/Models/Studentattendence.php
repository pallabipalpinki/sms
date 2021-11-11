<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentattendence extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'student_id',
        'attendence',
       
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    
}
