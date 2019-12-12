<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function show($id,$id1)
    {  
        $plants = \App\Plant::where('id','=',$id)->get();
        
        //$plants[1]= $id1;

        return \Response::json($plants);
        
    }
   
    public function lista(Request $request) {
        $data = $request->validate([
            'name' => 'required|max:255',
            'scientific_name' => 'required|max:255',
            'description' => 'required|max:255',
            'isCarnivora' => 'max:255',
        ]);
        $plant = new \App\Plant($data);
        $plant->save();
        $plants = \App\Plant::orderBy('id', 'DESC')->first();
        return \Response::json($plants);
    }
    
    public function delete($id)
    {
        $plant = \App\Plant::findOrFail($id);
        $plant->delete();

        return redirect('/submit');
    }

    public function edit($id)
    {
        $plant = \App\Plant::findOrFail($id);
     

        return \Response::json($plant);
    }


}
