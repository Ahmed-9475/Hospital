<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interface\Insurance\InsuranceRepositoryInterface;

class InsuranceController extends Controller
{
    private $Insurance;

    public function __construct(InsuranceRepositoryInterface $Insurance)
    {
        $this->Insurance = $Insurance;
    }
    public function index()
    {
        return $this->Insurance->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Insurance->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Insurance->store($request);
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
        return $this->Insurance->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return $this->Insurance->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->Insurance->destroy($id);
    }
}
