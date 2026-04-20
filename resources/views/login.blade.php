<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Social Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #eaf3ff;
        }

        .container {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            padding: 42px 36px;
            border-radius: 18px;
            box-shadow: 0 20px 60px rgba(0, 70, 160, 0.12);
            text-align: center;
        }

        h1 {
            font-size: 24px;
            font-weight: 700;
            color: #1f3b57;
            margin-bottom: 8px;
        }

        p {
            font-size: 14px;
            color: #6b7c93;
            margin-bottom: 28px;
        }

        .error {
            background: #fff1f1;
            border: 1px solid #ffdddd;
            color: #d93025;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 15px;
            font-size: 13px;
            text-align: left;
        }

        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 13px;
            margin: 12px 0;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.25s ease;
        }

        .btn svg {
            flex-shrink: 0;
        }

        /* Google */
        .btn-google {
            background: #ffffff;
            color: #1f3b57;
            border: 1px solid #dbe7f5;
        }

        .btn-google:hover {
            background: #f6faff;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 90, 200, 0.12);
        }

        /* Facebook */
        .btn-facebook {
            background: #4c8dff;
            color: white;
        }

        .btn-facebook:hover {
            background: #3a7df0;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(76, 141, 255, 0.25);
        }

        .divider {
            margin: 20px 0;
            display: flex;
            align-items: center;
            text-align: center;
            color: #a0b3c6;
            font-size: 12px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #e6eef7;
        }

        .divider span {
            margin: 0 10px;
        }

        .footer {
            margin-top: 18px;
            font-size: 12px;
            color: #8aa0b6;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Đăng nhập</h1>
        <p>Chọn phương thức đăng nhập an toàn</p>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <!-- GOOGLE -->
        <a href="{{ route('auth.redirect', 'google') }}" class="btn btn-google">
            <svg width="18" height="18" viewBox="0 0 48 48">
                <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.9-6.9C36.63 2.5 30.82 0 24 0 14.62 0 6.51 5.38 2.56 13.22l8.02 6.22C12.43 13.19 17.74 9.5 24 9.5z"/>
                <path fill="#4285F4" d="M46.5 24c0-1.64-.15-3.21-.43-4.73H24v9h12.6c-.54 2.9-2.18 5.36-4.66 7.03l7.19 5.59C43.98 37.31 46.5 31.16 46.5 24z"/>
                <path fill="#FBBC05" d="M10.58 28.9A14.5 14.5 0 019.5 24c0-1.64.29-3.22.8-4.7l-8.02-6.22A23.9 23.9 0 000 24c0 3.77.88 7.34 2.56 10.5l8.02-5.6z"/>
                <path fill="#34A853" d="M24 48c6.48 0 11.94-2.14 15.92-5.82l-7.19-5.59c-2.01 1.35-4.6 2.15-8.73 2.15-6.26 0-11.57-3.69-13.42-9.1l-8.02 5.6C6.51 42.62 14.62 48 24 48z"/>
            </svg>
            <span>Tiếp tục với Google</span>
        </a>

        <div class="divider">
            <span>hoặc</span>
        </div>

        <!-- FACEBOOK -->
        <a href="{{ route('auth.redirect', 'facebook') }}" class="btn btn-facebook">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="white">
                <path d="M22 12a10 10 0 10-11.56 9.87v-6.99h-2.2V12h2.2V9.8c0-2.17 1.29-3.37 3.27-3.37.95 0 1.94.17 1.94.17v2.13h-1.09c-1.08 0-1.41.67-1.41 1.36V12h2.4l-.38 2.88h-2.02v6.99A10 10 0 0022 12z"/>
            </svg>
            <span>Tiếp tục với Facebook</span>
        </a>

        <div class="footer">
            Bằng việc đăng nhập, bạn đồng ý với điều khoản sử dụng
        </div>
    </div>
</body>
</html>