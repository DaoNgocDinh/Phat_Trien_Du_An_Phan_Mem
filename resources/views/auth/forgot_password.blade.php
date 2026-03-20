<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen w-screen bg-cover bg-center flex items-center justify-center"
    style="background-image: url('{{ asset('images/bg.jpg') }}');">

    <div class="bg-white/70 backdrop-blur-md p-10 rounded-lg shadow-xl w-[420px]">

        <h2 class="text-3xl font-bold text-center mb-8">Đăng nhập</h2>

        @if(session('success'))
            <script>alert("{{ session('success') }}")</script>
        @endif

        @if(session('error'))
            <script>alert("{{ session('error') }}")</script>
        @endif

        <form method="POST" action="{{ route('forgotPassword.post') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Tài khoản</label>
                <input type="text" name="UserID" class="w-full border px-3 py-2 rounded" placeholder="Nhập UserID">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" class="w-full border px-3 py-2 rounded" placeholder="Nhập email"
                    required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Mật khẩu mới</label>
                <input type="password" name="password" class="w-full border px-3 py-2 rounded"
                    placeholder="Nhập mật khẩu mới" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation" class="w-full border px-3 py-2 rounded"
                    placeholder="Nhập lại mật khẩu" required>
            </div>

            <button type="submit"
                class="w-full bg-[#7AB2B2] hover:bg-[#6aa8a8] text-[#1D546D] font-semibold py-2 rounded">
                Đổi mật khẩu
            </button>

        </form>

        <div class="text-center mt-4">
            <a href="/login" class="text-blue-500 hover:underline">
                ← Quay lại đăng nhập
            </a>
        </div>

    </div>

</body>

</html>