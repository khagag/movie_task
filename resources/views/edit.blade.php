@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>{{ ucfirst($title) }} Edit</b></div>
                <div class="card-body">
                  <form class="" action={{Route($title.'s.update',[$title=>$item->id])}} method="post">
                    @csrf
                    @Method('PATCH')
                    <div class="form-group">
                      <label for="Name">Name</label>
                      <input type="text" class="form-control" id="Name" placeholder="Enter Movie Name">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" id="description" placeholder="Enter The Description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
