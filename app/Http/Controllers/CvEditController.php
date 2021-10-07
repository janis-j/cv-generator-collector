<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CvCreateService;
use App\Services\CvDeleteService;
use App\Services\CvEditService;
use Illuminate\Http\Request;

class CvEditController extends Controller
{
    private CvEditService $cvEditService;
    private CvDeleteService $cvDeleteService;
    private CvCreateService $cvCreateService;

    public function __construct(CvEditService $cvEditService, CvDeleteService $cvDeleteService, CvCreateService $cvCreateService)
    {
        $this->cvEditService = $cvEditService;
        $this->cvDeleteService = $cvDeleteService;
        $this->cvCreateService = $cvCreateService;
    }

    public function main(User $user)
    {
        $jobs = $this->cvEditService->getWork($user);
        $educations = $this->cvEditService->getEducation($user);
        return view('cv_edit',[
            'user' => $user,
            'jobs'=> $jobs,
            'educations' => $educations
        ]);
    }

    public function update(User $user, Request $request)
    {
        // echo "<pre>";
        // var_dump($request->all());die;
        $this->cvDeleteService->delete($user);
        $this->cvCreateService->userCreate($request->all());
        $this->cvCreateService->addEducation($request->all());
        $this->cvCreateService->addWork($request->all());

        return redirect('/')->with('message','CV has been updated successfully!');
    }
}
