<?php

namespace App\Repository\SingleInvoices;

use Exception;
use App\Models\Doctor;

use App\Models\Patient;
use App\Models\Section;
use App\Models\Service;
use PhpParser\Comment\Doc;
use App\Models\singleInvoice;
use PhpParser\Node\Stmt\Return_;
use App\Models\DoctorTranslation;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\PatientTranslation;
use App\Models\SectionTranslation;
use Illuminate\Support\Facades\DB;
use App\Interface\SingleInvoices\SingleInvoicesRepositoryInterface;

class SingleInvoicesRepository implements SingleInvoicesRepositoryInterface 

{


    // index Patient view

    public function index()
    {
        $invoices = singleInvoice ::all();
        return view('Dashboard.single_invoices.index',compact('invoices'));
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

        //return $request;

    }
    
    // create Patient 

    public function create(){

        $Patients = PatientTranslation::select('name','patient_id')->get();
        $Doctors  = Doctor::select('id','section_id')->get();
        $section  = SectionTranslation::select('section_id')->get();
        $services = Service::all()->where('status','=',1);
        return view('Dashboard.single_invoices.create',compact('Patients','services','Doctors','section'));
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

    public function getSection($id){

        $section= DB::table('section_translations')->where('id','=',$id)->pluck('id','name');
        return json_encode($section);
    }
    
    public function getPriceService($id){

        $service = Service::all()->where('id','=',$id)->pluck('id','price');  

        return json_encode($service);
    }

}