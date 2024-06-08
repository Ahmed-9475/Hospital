<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interface\Services\ServicesRepositoryInterface;

class ServiceController extends Controller
{
    private $Service;

    public function __construct(ServicesRepositoryInterface $Service)
    {
        $this->Service = $Service;
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Service->index();

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        return $this->Service->store($request);

    }



        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        return $this->Service->update($request,$id);

    }

            /**
     * destroy the specified resource in storage.
     */
    public function destroy($id)
    {
        return $this->Service->destroy($id);

    }



}
