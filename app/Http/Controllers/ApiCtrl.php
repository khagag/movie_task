<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class ApiCtrl extends Controller
{
    //
    public function index(Request $req){
      $m = Movie::all();
      return response()->json([
        'success'=>True,
        'movies'=>$m
      ]);
    }
    public function store(Request $req){
      try{
        $req->validate([
          'name'=>'required|string',
          'description'=>'required|string'
        ]);
        $m = new Movie;
        $m->name = $req->name;
        $m->description = $req->description;
        $m->save();
        return response()->json([
          'success'=>true,
          'msg'=>"congratulations ".$m->name." created successfully."
        ]);
      } catch (\Exception $e) {
        return response()->json([
          'success'=>false,
          'msg'=>"badly something went wrong try again later."
        ]);
      }

    }
}
