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

            <div class="mt-6 text-lg font-bold text-gray-900">
                Danh sách người dùng
            </div>

            <!-- TABLE -->
            <div class="mt-6 overflow-hidden rounded-xl border border-gray-200 shadow-sm">

                <table class="w-full text-sm">

                    <thead>
                        <tr class="bg-gray-100 text-gray-800 text-sm uppercase tracking-wide">

                            <th class="px-4 py-4 text-center font-bold w-[80px]">STT</th>
                            <th class="px-4 py-4 text-center font-bold w-[120px]">UserID</th>
                            <th class="px-4 py-4 text-left font-bold">Tên</th>
                            <th class="px-4 py-4 text-left font-bold">Email</th>
                            <th class="px-4 py-4 text-center font-bold w-[150px]">Vai trò</th>
                            <th class="px-4 py-4 text-center font-bold w-[200px]">Hành động</th>

                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        @forelse($users as $index => $user)

                                        <tr class="hover:bg-gray-50 transition duration-150">

                                            <!-- STT -->
                                            <td class="px-4 py-4 text-center font-medium">
                                                {{ $index + 1 + ($users->currentPage() - 1) * $users->perPage() }}
                                            </td>

                                            <!-- USERID -->
                                            <td class="px-4 py-4 text-center">
                                                {{ $user->UserID }}
                                            </td>

                                            <!-- TÊN -->
                                            <td class="px-4 py-4">
                                                {{ $user->giangvien->HoTen
                            ?? $user->nghiencuusinh->HoTen
                            ?? 'Admin' }}
                                            </td>

                                            <!-- EMAIL -->
                                            <td class="px-4 py-4">
                                                {{ $user->giangvien->Email
                            ?? " "}}
                                            </td>

                                            <!-- VAI TRÒ -->
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

                                                <span
                                                    style="{{ $style }} padding:4px 10px; border-radius:9999px; font-size:12px; font-weight:600;">
                                                    {{ $role }}
                                                </span>

                                            </td>

                                            @if($user->VaiTro != 'admin')
                                                <td class="px-4 py-4">
                                                <div class="flex justify-center">
                                                    <form action="{{ route('admin.users.destroy', $user->UserID) }}" method="POST"
                                                        onsubmit="return confirm('Bạn có chắc muốn xóa người dùng này không?')">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            class="inline-flex items-center rounded-md bg-[#D06B55] px-3 py-1.5 text-white hover:bg-[#c45f4a] transition">
                                                            Xóa
                                                        </button>

                                                    </form>
                                                </div>
                                            </td>
                                            @endif

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

            <!-- PAGINATION -->
            <div class="mt-10 flex items-center justify-between">

                <div class="text-sm font-bold text-gray-800">
                    Hiển thị {{ $users->count() }} người dùng
                </div>

                <div class="flex items-center gap-6">

                    <a href="{{ $users->previousPageUrl() ?? '#' }}"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 text-gray-800 hover:bg-gray-50 transition {{ $users->onFirstPage() ? 'pointer-events-none opacity-40' : '' }}">
                        < </a>

                            <div
                                class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 font-semibold">
                                {{ $users->currentPage() }}
                            </div>

                            <a href="{{ $users->nextPageUrl() ?? '#' }}"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 text-gray-800 hover:bg-gray-50 transition {{ $users->hasMorePages() ? '' : 'pointer-events-none opacity-40' }}">
                                >
                            </a>

                </div>

            </div>

        </div>
    </div>

@endsection