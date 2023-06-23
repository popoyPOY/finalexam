<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\site2Service;

class site2Controller extends Controller
{
     use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @var site2Service
     */

     public $siteService;

    public function __construct(site2Service $siteService)
    {
        $this->siteService = $siteService;
    }


    public function Author() 
    {
        return $this->successResponse($this->siteService->show());
    }

    public function showAuthor($id) 
    {
        return $this->successResponse($this->siteService->showUser($id));
    }

    public function createAuthor(Request $request) {
        return $this->successResponse($this->siteService->addUser($request->all()));
    }
    
    public function deleteAuthor($id) {
        return $this->successResponse($this->siteService->deleteUser($id));
    }

    public function updateAuthor(Request $data, $id) {
        return $this->successResponse($this->siteService->updateUser($data->all(), $id));
    }
}
