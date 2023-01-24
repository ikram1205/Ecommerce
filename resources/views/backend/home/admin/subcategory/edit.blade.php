@extends('backend.home.admin.home.master')

@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                @if(session()->has('success'))
                   <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/Subcategory/update'.$subcategory->id) }}" method="Post">
                            @csrf
                            <div class="form-group">
                                <label>Category</label>
                                 <select name="category_id" class="form-control">
                                    <option selected disabled>Select A Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                 </select>
                              </div>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Subcategory name"/>
                            </div>

                            <button type="submit" class="btn btn-block btn-success">Create</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>

@endsection
