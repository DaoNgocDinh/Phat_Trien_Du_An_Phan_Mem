@extends('layout.admin')

@section('content')

    <div class="p-10">

        <h2 class="text-xl font-bold mb-5">Đổi mật khẩu</h2>

        {{-- alert --}}
        @if(session('success'))
            <script>alert("{{ session('success') }}")</script>
        @endif

        @if(session('error'))
            <script>alert("{{ session('error') }}")</script>
        @endif

        <form method="POST" action="{{ route('admin.changePassword.post') }}">
            @csrf

            <div class="mb-4">
                <label>Mật khẩu cũ</label>
                <input type="password" name="old_password" class="border p-2 w-full">
            </div>

            <div class="mb-4">
                <label>Mật khẩu mới</label>
                <input type="password" name="new_password" class="border p-2 w-full">
            </div>

            <div class="mb-4">
                <label>Nhập lại mật khẩu</label>
                <input type="password" name="new_password_confirmation" class="border p-2 w-full">
            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Đổi mật khẩu
            </button>

        </form>

    </div>

@endsection