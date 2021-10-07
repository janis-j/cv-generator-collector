<?php

namespace App\Http\Controllers;

use App\Services\CvListService;

class CvListController extends Controller
{
    private CvListService $cvListService;

    public function __construct(CvListService $cvListService)
    {
        $this->cvListService = $cvListService;
    }

    public function main()
    {
        return view('/cv_list',[
            'users' => $this->cvListService->getUsers()->sortable()->paginate(10)
        ]);
    }
}
