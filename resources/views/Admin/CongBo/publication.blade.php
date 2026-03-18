@extends('layout.admin')

@section('title', 'Quản lý Công bố Khoa học')

@section('content')
    <div class="p-6 bg-white min-h-screen">

        <div class="max-w-[1200px] mx-auto">
            <div class="inline-flex items-center rounded-lg bg-[#1D546D] px-4 py-2 text-white font-semibold text-lg">
                Công bố khoa học > Danh sách công bố chưa phê duyệt
            </div>

            <div class="mt-6 flex items-start justify-between gap-4">
                <div class="text-lg font-bold text-gray-900">Danh sách các công bố khoa học chưa phê duyệt</div>
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
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($congbos as $index => $item)
                            <tr class="hover:bg-gray-50 transition duration-150" onclick="window.location='{{ route('admin.congbo.pheduyet.chitiet', $item->MaCongBo) }}'">
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