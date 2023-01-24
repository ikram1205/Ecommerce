@extends('frontend.master')



@section('content')

<div class="banner1">
    <div class="container">
        <h3><a href="{{ url('/') }}">Home</a> / <span>Dashboard</span></h3>
    </div>
</div>


<div class="container" style="height: auto; margin-top: 20px;">
   <div class="well">
    <h1 class="text-center">Products Create</h1>
    <a href="{{ url('/vendor/dashboard') }}" class="btn btn-sm btn-success pull-right" style="margin-top: -35px"> Product List</a>
       <form action="{{ url('/vendor/product/store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="">Product Type</label>
                 <select name="type" class="form-control" id="">
                    <option value="" selected disabled>Select A Product Type</option>
                    <option value="new">New Arrivals</option>
                    <option value="hot">Hot Product</option>
                    <option value="discount">Discount Product</option>
                 </select>
            </div>

            <div class="form-group">
                <label for="">Category</label>
                 <select name="category_id" class="form-control" id="">
                    <option value="" selected disabled>Select A Category</option>

                        @foreach ($categories as $category)
                         <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                 </select>
            </div>

            <div class="form-group">
                <label for="">Color</label>
                 <select name="color_id" class="form-control" id="">
                    <option value="" selected disabled>Select A Color</option>

                    @foreach ($colors as $color)
                    <option value="{{ $color->id }}" >{{ $color->name }}</option>
                    @endforeach
                 </select>
            </div>

            <div class="form-group">
                <label for="">Size</label>
                 <select name="size_id" class="form-control" id="">
                    <option value="" selected disabled>Select A Size</option>

                    @foreach ($sizes as $size)
                    <option value="{{ $size->id }}" >{{ $size->name }}</option>
                    @endforeach
                 </select>
            </div>

            <div class="form-group">
                <label for="">Name</label>
                 <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Product Name"/>
            </div>

            <div class="form-group">
                <label for="">Price</label>
                 <input type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="Product Price"/>
            </div>

            <div class="form-group">
                <label for="">QTY</label>
                 <input type="number" min="1" name="qty" value="{{ old('qty') }}" class="form-control" placeholder="Product qty"/>
            </div>

            <div class="form-group">
                <label for="">Image</label>
                 <input type="file" name="image" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="">Gallery Image</label>
                 <input type="file" name="multi_image[]" multiple class="form-control"/>
            </div>

          <button type="submit" class="btn btn-sm btn-success">Submit</button>

       </form>
   </div>
</div>

@endsection
