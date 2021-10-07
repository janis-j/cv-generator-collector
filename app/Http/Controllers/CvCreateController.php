<?php

namespace App\Http\Controllers;

use App\Services\CvCreateService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCvRequest;
use Illuminate\View\View;

class CvCreateController extends Controller
{
    private CvCreateService $cvCreateService;

    public function __construct(CvCreateService $cvCreateService)
    {
        $this->cvCreateService = $cvCreateService;
    }

    public function main(): View
    {
        return view('/cv_create');
    }

    public function save(StoreCvRequest $request): RedirectResponse
    {
        $this->cvCreateService->userCreate($request->all());
        $this->cvCreateService->addEducation($request->all());
        $this->cvCreateService->addWork($request->all());

        return redirect('/')->with('message','New CV succesfully saved!');
    }
}
