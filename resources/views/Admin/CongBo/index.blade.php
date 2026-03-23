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
                    <a href="{{ route('admin.congbo.pheduyet.danhsach') }}" 
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#3B95CF] text-white text-sm font-semibold rounded-lg shadow-md hover:bg-[#2f86bb] transition">
                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                        Phê duyệt công bố
                    </a>
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
                                        <a href="{{ route('admin.congbo.pheduyet.chitiet', $item->MaCongBo) }}"
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