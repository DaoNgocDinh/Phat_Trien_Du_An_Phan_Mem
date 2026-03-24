@extends('layout.admin')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Đổi mật khẩu
        </h2>

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded text-center text-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- ERROR --}}
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded text-center text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.changePassword.post') }}">
            @csrf

            {{-- MẬT KHẨU CŨ --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Mật khẩu cũ
                </label>
                <input type="password" name="old_password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg 
                           focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition">
                @error('old_password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- MẬT KHẨU MỚI --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Mật khẩu mới
                </label>
                <input type="password" name="new_password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg 
                           focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition">
                @error('new_password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- XÁC NHẬN --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nhập lại mật khẩu
                </label>
                <input type="password" name="new_password_confirmation"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg 
                           focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition">
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2.5 rounded-lg font-semibold
                       hover:bg-blue-600 transition duration-200 shadow-md">
                Đổi mật khẩu
            </button>

        </form>

    </div>

</div>

@endsection