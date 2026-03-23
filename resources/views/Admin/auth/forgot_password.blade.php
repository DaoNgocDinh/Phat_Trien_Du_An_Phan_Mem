<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quên mật khẩu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen w-screen bg-cover bg-center flex items-center justify-center"
    style="background-image: url('{{ asset('images/bg.jpg') }}');">

    <div class="bg-white/70 backdrop-blur-md p-10 rounded-lg shadow-xl w-[420px]">

        <h2 class="text-3xl font-bold text-center mb-8">Quên mật khẩu</h2>

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="mb-4 text-green-600 text-sm text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- ERROR --}}
        @if(session('error'))
            <div class="mb-4 text-red-500 text-sm text-center">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('forgotPassword.post') }}">
            @csrf

            <!-- UserID -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Mã tài khoản</label>
                <input type="text" name="UserID" value="{{ old('UserID') }}"
                    class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400"
                    placeholder="Nhập mã tài khoản">

                @error('UserID')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400"
                    placeholder="Nhập email">

                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Mật khẩu mới</label>
                <input type="password" name="password"
                    class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400"
                    placeholder="Nhập mật khẩu mới">

                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation"
                    class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400"
                    placeholder="Nhập lại mật khẩu">
            </div>

            <button type="submit"
                class="w-full bg-[#7AB2B2] hover:bg-[#6aa8a8] text-[#1D546D] font-semibold py-2 rounded">
                Đổi mật khẩu
            </button>

        </form>

        <div class="text-center mt-4">
            <a href="/login" class="text-blue-600 hover:underline">
                ← Quay lại đăng nhập
            </a>
        </div>

    </div>

</body>

</html>