@extends('layout.giangVien')

@section('title', 'Công bố của tôi')

@section('content')
    <div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
        <div class="max-w-[1400px] mx-auto flex flex-col min-h-[calc(100vh-140px)]">

            <div class="flex flex-row justify-start items-center mb-6 gap-2">
                {{-- Đổi route này thành route xem tất cả công bố hoặc thêm công bố của bạn --}}
                <a href="{{ route('giangvien.congBo') }}"> 
                    <button class="bg-[#6B727F] hover:bg-[#2c5d6e] text-white px-6 py-2.5 shadow-md transition flex items-center gap-2 font-medium">
                        Tất cả công bố
                    </button>
                </a>
                <a href="{{ route('giangvien.congBoCuaToi') }}">
                    <button class="bg-[#1D546D] hover:bg-[#2c5d6e] text-white px-6 py-2.5 shadow-md transition flex items-center gap-2 font-medium">
                        Công bố của tôi
                    </button>
                </a>
                <a href="{{ route('giangvien.congbo.suggest') }}">
                    <button
                        class="bg-gray-500 hover:bg-[#2c5d6e] text-black px-6 py-2.5 shadow-md transition flex items-center gap-2 font-medium">
                        <!-- <i class="fas fa-plus-circle"></i> -->
                        Đề xuất công bố
                    </button>
                </a>
            </div>

            <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-200 flex-1 flex flex-col min-h-[600px]">
                <div class="overflow-x-auto flex-1">
                    <table class="min-w-full divide-y divide-gray-200 h-full table-fixed">
                        <thead class="bg-[#EBF4F6] sticky top-0 z-10">
                            <tr>
                                <th class="w-16 px-6 py-4 text-center text-sm font-bold uppercase tracking-wider">STT</th>
                                <th class="w-2/5 px-6 py-4 text-center text-sm font-bold uppercase tracking-wider">Tên công bố / Bài báo</th>
                                <th class="w-1/5 px-6 py-4 text-center text-sm font-bold uppercase tracking-wider">Tác giả</th>
                                <th class="w-1/5 px-6 py-4 text-center text-sm font-bold uppercase tracking-wider">Nơi xuất bản / Tạp chí</th>
                                <th class="w-1/6 px-6 py-4 text-center text-sm font-bold uppercase tracking-wider">Năm XB</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($congBoCuaToi as $index => $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-900 font-medium text-center">
                                        {{ $index + 1 + ($congBoCuaToi->currentPage() - 1) * $congBoCuaToi->perPage() }}
                                    </td>
                                    <td class="px-6 py-5 text-sm font-medium text-gray-900">
                                        {{ $item->TenCongBo ?? $item->TenBaiBao ?? 'Chưa cập nhật' }}
                                    </td>
                                    <td class="px-6 py-5 text-sm text-gray-600 text-center">
                                        {{ $item->TacGia ?? 'Chưa cập nhật' }}
                                    </td>
                                    <td class="px-6 py-5 text-sm text-gray-600 text-center">
                                        {{ $item->NoiXuatBan ?? $item->TapChi ?? 'Chưa cập nhật' }}
                                    </td>
                                    <td class="px-6 py-5 whitespace-nowrap text-center text-sm text-gray-600 font-medium">
                                        {{ $item->NamXuatBan ?? 'N/A' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-20 text-center text-gray-500 text-lg">
                                        Bạn chưa có công bố khoa học nào trong hệ thống.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center text-sm text-gray-600 gap-4 bg-white">
                    <div>
                        Hiển thị {{ $congBoCuaToi->firstItem() ?? 0 }} - {{ $congBoCuaToi->lastItem() ?? 0 }} trong {{ $congBoCuaToi->total() ?? 0 }} công bố
                    </div>
                    <div class="flex items-center gap-2">
                        {{ $congBoCuaToi->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection