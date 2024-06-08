<?php

namespace App\Repository\Services;

use App\Models\Service;
use PhpParser\Comment\Doc;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Interface\Services\ServicesRepositoryInterface;

class ServicesRepository implements ServicesRepositoryInterface
{


    // index Services view

    public function index()
    {
        $services = Service::all();
        return view('Dashboard.Services.Single Service.index',compact('services'));
    }

    // store Services 

    public function store($request)
    {

        $request->validate(
            ['name' => ['required', 'max:100'],
            'price' => ['required']
            ]);

            DB::beginTransaction();
            
            try{
                    $services = new Service();
                    $services->description = $request->description;
                    $services->price = $request->price;
                    $services->name = $request->name;
                    $services->save();
                        
                    DB::commit();
                    session()->flash('add');
                    return redirect()->route('services.index');
    
                }catch(\Exception $e){
                    
                    DB::rollBack();
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }
    
               // return $request;
        }
    

    // update Services 

    public function update($request,$id){

        DB::beginTransaction();

        try{

            $services = Service::findOrfail($id);
            $services->description = $request->description;
            $services->price = $request->price;
            $services->name = $request->name;
            $services->save();

            
            DB::commit();
            session()->flash('edit');
            return redirect()->route('services.index');


        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }




    public function destroy($id)
    {

        Service::findOrFail($id)->delete();

        session()->flash('delete');
        return redirect()->route('services.index');

    }

}