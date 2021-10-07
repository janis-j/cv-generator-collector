<?php

namespace App\Services;

use App\Models\Education;
use App\Models\User;
use App\Models\WorkExperiance;

class CvCreateService
{
    private User $user;

    public function userCreate(array $request)
    {
        $this->user = new User($request);
        $this->user->save();
    }

    public function addEducation(array $request)
    {
        foreach($request['school_name'] as $key => $value){
            $education = new Education(
                [
                    'user_id' => $this->user->id,
                    'school_name' => $value,
                    'course_name' => $request['course_name'][$key],
                    'education_level' => $request['education_level'][$key],
                    'education_from' => $request['education_from'][$key],
                    'education_to' => $request['education_to'][$key],
                    'education_description' => $request['education_description'][$key]
                ]);
            $education->save();
        }
    }

    public function addWork(array $request)
    {
        foreach($request['company_name'] as $key => $value){
            $work = new WorkExperiance(
                [
                    'user_id' => $this->user->id,
                    'company_name' => $value,
                    'job_title' => $request['job_title'][$key],
                    'working_hours' => $request['working_hours'][$key],
                    'work_from' => $request['work_from'][$key],
                    'work_to' => $request['work_to'][$key],
                    'work_description' => $request['work_description'][$key]
                ]);
            $work->save();
        }
    }
}
