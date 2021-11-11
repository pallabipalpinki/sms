<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classst extends Model
{
    use HasFactory;
    protected $table="classsts";
    protected $fillable = [
        'teacher_id',
        'student_id',
        'subject',
        'starttime',
        'endtime',
        'date',
        'status',
    ];
}
