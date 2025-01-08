<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'course_id',
        'teacher_type',
        'days',
    ];
}
