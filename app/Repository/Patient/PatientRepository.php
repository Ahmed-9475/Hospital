<?php

namespace App\Repository\Patient;

use Exception;
use App\Models\Patient;
use PhpParser\Comment\Doc;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Interface\Patient\PatientRepositoryInterface;

class PatientRepository implements PatientRepositoryInterface
{


    // index Patient view

    public function index()
    {
        $Patients = Patient::all();
        return view('Dashboard.Patients.index',compact('Patients'));
    }

    // store Patient 

    public function store( $request)
    {
        DB::beginTransaction(); 
        
        try{
            $Patient = new Patient();
            $Patient->email = $request->email;
            $Patient->Date_Birth = $request->Date_Birth;
            $Patient->Phone = $request->Phone;
            $Patient->Gender = $request->Gender;
            $Patient->Blood_Group = $request->Blood_Group;
            $Patient->save();
            $Patient->Address = $request->Address;
            $Patient->name = $request->name;
            $Patient->save();
    
            DB::commit();
            session()->flash('add');
            return redirect()->route('Patients.index');

        }catch(\Exception $e){
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
    
    // create Patient 

    public function create(){

        return view('Dashboard.Patients.create');
    }

    public function edit($id)
    {
        $Patient = Patient::findorfail($id);
        return view('Dashboard.Patients.edit', compact('Patient'));
    }


    // update Patient 

    public function update($request,$id){

        
        try{
            DB::beginTransaction(); 
            
            $Patient = Patient::findorfail($id);
            $Patient->email = $request->email;
            $Patient->Date_Birth = $request->Date_Birth;
            $Patient->Phone = $request->Phone;
            $Patient->Gender = $request->Gender;
            $Patient->Blood_Group = $request->Blood_Group;
            $Patient->Address = $request->Address;
            $Patient->name = $request->name;
            $Patient->save();
    
            DB::commit();
            session()->flash('edit');
            return redirect()->route('Patients.index');

        }catch(Exception $e){
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }




    public function destroy($id)
    {

        Patient::findOrFail($id)->delete();
        
        session()->flash('delete');
        return redirect()->route('Patients.index');

    }

}