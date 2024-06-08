<?php

namespace App\Interface\SingleInvoices;


interface SingleInvoicesRepositoryInterface 
{
    // index Single_invoices view
    public function index();

    // store Single_invoices view
    public function store( $request);

    // store Single_invoices view
    public function create();
    
//    public function edit($id);

//     // update section view
//     public function update($request,$id);
    
//     // destroy section view
//    public function destroy($id);

    public function getSection($id);
    public function getPriceService($id);


}