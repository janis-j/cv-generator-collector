<?php

namespace App\Services;

use App\Models\Education;
use App\Models\User;
use App\Models\WorkExperiance;

class CvDeleteService
{
    private User $user;
    private Education $education;
    private WorkExperiance $workExperiance;

    public function __construct(User $user, Education $education, WorkExperiance $workExperiance)
    {
        $this->user = $user;
        $this->education = $education;
        $this->workExperiance = $workExperiance;
    }

    public function delete(User $user): void
    {
        $userId = $user->id;
        $educations = $this->education->where('user_id', $userId)->get();
        foreach($educations as $education){
            $education->delete();
        }
        $experiances = $this->workExperiance->where('user_id', $userId)->get();
        foreach($experiances as $experiance){
            $experiance->delete();
        }
        $user->delete();
    }
}
