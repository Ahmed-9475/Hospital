<?php

namespace App\Repository\Sections;

use App\Models\Section;
use App\Interface\Sections\SectionRepositoryInterface;
use App\Models\Doctor;

class SectionRepository implements SectionRepositoryInterface
{
    public function index(){
        $sections = Section::all();
        return view('Dashboard.Sections.index',compact('sections'));
    }

    public function store( $request){
        $request->validate(
        ['name' => ['required', 'max:100'],
        'description' => ['required', 'max:700']
        ]);

        $sections = Section::create([

            'name'=>$request->name,
            'description'=>$request->description
        ]);
        
        session()->flash('add');
        return redirect()->route('sections.index');
    }


    public function update($request, $id)
    {
        $request->validate(
            [
                'name' => ['required', 'max:100'],
                'description' => ['required', 'max:700']
            ]
        );

        $sections = Section::findOrFail($id);

        $sections->update([

            'name' => $request->name,
            'description' => $request->description

        ]);

        session()->flash('edit');

        return redirect()->route('sections.index');
    }

    public function show($id){

        $doctors = Doctor::where('section_id','=',$id)->get();
        $sections = Section::first()->name;

        return view('Dashboard.Sections.show_doctors',compact('sections','doctors'));
    }


    public function destroy($id)
    
    {
        Section::findOrFail($id)->delete();

        session()->flash('delete');

        return redirect()->route('sections.index');

    }

}