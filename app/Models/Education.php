<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'school_name',
        'course_name',
        'education_level',
        'education_from',
        'education_to',
        'education_description'
    ];
}
