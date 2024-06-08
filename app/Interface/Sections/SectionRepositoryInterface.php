<?php

namespace App\Interface\Sections;


interface SectionRepositoryInterface 
{
    // index section view
    public function index();

    // store section view
    public function store( $request);
    
    // show doctors section view
    public function show( $id);
    
    
    // update section view
    public function update($request,$id);
    
    // destroy section view
    public function destroy($id);
}