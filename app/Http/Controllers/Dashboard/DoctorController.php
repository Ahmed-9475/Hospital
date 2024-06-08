<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interface\Doctors\DoctorRepositoryInterface;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    private $Doctors;

    public function __construct(DoctorRepositoryInterface $Doctors)
    {
        $this->Doctors = $Doctors;
    }



    
    public function index()
    {
        return $this->Doctors->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Doctors->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Doctors->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->Doctors->edit( $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        return $this->Doctors->update($request,$id);
    }

    /**
     * update_password.
     */
    public function update_password(Request $request)
    {
        return $this->Doctors->update_password($request);
    }

    /**
     * update_password.
     */
    public function update_status(Request $request)
    {
        return $this->Doctors->update_status($request);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->Doctors->destroy($id);
    }
}