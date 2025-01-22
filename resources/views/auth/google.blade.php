<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            margin: 0;
        }
        .login-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        .login-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
        }
        .btn {
            display: inline-block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
        }
        .btn-google {
            background-color: #db4437;
        }
        .btn-facebook {
            background-color: #4267b2;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="login-container">
        
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-login">Login</button>
        </form>
        <p>Please log in using one of the following:</p>

        <!-- Google Login Button -->
        <a title="Login Via Google" href="{{ route('auth.goto','google') }}" class="btn btn-google">
            Continue with Google
        </a>
        {{-- <a title="Login Via Facebook" href="{{ route('auth','') }}" class="btn btn-facebook">
            Continue with Facebook
        </a> --}}
    </div>
</body>
</html>
