@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <div class="card-body">
                  @if($errors->any())
                  <script>alert('Record already exist!!');</script>
                  @endif
                  <form method="post" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
                      @csrf
                      @method('patch')
                      <div class="card-body">
                       <div class="row text-right">
                         <div class="col-md-2"><label for="category" class="mt-2">Category <span class="text-danger">*</span> </label></div>
                         <div class="col-md-10">
                           <select name="category_id" class="form-control" id="category">
                            @foreach ($category as $item)
                              <option value="{{$item->id}}" {{$product->category_id == $item->id ? 'selected' : ''}}>{{$item->category}}</option>
                             @endforeach
                           </select>
                         </div>
                         <div class="col-md-2 col-4">
                           <div class="form-group">
                             <label for="name" class="mt-3">Name <span class="text-danger">*</span> </label><br>
                             <label for="price" class="mt-2">Price <span class="text-danger">*</span> </label><br>
                             <label for="discount_price" class="mt-3">Discount Price</label>
                           </div>
                         </div>
                         <div class="col-md-4 col-8">
                           <div class="form-group">
                             <input type="text" name="product" id="name" value="{{$product->product}}" class="form-control mt-2" placeholder="Enter Your Product Name">
                             <input type="text" name="price" id="price" value="{{$product->price}}" class="form-control mt-2" placeholder="Enter Product Price">
                             <input type="text" name="discount_price" id="discount_price" value="{{$product->discount_price}}" class="form-control mt-2" placeholder="Enter Discount in Prodect">
                           </div>
                         </div>
                         <div class="col-md-2 col-4">
                           <div class="form-group">
                            <label for="availbleitems" class="mt-3">Availble Items <span class="text-danger">*</span> </label><br>
                            <label for="packeage_count" class="mt-2">Packeage Count <span class="text-danger">*</span> </label><br>
                            <label for="discount_price" class="mt-3">Product Image <span class="text-danger">*</span> </label>
                           </div>
                         </div>
                         <div class="col-md-4 col-8">
                           <div class="form-group">
                            <input type="text" name="availbleitems" id="availbleitems" value="{{$product->availbleitems}}" class="form-control mt-2" placeholder="Enter Availble Items">
                            <input type="text" name="packeage_count" id="packeage_count" value="{{$product->packeage_count}}" class="form-control mt-2" placeholder="Enter Packeage Count">
                            <input type="file" name="image" id="discount_price" class="form-control mt-2">
                           </div>
                         </div>
                         <div class="col-md-2">
                           <label for="description">Description <span class="text-danger">*</span></label>
                         </div>
                          <div class="col-md-6 text-left">
                          <textarea name="description" id="" cols="30" rows="9" class="form-control" placeholder="Enter Description">{{$product->description}}</textarea>
                          </div>
                          <div class="col-md-4">
                            <img src="{{$product->image}}" class="w-100" alt="">
                          </div>
                          <div class="col-md-2 mt-2">
                            <label for="featured">Featured</label>
                          </div>
                           <div class="col-md-10 text-left mt-2">
                             <input type="checkbox" name="featured" {{$product->featured == 1 ? 'checked' : ''}} value="1" id="featured">
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