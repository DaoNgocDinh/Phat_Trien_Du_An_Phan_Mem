@extends('layout.admin')

@section('title', 'Quản lý Công bố Khoa học')

@section('content')
    <div class="p-6 bg-white min-h-screen">

        @if(session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif

        @if(session('error'))
            <script>
                alert("{{ session('error') }}");
            </script>
        @endif
        <div class="max-w-[1200px] mx-auto">
            <div class="inline-flex items-center rounded-lg bg-[#1D546D] px-4 py-2 text-white font-semibold text-lg">
                Công bố khoa học
            </div>

            <div class="flex items-center justify-end">
                <div class="inline-flex items-center gap-3 rounded-xl
                                                !bg-[#3B95CF] px-6 py-3 !text-white font-semibold
                                                shadow-md hover:!bg-[#2f86bb] transition">
                    <span class="flex items-center justify-center w-7 h-7 rounded-md bg-white/30">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4" fill="white">
                            <path d="M12 2L15 8L22 9L17 14L18 21L12 18L6 21L7 14L2 9L9 8L12 2Z" />
                        </svg>
                    </span>
                    <a href="{{ route('admin.congbo.index', ['filter' => 'pending']) }}" style="background:#3D99D7;" class="inline-flex items-center gap-3 px-5 py-2 rounded-lg
                                                            text-white font-semibold shadow-sm
                                                            hover:brightness-95 transition text-xl">
                        <span class="flex items-center justify-center w-8 h-8 rounded bg-white/25">
                            <svg class="w-10 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15`"
                                fill="currentColor">

                                <path fill-rule="evenodd"
                                    d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z"
                                    clip-rule="evenodd" />

                            </svg>

                        </span>

                        Phê duyệt công bố
                    </a>
                </div>
            </div>

            <div class="mt-6 flex items-start justify-between gap-4">
                <div class="text-lg font-bold text-gray-900">Danh sách các công bố khoa học</div>
            </div>

            <div class="mt-6 overflow-hidden rounded-xl border border-gray-200 shadow-sm">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-gray-800 text-sm uppercase tracking-wide">
                            <th class="px-4 py-4 text-center font-bold w-[70px]">STT</th>
                            <th class="px-4 py-4 text-left font-bold">Tên công bố khoa học</th>
                            <th class="px-4 py-4 text-left font-bold">Tác giả</th>
                            <th class="px-4 py-4 text-center font-bold w-[120px]">Loại</th>
                            <th class="px-4 py-4 text-center font-bold w-[90px]">Năm</th>
                            <th class="px-4 py-4 text-center font-bold w-[130px]">Trạng thái</th>
                            <th class="px-4 py-4 text-center font-bold w-[240px]">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($congbos as $index => $item)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-4 py-4 text-center text-gray-900 font-medium">
                                    {{ $index + 1 + ($congbos->currentPage() - 1) * $congbos->perPage() }}
                                </td>
                                <td class="px-4 py-4 text-gray-900">
                                    {{ $item->TenCongBo }}
                                </td>
                                <td class="px-4 py-4 text-gray-700">
                                    {{ $item->TacGia }}
                                </td>
                                <td class="px-4 py-4 text-center text-gray-700">
                                    {{ $item->Loai ?? $item->LoaiCongBo ?? '' }}
                                </td>
                                <td class="px-4 py-4 text-center text-gray-700">
                                    {{ $item->Nam ?? $item->NamXuatBan ?? '' }}
                                </td>
                                <td class="px-4 py-4 text-center">
                                    @php
                                        $trangThai = $item->TrangThai ?? '';
                                        $style = 'background:#f3f4f6;color:#4b5563;'; // default gray
                                        if ($trangThai === 'Từ chối') {
                                            $style = 'background:#fee2e2;color:#b91c1c;';
                                        } elseif ($trangThai === 'Chờ duyệt') {
                                            $style = 'background:#fef3c7;color:#b45309;';
                                        } elseif ($trangThai === 'Đã duyệt') {
                                            $style = 'background:#dcfce7;color:#15803d;';
                                        }
                                    @endphp
                                    <span
                                        style="{{ $style }} padding:4px 10px; border-radius:9999px; font-size:12px; font-weight:600; display:inline-block;">
                                        {{ $trangThai }}
                                    </span>
                                </td>
                                <td class="px-4 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.congbo.edit', $item->MaCongBo) }}"
                                            class="inline-flex items-center rounded-md bg-[#7FB0B0] px-3 py-1.5 text-sm text-white hover:bg-[#6ea3a3] transition">
                                            Chỉnh sửa
                                        </a>
                                        <button onclick="openDeleteModal({{ $item->MaCongBo }})"
                                            class="inline-flex items-center rounded-md bg-[#D06B55] px-3 py-1.5 text-white hover:bg-[#c45f4a] transition">

                                            Xóa

                                        </button>
                                        <a href="#" {{-- "{{ route('admin.congbo.show', $item->MaCongBo) }}" --}}
                                            class="inline-flex items-center rounded-md bg-[#1D546D] px-3 py-1.5 text-white hover:bg-[#1a4a60] transition">
                                            Xem chi tiết
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-10 text-center text-gray-500">
                                    Chưa có công bố khoa học nào.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-10 flex items-center justify-between">
                <div class="text-sm font-bold text-gray-800">
                    Hiển thị {{ $congbos->count() }} đề tài
                </div>

                <div class="flex items-center gap-6">
                    <a href="{{ $congbos->previousPageUrl() ?? '#' }}"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 text-gray-800 hover:bg-gray-50 transition {{ $congbos->onFirstPage() ? 'pointer-events-none opacity-40' : '' }}"
                        aria-label="Trang trước">
                        &lt;
                    </a>

                    <div
                        class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 text-gray-900 font-semibold">
                        {{ $congbos->currentPage() }}
                    </div>

                    <a href="{{ $congbos->nextPageUrl() ?? '#' }}"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 text-gray-800 hover:bg-gray-50 transition {{ $congbos->hasMorePages() ? '' : 'pointer-events-none opacity-40' }}"
                        aria-label="Trang sau">
                        &gt;
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openDeleteModal(id) {

            let modal = document.getElementById('deleteModal');

            let form = document.getElementById('deleteForm');

            form.action = "/admin/congbo/" + id;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal() {

            let modal = document.getElementById('deleteModal');

            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
@endsection
@include('components.delete-model')