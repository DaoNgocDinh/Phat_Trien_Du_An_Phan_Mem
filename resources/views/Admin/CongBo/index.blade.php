@extends('layout.admin')

@section('title', 'Quản lý Công bố Khoa học')

@section('content')
    <div class="p-6 bg-white min-h-screen">
        <div class="max-w-[1200px] mx-auto">
            <div class="inline-flex items-center rounded-lg bg-[#1D546D] px-4 py-2 text-white font-semibold">
                Công bố khoa học
            </div>

            <div class="mt-6 flex items-start justify-between gap-4">
                <div class="text-lg font-semibold text-gray-900">Danh sách các công bố khoa học</div>
                <a
                    {{-- href="{{ route('admin.congbo.pheduyet') }}" --}}
                    class="inline-flex items-center gap-2 rounded-lg bg-[#3B95CF] px-4 py-2 text-white font-semibold shadow-sm hover:bg-[#3389c0] transition"
                >
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-md bg-white/20">
                        <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" />
                        </svg>
                    </span>
                    Phê duyệt công bố
                </a>
            </div>

            <div class="mt-6 overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 text-gray-900">
                            <th class="px-4 py-3 text-left font-semibold">STT</th>
                            <th class="px-4 py-3 text-left font-semibold">Tên công bố khoa học</th>
                            <th class="px-4 py-3 text-left font-semibold">Tác giả</th>
                            <th class="px-4 py-3 text-left font-semibold">Loại</th>
                            <th class="px-4 py-3 text-left font-semibold">Năm</th>
                            <th class="px-4 py-3 text-left font-semibold">Trạng thái</th>
                            <th class="px-4 py-3 text-center font-semibold">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($congbos as $index => $item)
                            <tr class="hover:bg-gray-50/60 transition">
                                <td class="px-4 py-3 text-gray-900">
                                    {{ $index + 1 + ($congbos->currentPage() - 1) * $congbos->perPage() }}
                                </td>
                                <td class="px-4 py-3 text-gray-900">
                                    {{ $item->TenCongBo }}
                                </td>
                                <td class="px-4 py-3 text-gray-700">
                                    {{ $item->TacGia }}
                                </td>
                                <td class="px-4 py-3 text-gray-700">
                                    {{ $item->Loai ?? $item->LoaiCongBo ?? '' }}
                                </td>
                                <td class="px-4 py-3 text-gray-700">
                                    {{ $item->Nam ?? $item->NamXuatBan ?? '' }}
                                </td>
                                <td class="px-4 py-3">
                                    @php
                                        $trangThai = $item->TrangThai ?? null;
                                        $statusClass = 'text-gray-600';
                                        if ($trangThai === 'Từ chối') $statusClass = 'text-red-500';
                                        if ($trangThai === 'Chờ duyệt') $statusClass = 'text-yellow-500';
                                        if ($trangThai === 'Đã duyệt') $statusClass = 'text-green-500';
                                    @endphp
                                    <span class="{{ $statusClass }}">{{ $trangThai ?? '' }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center gap-3">
                                        <a
                                            href="{{ route('admin.congbo.edit', $item->MaCongBo) }}"
                                            class="inline-flex items-center rounded-md bg-[#7FB0B0] px-3 py-1.5 text-white hover:bg-[#6ea3a3] transition"
                                        >
                                            Chỉnh sửa
                                        </a>
                                        <form action="{{ route('admin.congbo.destroy', $item->MaCongBo) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="inline-flex items-center rounded-md bg-[#D06B55] px-3 py-1.5 text-white hover:bg-[#c45f4a] transition"
                                                onclick="return confirm('Bạn chắc chắn muốn xóa công bố này?')"
                                            >
                                                Xóa
                                            </button>
                                        </form>
                                        <a
                                            href="{{ route('admin.congbo.show', $item->MaCongBo) }}"
                                            class="inline-flex items-center rounded-md bg-[#1D546D] px-3 py-1.5 text-white hover:bg-[#1a4a60] transition"
                                        >
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
                <div class="text-sm font-semibold text-gray-800">
                    Hiển thị {{ $congbos->count() }} đề tài
                </div>

                <div class="flex items-center gap-6">
                    <a
                        href="{{ $congbos->previousPageUrl() ?? '#' }}"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 text-gray-800 hover:bg-gray-50 transition {{ $congbos->onFirstPage() ? 'pointer-events-none opacity-40' : '' }}"
                        aria-label="Trang trước"
                    >
                        &lt;
                    </a>

                    <div class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 text-gray-900 font-semibold">
                        {{ $congbos->currentPage() }}
                    </div>

                    <a
                        href="{{ $congbos->nextPageUrl() ?? '#' }}"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 text-gray-800 hover:bg-gray-50 transition {{ $congbos->hasMorePages() ? '' : 'pointer-events-none opacity-40' }}"
                        aria-label="Trang sau"
                    >
                        &gt;
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection