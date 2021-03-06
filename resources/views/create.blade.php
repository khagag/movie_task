@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @if(session()->exists('status'))
            <div class="alert alert-danger" role='alert'>{{session()->get('status')}}</div>
          @endif
            <div class="card">
                <div class="card-header"><b>{{ ucfirst($title) }} Create</b></div>
                <div class="card-body">
                  <form class="" action={{Route($title.'.store')}} method="post">
                    @csrf
                    <div class="form-group">
                      <label for="Name">Name</label>
                      <input type="text" required class="form-control" id="Name" name="name" placeholder="Enter Movie Name">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" required id="description" name="description" placeholder="Enter The Description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
