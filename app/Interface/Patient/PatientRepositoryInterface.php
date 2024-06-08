<?php

namespace App\Interface\Patient;


interface PatientRepositoryInterface 
{
    // index Services view
    public function index();

    // store Services view
    public function store( $request);

    // store Services view
    public function create();
    
   public function edit($id);

    // update section view
    public function update($request,$id);
    
    // destroy section view
   public function destroy($id);
}