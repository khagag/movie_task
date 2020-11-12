<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieCtrl extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $movies = Movie::all();
        return view('list',['list'=>$movies,'title'=>'movies']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create',['title'=>'movies']);
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
          return redirect(Route('movies.create'))->with('status','Something went wrong please try again later.');
        }

        if ($valid) {
          // In case the data is valid
          $movie = new Movie;
          $movie->name = $request->name;
          $movie->description = $request->description;
          $movie->save();
          $request->session()->flash('status','Stored successfully.');
          error_log($movie->id);
          return redirect(Route('movies.edit',['movie'=>$movie->id]));
        }
        return redirect(Route('movies.create'))->with('status','Something went wrong please try again later.');
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
    public function edit(Movie $movie)
    {
        //
        return view('edit',['title'=>'movie','item'=>$movie]);
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
        $movie = new Movie;
        if ($request->name)
          $movie->name = $request->name;
        if($request->description)
          $movie->description = $request->description;
          $movie->save();
          $request->session()->flash('status','Stored successfully.');
          error_log($movie->id);
          return redirect(Route('movies.edit',['movie'=>$movie->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
        $movie->delete();
        // return redirect()->route('movies.index');
    }
}
