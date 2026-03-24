@extends('layout.admin')

@section('title', 'Quản lý người dùng')

@section('content')

<div class="p-6 bg-white min-h-screen">

    <div class="max-w-[1200px] mx-auto">

        <!-- HEADER -->
        <div class="flex items-center justify-between">

            <div class="inline-flex items-center rounded-lg bg-[#1D546D] px-4 py-2 text-white font-semibold text-lg">
                Quản lý người dùng
            </div>

            <a href="{{ route('admin.register') }}"
                class="inline-flex items-center gap-2 rounded-xl bg-[#3B95CF] px-5 py-3 text-white font-semibold shadow-md hover:bg-[#2f86bb] transition">
                Thêm người dùng
            </a>

        </div>

        <!-- TITLE -->
        <div class="mt-6 text-lg font-bold text-gray-900">
            Danh sách người dùng
        </div>

        <!-- TABLE -->
        <div class="mt-6 overflow-hidden rounded-xl border border-gray-200 shadow-sm">

            <table class="w-full text-sm">

                <thead>
                    <tr class="bg-gray-100 text-gray-800 text-sm uppercase tracking-wide">
                        <th class="px-4 py-4 text-center w-[80px]">STT</th>
                        <th class="px-4 py-4 text-center w-[120px]">UserID</th>
                        <th class="px-4 py-4 text-left">Tên</th>
                        <th class="px-4 py-4 text-left">Email</th>
                        <th class="px-4 py-4 text-center w-[150px]">Vai trò</th>
                        <th class="px-4 py-4 text-center w-[200px]">Hành động</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                    @forelse($users as $index => $user)

                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-4 py-4 text-center font-medium">
                                {{ $index + 1 + ($users->currentPage() - 1) * $users->perPage() }}
                            </td>

                            <td class="px-4 py-4 text-center">
                                {{ $user->UserID }}
                            </td>

                            <td class="px-4 py-4">
                                {{ $user->giangvien->HoTen
                                    ?? $user->nghiencuusinh->HoTen
                                    ?? 'Admin' }}
                            </td>

                            <td class="px-4 py-4">
                                {{ $user->giangvien->Email
                                    ?? $user->nghiencuusinh->Email
                                    ?? 'Email không có' }}
                            </td>

                            <td class="px-4 py-4 text-center">

                                @php
                                    $role = $user->VaiTro;
                                    $style = 'background:#f3f4f6;color:#4b5563;';
                                    if ($role == 'giangvien') {
                                        $style = 'background:#dcfce7;color:#15803d;';
                                    } elseif ($role == 'nghiencuusinh') {
                                        $style = 'background:#fef3c7;color:#b45309;';
                                    }
                                @endphp

                                <span style="{{ $style }} padding:4px 10px; border-radius:9999px; font-size:12px; font-weight:600;">
                                    {{ $role }}
                                </span>

                            </td>

                            <td class="px-4 py-4">
                                @if($user->VaiTro != 'admin')
                                    <div class="flex justify-center">

                                        <form action="{{ route('admin.users.destroy', $user->UserID) }}"
                                              method="POST"
                                              onsubmit="return confirm('Bạn có chắc muốn xóa người dùng này không?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="inline-flex items-center rounded-md bg-[#D06B55] px-3 py-1.5 text-white hover:bg-[#c45f4a] transition">
                                                Xóa
                                            </button>

                                        </form>

                                    </div>
                                @endif
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-4 py-10 text-center text-gray-500">
                                Chưa có người dùng nào.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- FOOTER -->
        <div class="mt-10 flex items-center justify-between">

            <div class="text-sm font-bold text-gray-800">
                Hiển thị {{ $users->count() }} người dùng
            </div>

            @include('components.paginate')

        </div>

    </div>
</div>

<!-- ================= MODAL THÀNH CÔNG ================= -->
@if(session('success'))
<div id="successModal"
     class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">

    <div class="bg-white w-[400px] rounded-xl shadow-lg border-2 overflow-hidden animate-fadeIn">

        <!-- HEADER -->
        <div class="flex justify-between items-center px-4 py-2 border-b bg-gray-100">
            <span class="font-semibold text-gray-700">Thông báo</span>
            <button onclick="closeSuccessModal()" class="text-gray-500 hover:text-black text-lg">✕</button>
        </div>

        <!-- BODY -->
        <div class="flex flex-col items-center justify-center py-8 px-6 text-center">

            <!-- ICON -->
            <div class="w-16 h-16 rounded-full bg-green-500 flex items-center justify-center mb-4">
                <span class="text-white text-3xl">✔</span>
            </div>

            <!-- TEXT -->
            <div class="text-2xl font-semibold text-black-200 mb-2">
                {{ session('success') }}
            </div>

            <div class="text-xl text-gray-500">
                Thao tác đã được thực hiện thành công
            </div>

        </div>

    </div>
</div>

<script>
    function closeSuccessModal() {
        const modal = document.getElementById('successModal');
        if(modal) modal.remove();
    }

    setTimeout(() => {
        closeSuccessModal();
    }, 3000);
</script>
@endif

<!-- ANIMATION -->
<style>
@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.9); }
    to { opacity: 1; transform: scale(1); }
}
.animate-fadeIn {
    animation: fadeIn 0.25s ease-out;
}
</style>

@endsection