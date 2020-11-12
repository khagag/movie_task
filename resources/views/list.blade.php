@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>{{ ucfirst($title) }}</b></div>

                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($list as $item)
                        <tr>
                          <th scope="row">{{$loop->index}}</th>
                          <td>{{$item->name}}</td>
                          <td>{{$item->description}}</td>
                          <td><a class='btn btn-primary' href={{ Route($title.'.edit',$item->id)}}>EDIT</a></td>
                          <td><a class='btn btn-danger' href={{ Route($title.'.edit',$item->id)}}>EDIT</a></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
