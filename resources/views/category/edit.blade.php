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
                <h3 class="card-title">Update Category Detail</h3>
              </div>
              <div class="card-body">
                  @if($errors->any())
                  <script>alert('Record already exist!!');</script>
                    @foreach ($errors as $item)
                        <ul>
                            <li class="text-danger">{{$item}}</li>
                        </ul>
                    @endforeach
                  @elseif(Session::has('success'))
                  <script>alert('Data inserted successfully');</script>
                  @endif
                  <form method="post" action="{{route('category.update', $category->id)}}" enctype="multipart/form-data">
                      @csrf
                      @method('PATCH')
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Add Category</label>
                        <input type="text" class="form-control" name="category" value="{{$category->category}}" placeholder="Enter Category" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="image">Add Image</label>
                                <input type="file" class="form-control h-75" id="image" name="image">
                            </div>
                            <div class="col-md-6">
                            <img src="{{$category->image}}" class="w-100" alt="">
                            </div>
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