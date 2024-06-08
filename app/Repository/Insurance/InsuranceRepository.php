<?php

namespace App\Repository\Insurance;

use App\Models\Insurance;
use PhpParser\Comment\Doc;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Interface\Insurance\InsuranceRepositoryInterface;

class InsuranceRepository implements InsuranceRepositoryInterface
{


    // index Insurance view

    public function index()
    {
        $Insurance = Insurance::all();
        return view('Dashboard.Insurance.index',compact('Insurance'));
    }

    // store Insurance 

    public function store($request)
    {
        $request->validate(
            ['insurance_code' => ['required', 'numeric'],
            'name' => ['required', 'max:100'],
            'discount_percentage' => ['required', 'numeric'],
            'Company_rate' => ['required', 'numeric'],
            'notes' => ['required', 'max:700'],
        ]);
        DB::beginTransaction(); 
        
        try{
            $insurance = new Insurance();
            $insurance->insurance_code = $request->insurance_code;
            $insurance->discount_percentage = $request->discount_percentage;
            $insurance->Company_rate = $request->Company_rate;

            $insurance->name = $request->name;
            $insurance->notes = $request->notes;
            $insurance->save();
    
            DB::commit();
            session()->flash('add');
            return redirect()->route('insurances.index');

        }catch(\Exception $e){
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    // create Insurance 

    public function create(){

        return view('Dashboard.Insurance.create');
    }

    public function edit($id)
    {
        $insurances = Insurance::findorfail($id);
        return view('Dashboard.Insurance.edit', compact('insurances'));
    }


    // update Insurance 

    public function update($request,$id){

        $request->validate(
            ['insurance_code' => ['required', 'numeric'],
            'name' => ['required', 'max:100'],
            'discount_percentage' => ['required', 'numeric'],
            'Company_rate' => ['required', 'numeric'],
            'notes' => ['required', 'max:700'],
        ]);
        DB::beginTransaction(); 
        
        try{
            $insurance = Insurance::findorfail($id);
            $insurance->insurance_code = $request->insurance_code;
            $insurance->discount_percentage = $request->discount_percentage;
            $insurance->Company_rate = $request->Company_rate;

            $insurance->name = $request->name;
            $insurance->notes = $request->notes;
            $insurance->save();
    
            DB::commit();
            session()->flash('edit');
            return redirect()->route('insurances.index');

        }catch(\Exception $e){
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }




    public function destroy($id)
    {

        Insurance::findOrFail($id)->delete();
        
        session()->flash('delete');
        return redirect()->route('insurances.index');

    }

}