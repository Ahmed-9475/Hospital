<?php

namespace App\Repository\Ambulance;

use Exception;
use App\Models\Ambulance;
use PhpParser\Comment\Doc;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Interface\Ambulance\AmbulanceRepositoryInterface;

class AmbulanceRepository implements AmbulanceRepositoryInterface
{


    // index Ambulance view

    public function index()
    {
        $Ambulance = Ambulance::all();
        return view('Dashboard.Ambulance.index',compact('Ambulance'));
    }

    // store Ambulance 

    public function store( $request)
    {
        DB::beginTransaction(); 
        
        try{
            $Ambulance = new Ambulance();
            $Ambulance->car_number = $request->car_number;
            $Ambulance->car_model = $request->car_model;
            $Ambulance->car_year_made = $request->car_year_made;
            $Ambulance->car_type = $request->car_type;
            $Ambulance->driver_license_number = $request->driver_license_number;
            $Ambulance->driver_phone = $request->driver_phone;
            $Ambulance->save();
            $Ambulance->driver_name = $request->driver_name;
            $Ambulance->notes = $request->notes;
            $Ambulance->save();
    
            DB::commit();
            session()->flash('add');
            return redirect()->route('Ambulance.index');

        }catch(\Exception $e){
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

       // return $request;
    }
    
    // create Ambulance 

    public function create(){

        return view('Dashboard.Ambulance.create');
    }

    public function edit($id)
    {
        $ambulance = Ambulance::findorfail($id);
        return view('Dashboard.Ambulance.edit', compact('ambulance'));
    }


    // update Ambulance 

    public function update($request,$id){

        if($request->has('status'))
            
        $request->request->add(['status'=>1]);
        else
        $request->request->add(['status'=>0]);

        DB::beginTransaction(); 
        
        try{
            
            $Ambulance = Ambulance::findorfail($id);
            //$Ambulance->update($request->all());
            $Ambulance->car_number = $request->car_number;
            $Ambulance->car_model = $request->car_model;
            $Ambulance->car_year_made = $request->car_year_made;
            $Ambulance->car_type = $request->car_type;
            $Ambulance->driver_license_number = $request->driver_license_number;
            $Ambulance->driver_phone = $request->driver_phone;
            $Ambulance->status = $request->status;
            $Ambulance->save();
            $Ambulance->driver_name = $request->driver_name;
            $Ambulance->notes = $request->notes;
            $Ambulance->save();
    
            DB::commit();
            session()->flash('edit');
            return redirect()->route('Ambulance.index');

        }catch(Exception $e){
            
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }




    public function destroy($id)
    {

        Ambulance::findOrFail($id)->delete();
        
        session()->flash('delete');
        return redirect()->route('Ambulance.index');

    }

}