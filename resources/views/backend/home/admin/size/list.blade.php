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
                <th>Size Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
           @foreach ($sizes as $size)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $size->name }}</td>
                    <td>
                       {{ $size->status }}
                    </td>
                    <td>
                        <a href="{{ url('/size/adit/'.$size->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ url('/size/delete/'.$size->id) }}" onclick="return confirm('Are you sure')" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

</div>

@endsection
