<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>َAnimated Login Form</title>
    <link rel="stylesheet" href="{{asset('backend/admin/css/admin-login.css')}}"/>
</head>

<body>

    <form class="box" action="{{ url('/admin/login') }}" method="POST">
        @csrf
        <h1>Login | Form</h1>
        @if(session()->has('error'))

        <p style="color: red">{{ session()->get('error') }}</p>
        @endif
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Login">
    </form>


</body>

</html>