<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;

class ShowCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         //
         $Shows = Show::all();
         return view('list',['list'=>$Shows,'title'=>'shows']);
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         //
         return view('create',['title'=>'shows']);
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         //validate the data before storing it.
         try {

           $valid = $request->validate([
             'name'=>'required',
             'description'=>'required'
           ]);
         } catch (\Exception $e) {
           error_log($e);
           return redirect(Route('shows.create'))->with('status','Something went wrong please try again later.');
         }

         if ($valid) {
           // In case the data is valid
           $Show = new Show;
           $Show->name = $request->name;
           $Show->description = $request->description;
           $Show->save();
           $request->session()->flash('status','Stored successfully.');
           error_log($Show->id);
           return redirect(Route('shows.edit',['Show'=>$Show->id]));
         }
         return redirect(Route('shows.create'))->with('status','Something went wrong please try again later.');
     }


     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit(Show $Show)
     {
         //
         return view('edit',['title'=>'show','item'=>$Show]);
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
         //
         $Show = new Show;
         if ($request->name)
           $Show->name = $request->name;
         if($request->description)
           $Show->description = $request->description;
           $Show->save();
           $request->session()->flash('status','Stored successfully.');
           error_log($Show->id);
           return redirect(Route('shows.edit',['show'=>$Show->id]));
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy(Show $Show)
     {
         //
         $Show->delete();
         // return redirect()->Route('shows.index');
     }
}
