<?php

namespace App\Http\Controllers;

use App\Services\CvListService;
use Illuminate\View\View;

class CvListController extends Controller
{
    private CvListService $cvListService;

    public function __construct(CvListService $cvListService)
    {
        $this->cvListService = $cvListService;
    }

    public function main(): View
    {
        return view('/cv_list',[
            'users' => $this->cvListService->getUsers()->sortable()->paginate(10)
        ]);
    }
}
