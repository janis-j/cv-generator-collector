<?php

namespace App\Services;

use App\Models\Education;
use App\Models\User;
use App\Models\WorkExperiance;
use Illuminate\Database\Eloquent\Collection;

class CvEditService
{
    private User $user;
    private Education $education;
    private WorkExperiance $workExperiance;

    public function __construct(User $user, Education $education, WorkExperiance $workExperiance)
    {
        $this->education = $education;
        $this->workExperiance = $workExperiance;
    }

    public function getUser(User $user): User
    {
        $this->user = $user;

        return $user;
    }

    public function getEducation(User $user): Collection
    {
        return $this->education->where('user_id', $user->id)->get();
    }

    public function getWork(User $user): Collection
    {
        return $this->workExperiance->where('user_id', $user->id)->get();
    }
}
