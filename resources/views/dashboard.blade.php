<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

@if(Auth::check())

<div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md text-center">

    <h2 class="text-2xl font-bold text-gray-800 mb-4">
        👋 Xin chào, {{ Auth::user()->name }}
    </h2>

    @if(Auth::user()->avatar)
        <img src="{{ Auth::user()->avatar }}"
             class="w-24 h-24 mx-auto rounded-full border-4 border-green-500 mb-4">
    @endif

    <div class="text-gray-600 space-y-2">
        <p><span class="font-semibold">📧 Email:</span> {{ Auth::user()->email }}</p>
        <p><span class="font-semibold">🎓 MSSV:</span> {{ Auth::user()->student_id }}</p>
    </div>

    <a href="/logout"
       class="inline-block mt-6 bg-red-400 hover:bg-red-500 text-white px-5 py-2 rounded-lg shadow transition">
             Logout
    </a>

</div>

@else

<div class="text-center">
    <h3 class="text-xl text-gray-700 mb-4">Bạn chưa đăng nhập!</h3>
    <a href="/"
       class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg">
        Quay lại đăng nhập
    </a>
</div>

@endif

</body>
</html>