<!DOCTYPE html>
<html lang="en">

<head>
    @include('Layout.Head')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>HRconnect</title>
</head>

<body class="login">
    @include("Layout.Messege")
    <div class="SignIn">
        <img src="/img/HRconnect_Name.png" />
        <div class="form-login">
            <form action="/" method="POST">
                @csrf
                <label for="username">Username: </label>
                <input type="text" name="username"><br>

                <label for="password">Password: </label>
                <input type="password" name="password"><br>

                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>

</html>
