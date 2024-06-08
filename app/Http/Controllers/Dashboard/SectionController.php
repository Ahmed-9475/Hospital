<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interface\Sections\SectionRepositoryInterface;

class SectionController extends Controller
{

    private $Sections;

    public function __construct(SectionRepositoryInterface $Sections)
    {
        $this->Sections = $Sections;
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Sections->index();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Sections->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->Sections->show($id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        return $this->Sections->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($request)
    {
        return $this->Sections->destroy($request);
    }
}