<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\siteService;

class site1Controller extends Controller
{
     use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @var siteService
     */

     public $siteService;

    public function __construct(siteService $siteService)
    {
        $this->siteService = $siteService;
    }


    public function Books() 
    {
        return $this->successResponse($this->siteService->show());
    }

    public function showBook($id) 
    {
        return $this->successResponse($this->siteService->showUser($id));
    }

    public function createBook(Request $request) {
        return $this->successResponse($this->siteService->addUser($request->all()));
    }
    
    public function deleteBook($id) {
        return $this->successResponse($this->siteService->deleteUser($id));
    }

    public function updateBook(Request $data, $id) {
        return $this->successResponse($this->siteService->updateUser($data->all(), $id));
    }
}
