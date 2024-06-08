<?php

namespace App\Interface\Doctors;


interface DoctorRepositoryInterface 
{
    // index section view
    public function index();

    public function create();

    // store section view
    public function store( $request);

    public function edit($id);

    public function update($request,$id);
    
    public function update_password($request);
    public function update_status($request);
    public function destroy($id);
}