@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
              <div class="card-body">
                  @if($errors->any())
                  <script>alert('Record already exist!!');</script>
                  @elseif(Session::has('success'))
                  <script>alert('Data inserted successfully');</script>
                  @endif
                  <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Add Category</label>
                          <input type="text" class="form-control" name="category" placeholder="Enter Category" required>
                        </div>
                        <div class="form-group">
                          <label for="image">Add Image</label>
                          <input type="file" class="form-control" id="image" name="image">
                        </div>
                      </div>
                      <div class="card-footer">
                          <input type="submit" class="btn btn-primary float-right" id="category_call" value="Submit">
                      </div>
                  </form>
              </div>
            </div>
      </div>
    </div>
</div>
@endsection