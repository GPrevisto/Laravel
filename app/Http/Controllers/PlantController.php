<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function submit()
    {
        $plants = \App\Plant::all();
        // limit(4)->get();
        // $plants = \App\Plant::where( 'name','Brown Sporer')-> first();
         return view('submit', [
             'plants' => $plants
       ]);
       
    }
    
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|max:255',
            'scientific_name' => 'required|max:255',
            'description' => 'required|max:255',
            'isCarnivora' => 'max:255',
        ]);
        $plant = new \App\Plant($data);
        $plant->save();
        return redirect('/submit');
    }

    public  function lista() {
        $plants = \App\Plant::all();
       // limit(4)->get();
       // $plants = \App\Plant::where( 'name','Brown Sporer')-> first();
        return view('lista', [
            'plants' => $plants
      ]);
    }

    public function show($id)
    {
        $plant = \App\Plant::find($id);

        return response()->json([
            'error' => false,
            'task'  => $plant,
        ], 200);
    }

    public function teste()
    {
        return view('teste');
    }

    


    
    public  function edit($id) {
        $plants = \App\Plant::where('id',$id)->get();
       // limit(4)->get();
       // $plants = \App\Plant::where( 'name','Brown Sporer')-> first();
        return view('edit', [
            'plants' => $plants,'id'=>$id
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'scientific_name' => 'required|max:255',
            'description' => 'required|max:255',
            'isCarnivora' => 'max:255',
        ]);

        $plant = \App\Plant::findOrFail($id);
        $plant->name            = $request->name;
        $plant->scientific_name = $request->scientific_name;
        $plant->description     = $request->description;
        $plant->isCarnivora     = $request->isCarnivora;
        $plant->save();

        return redirect('/lista');
    }

}



