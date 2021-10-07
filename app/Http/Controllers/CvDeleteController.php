<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CvDeleteService;
use Illuminate\Http\RedirectResponse;

class CvDeleteController extends Controller
{
    private CvDeleteService $cvDeleteService;

    public function __construct(CvDeleteService $cvDeleteService)
    {
        $this->cvDeleteService = $cvDeleteService;
    }

    public function delete(User $id): RedirectResponse
    {
        $this->cvDeleteService->delete($id);
        return redirect('/')->with('message','CV is succesfully deleted!');
    }
}
