@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  <h2 class="card-title">All Categories</h2>
                </div>
                  @if(Session::has('success'))
                  <script>alert('Action Successfully Doing');</script>
                  @endif
                <div class="card-body tablediv">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Category</th>
                      <th>Total Product</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->category}}</td>
                            <td>{{$item->count}}</td>
                            <td class="d-flex">
                                <a href="{{route('category.edit',$item->id)}}" class="btn"><i class="fa fa-edit"></i></a>
                                <form action="{{route('category.destroy',$item->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                   <button type="submit" class="btn"><i class="fa fa-trash"></i></button> 
                                </form>
                            </td>
                          </tr>
                        @endforeach
                  </table>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection