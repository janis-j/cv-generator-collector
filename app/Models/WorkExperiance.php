<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperiance extends Model
{
    use HasFactory;

    public $table = "work_experiance";

    protected $fillable =
    [
        'user_id',
        'company_name',
        'job_title',
        'working_hours',
        'work_from',
        'work_to',
        'work_description'
    ];
}
