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
                        <form action="{{ url('/size/store') }}" method="Post">
                            @csrf

                            <div class="form-group">
                                <label>Category name</label>
                                <select class="form-control" name="category_id" id="">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <label for="">Size Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Your Size Name"/>

                                <label for="">Status</label>
                                <select class="form-control" name="status" id="">
                                    <option value="{{ 1 }}">{{ 'active' }}</option>
                                    <option value="{{ 0 }}">{{ 'unactive' }}</option>
                                </select>

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
