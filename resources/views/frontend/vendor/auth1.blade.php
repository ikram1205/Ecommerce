@extends('frontend.master')

@section('content')

	<!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ url('/') }}">Home</a> / <span>Login</span></h3>
        </div>
    </div>
<!--banner-->

<!--content-->
    <div class="content">
            <!--login-->
        <div class="login">
            <div class="main-agileits">
                @if (session()->has('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif
                <div class="form-w3agile">
                    <h3>Login</h3>
                    <form action="{{ url('/vendor/login') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email"/>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Your Password"/>
                        </div>

                        <button type="submit" name="btn" class="btn btn-primary">Login</button>

                    </form>
                </div>
                <div class="forg">
                    <a href="#" class="forg-left">Forgot Password</a>
                    <a href="{{ url('/vendor/register') }}" class="forg-right">Register</a>
                <div class="clearfix"></div>
                </div>
            </div>
        </div>
            <!--login-->
    </div>
    <!--content-->

@endsection
