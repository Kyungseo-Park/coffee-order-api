<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class OfficeController extends Controller
{
    /**
     * Get Component Name and Component Description
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function office(Request $request)
    {
        // N개의 office 정보를 가지고 옴
        $service = Office::get();


        // 1개의 office 에서 연관관계가 있는 user의 컬럼을 가지고옴
        // foreach ($offices as $office) {
        //     $office->user;
        // }

        return view('welcome', compact('service'));
    }
}
