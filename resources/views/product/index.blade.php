@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  <h2 class="card-title">All Product</h2>
                </div>
                <div class="card-body tablediv">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Category Name</th>
                      <th>Product Name</th>
                      <th>Stock</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->category_id}}</td>
                            <td>{{$item->product}}</td>
                            <td>{{$item->availbleitems}}</td>
                            <td class="d-flex">
                                <a href="{{route('product.edit', $item->id)}}" class="btn"><i class="fa fa-edit"></i></a>
                                <form action="{{route('product.destroy',$item->id)}}" method="post">
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