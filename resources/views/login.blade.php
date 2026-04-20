<!DOCTYPE html>
<html>
<head>
    <title>Social Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background: #f0f0f0;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            max-width: 400px;
            margin: 0 auto;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 { color: #333; }
        .btn {
            display: inline-block;
            padding: 15px 40px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            color: white;
            transition: 0.3s;
        }
        .btn-google {
            background: #ea4335;
        }
        .btn-google:hover {
            background: #c1351c;
        }
        .btn-facebook {
            background: #1877f2;
        }
        .btn-facebook:hover {
            background: #166fe5;
        }
        .error {
            color: red;
            background: #ffe6e6;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔐 Đăng Nhập Xã Hội</h1>
        <p>Chọn nhà cung cấp để đăng nhập:</p>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <div style="margin-top: 30px;">
            <a href="{{ route('auth.redirect', 'google') }}" class="btn btn-google">
                 Đăng nhập bằng Google
            </a>
            <br>
            <a href="{{ route('auth.redirect', 'facebook') }}" class="btn btn-facebook">
                 Đăng nhập bằng Facebook
            </a>
        </div>
    </div>
</body>
</html>