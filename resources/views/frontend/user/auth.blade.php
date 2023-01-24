@extends('frontend.master')

@section('content')

<div class="banner1">
    <div class="container">
        <h3><a href="{{ url('/') }}">Home</a> / <span>User Authetication</span></h3>
    </div>
</div>

<!--content-->
    <div class="content">
        <!--login-->
        <div class="login">
        <div class="main-agileits">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            <div class="form-w3agile form1">

                <h3>Regitration</h3>
                <form action="{{ url('/vendor/registration') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name"/>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email"/>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" name="phone" class="form-control" placeholder="Enter Phone"/>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" id="address" rows="5" placeholder="Enter Address"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password"/>
                    </div>

                    <button type="submit" name="btn" class="btn btn-primary">Register</button>

                </form>
            </div>

        </div>
    </div>
        <!--login-->
 </div>
<!--content-->

@endsection
