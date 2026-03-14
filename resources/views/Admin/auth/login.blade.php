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

        <form method="POST" action="{{ route('login.process')}}">
            @csrf



            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Tài khoản</label>
                <input type="text" name="UserID" value="{{ old('UserID') }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Nhập tài khoản">

            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Mật khẩu</label>
                <input type="password" name="MatKhau"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Nhập mật khẩu">

                @error('MatKhau')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>


            <div class="flex justify-between items-center mb-4 text-sm">
                <label class="flex items-center">
                    <input type="checkbox" class="mr-2">
                    Nhớ mật khẩu
                </label>

                <a href="/forgot-password" class="text-blue-600 hover:underline">
                    Quên mật khẩu?
                </a>
            </div>


            <button type="submit"
                class="w-full bg-[#7AB2B2] hover:bg-[#6aa8a8] text-[#1D546D] font-semibold py-2 rounded">
                Đăng nhập
            </button>

        </form>

    </div>

</body>

</html>