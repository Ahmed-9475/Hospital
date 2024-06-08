<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationStoreAmbulance;
use App\Interface\Ambulance\AmbulanceRepositoryInterface;

class AmbulanceController extends Controller
{
    private $Ambulance;

    public function __construct(AmbulanceRepositoryInterface $Ambulance)
    {
        $this->Ambulance = $Ambulance;
    }

    public function index()
    {
        return $this->Ambulance->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Ambulance->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidationStoreAmbulance $request)
    {
        return $this->Ambulance->store($request);
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
        return $this->Ambulance->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->Ambulance->update($request,$id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->Ambulance->destroy($id);
    }
}
