<!DOCTYPE html>
<html lang="en">

<head>
    @include('Layout.Head')
    <style>
        .login {
            user-select: none;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        body {
            background-image: radial-gradient(circle, #5ce788 0%, #ff8de5 88%);

        }

        .SignIn {
            margin-top: 115px;
            background-color: rgba(243, 214, 253, 0.7);
            padding-block: 70px;
            padding-inline: 40px;
            border-radius: 20px;
            backdrop-filter: blur(5px)
        }

        .SignIn>img {
            margin-top: -30px;
            padding-top: 50px;
            padding-bottom: -50px;
            width: 300px;
            height: 300px;
            object-fit: contain;
            object-position: top;
            background-color: rgba(146, 53, 232, 0.7);
            border-radius: 30px;
        }

        .form-login {
            margin-top: 30px;
            position: relative;
        }

        .form-login input[type="text"],
        .form-login input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 30px;
            border: 2px solid #9235e8;
            border-radius: 5px;
            background-color: whtie;
            color: #290a6f;
        }

        .form-login input[type="text"]:focus,
        .form-login input[type="password"]:focus {
            background-color: whitesmoke;
            outline: none;
        }

        .form-login input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #9235e8;
            color: #f3d6fd;
            font-weight: bold;
            cursor: pointer;
        }

        .form-login input[type="submit"]:hover {
            background-color: #b565f1;
        }

        .form-login label {
            margin-top: -15px;
            padding-inline: 10px;
            margin-left: 10px;
            position: fixed;
            color: var(--Brand900);
            background-color: var(--Brand200);
            border-radius: 5px;
        }
    </style>
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