<?php

namespace App\Interface\Services;


interface ServicesRepositoryInterface 
{
    // index Services view
    public function index();

    // store Services view
    public function store( $request);
    
    
    // update section view
    public function update($request,$id);
    
    // destroy section view
    public function destroy($id);
}