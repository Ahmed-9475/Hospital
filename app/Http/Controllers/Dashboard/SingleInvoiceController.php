<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interface\SingleInvoices\SingleInvoicesRepositoryInterface;

class SingleInvoiceController extends Controller
{
 
    private $Single_invoices;

    public function __construct(SingleInvoicesRepositoryInterface $Single_invoices)
    {
        $this->Single_invoices = $Single_invoices;
    }


 
 
    public function index()
    {
        return $this->Single_invoices->index();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Single_invoices->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Single_invoices->store($request);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getSection($id){
    
        return $this->Single_invoices->getSection($id);

    }
    
    public function getPriceService($id){
    
        return $this->Single_invoices->getPriceService($id);

    }

}
