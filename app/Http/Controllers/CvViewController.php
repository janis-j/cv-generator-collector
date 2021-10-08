<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CvEditService;
use Illuminate\View\View;

class CvViewController extends Controller
{
    private CvEditService $cvEditService;

    public function __construct(CvEditService $cvEditService)
    {
        $this->cvEditService = $cvEditService;
    }

    public function main(User $user): View
    {
        $jobs = $this->cvEditService->getWork($user);
        $educations = $this->cvEditService->getEducation($user);
        return view('cv_view',[
            'user' => $user,
            'jobs'=> $jobs,
            'educations' => $educations
        ]);
    }
}
