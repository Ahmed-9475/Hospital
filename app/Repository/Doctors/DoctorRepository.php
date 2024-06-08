<?php

namespace App\Repository\Doctors;

use App\Models\Doctor;
use App\Models\Section;
use PhpParser\Comment\Doc;
use App\Models\Appointment;
use App\Traits\UploadTrait;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Interface\Doctors\DoctorRepositoryInterface;
use PhpParser\Node\Stmt\TryCatch;

class DoctorRepository implements DoctorRepositoryInterface
{

    use UploadTrait;
    public function index()
    {
        $doctors = Doctor::with('appointmentDoctors')->get();
        return view('Dashboard.Doctors.index',compact('doctors'));
    }

    public function create(){

        $sections = Section::all();
        $appointments = Appointment::all();
        
        return view('Dashboard.Doctors.add',compact('sections', 'appointments') );
 
    }
    public function store($request)
    {
        DB::beginTransaction();
            
        try{
                $doctors = new Doctor();
                $doctors->email = $request->email;
                $doctors->password = Hash::make($request->password);
                $doctors->phone = $request->phone;
                $doctors->price = $request->price;
                $doctors->section_id  = $request->section_id;
                $doctors->name = $request->name;
                $doctors->save();

                $doctors->appointmentDoctors()->attach($request->appointments) ;
                $doctors->save();

                //Upload img
                $this->verifyAndStoreImage($request, 'photo', 'doctors', 'upload_image', $doctors->id, 'App\Models\Doctor');

                
                DB::commit();
                session()->flash('add');
                return redirect()->route('Doctors.index');

            }catch(\Exception $e){
                
                DB::rollBack();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

            //return dd($request);
    }

    public function edit($id)
    {
        $appointments = Appointment::all();
        $sections = Section::all();
        $doctor = Doctor::where('id', '=', $id)->first();
        return view('Dashboard.Doctors.edit', compact("doctor", 'sections','appointments'));
    }


    public function update($request,$id){

        DB::beginTransaction();

        try{

            $doctor = Doctor::findOrfail($id);
            $doctor->email = $request->email;
            $doctor->phone = $request->phone;
            $doctor->price = $request->price;
            $doctor->section_id  = $request->section_id;
            $doctor->name = $request->name;
            $doctor->save();
            //Update Pivot Table
            $doctor->appointmentDoctors()->sync($request->appointments) ;
            $doctor->save();

            //Update Image

            if($request->has('photo')){
                if($doctor->image){

                    $oldImage = $doctor->image->filename;
                    $this->deleteAttachment('upload_image','doctors/'.$oldImage,$request->id); 
                }
            }

            //Upload img
            $this->verifyAndStoreImage($request, 'photo', 'doctors', 'upload_image', $doctor->id, 'App\Models\Doctor');

            
            DB::commit();
            session()->flash('edit');
            return redirect()->route('Doctors.index');


        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }

    public function update_password($request){
        DB::beginTransaction();

        try{
            $request->validate(['password'=>'required|confirmed|min:6']);
            $doctor = Doctor::findOrfail($request->id);
            $doctor->update([
                'password' =>Hash::make( $request->password)
            ]);

            DB::commit();
            session()->flash('add');
            return redirect()->route('Doctors.index');

        }
        catch(\Exception $e){

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
    }

    public function update_status($request){
        DB::beginTransaction();

        try{
            $request->validate(['status'=>'required|in:0,1']);
            $doctor = Doctor::findOrfail($request->id);
            $doctor->update([
                'status' => $request->status
            ]);

            DB::commit();
            session()->flash('add');
            return redirect()->route('Doctors.index');

        }
        catch(\Exception $e){

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
            return $request;
    }


    public function destroy($id){
        $doctor = Doctor::findOrFail($id);
        if($doctor->image){

            $this->deleteAttachment('upload_image', 'doctors/'.$doctor->image->filename, $id);
            $doctor->delete();
            session()->flash('delete');
    
        }
        $doctor->delete();
        session()->flash('delete');

        return redirect()->route('Doctors.index');

    }

}