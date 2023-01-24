@extends('backend.home.admin.home.master')

@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>SL</th>
                <th>Color Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
           @foreach ($colors as $color)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $color->name }}</td>
                    <td>
                       {{ $color->status }}
                    </td>
                    <td>
                        <a href="{{ url('/color/adit/'.$color->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ url('/color/delete/'.$color->id) }}" onclick="return confirm('Are you sure')" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

</div>

@endsection
