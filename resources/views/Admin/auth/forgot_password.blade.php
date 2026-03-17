@extends('layout.admin')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">

        <h2 class="text-2xl font-bold mb-6 text-center">Quên mật khẩu</h2>

        {{-- alert --}}
        @if(session('success'))
            <script>alert("{{ session('success') }}")</script>
        @endif

        @if(session('error'))
            <script>alert("{{ session('error') }}")</script>
        @endif

        <form method="POST" action="{{ route('forgotPassword.post') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input type="email" name="email"
                       class="w-full border px-3 py-2 rounded"
                       placeholder="Nhập email"
                       required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Mật khẩu mới</label>
                <input type="password" name="password"
                       class="w-full border px-3 py-2 rounded"
                       placeholder="Nhập mật khẩu mới"
                       required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation"
                       class="w-full border px-3 py-2 rounded"
                       placeholder="Nhập lại mật khẩu"
                       required>
            </div>

            <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                Đổi mật khẩu
            </button>

        </form>

        <div class="text-center mt-4">
            <a href="/login" class="text-blue-500 hover:underline">
                ← Quay lại đăng nhập
            </a>
        </div>

    </div>

</div>

@endsection