@extends('layout.giangVien')

@section('title', 'Công bố Khoa học')

@section('content')
    <div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
        <div class="max-w-[1400px] mx-auto">

            <!-- Thanh tìm kiếm -->
            <div class="mb-6">
                <div class="relative" style="width:300px;">

                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                        style="padding-left:10px">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <input type="text" id="congBoSearch" placeholder="Tìm tên bài báo..."
                        style="padding-left:40px; background:#D9D9D9;"
                        class="w-full pr-3 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700">
                </div>
            </div>

            <!-- Header + Nút khai báo mới (placeholder cho sinh viên) -->
            <div class="flex flex-col md:flex-row items-start md:items-center mb-6 gap-4">
                <a>
                    <button
                        class="bg-[#1D546D] text-white px-6 py-2.5 shadow-md transition flex items-center gap-2 font-medium">
                        <!-- <i class="fas fa-plus-circle"></i> -->
                        Tất cả công bố
                    </button>
                </a>
                <a href="#">
                    <button
                        class="bg-gray-500 hover:bg-[#2c5d6e] text-black px-6 py-2.5 shadow-md transition flex items-center gap-2 font-medium">
                        <!-- <i class="fas fa-plus-circle"></i> -->
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

            <!-- Bảng danh sách -->
            <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead
                            style="background-color: #EBF4F6 !important; color: black !important; font-weight: bold !important;">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">STT</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Tên bài
                                    báo/Công bố</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Tác giả</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Nơi Đăng</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Năm</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Hành động
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200" id="congBoListBody">
                            @forelse($congbos as $index => $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                        {{ $index + 1 + ($congbos->currentPage() - 1) * $congbos->perPage() }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $item->TenCongBo }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $item->TacGia }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $item->NoiCongBo }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $item->NamXuatBan }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <button
                                            onclick="openModal('{{ $item->TenCongBo }}', '{{ $item->NamXuatBan }}', '{{ $item->NoiCongBo }}', '{{ $item->NoiDungTomTat ?? 'Không có tóm tắt' }}', '{{ $item->FilePDF ?? 'Không có file' }}')"
                                            class="text-green-600 hover:text-green-900 text-xl">
                                            <i class="fas fa-eye" style="color:#3D99D7;"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500 text-lg">
                                        Chưa có công bố khoa học nào để hiển thị.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Phân trang -->
                <div
                    class="px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center text-sm text-gray-600 gap-4">
                    <div>
                        Hiển thị {{ $congbos->firstItem() }} - {{ $congbos->lastItem() }} trong {{ $congbos->total() }} công
                        bố
                    </div>
                    <div class="flex items-center gap-2">
                        {{ $congbos->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Chi tiết công bố khoa học -->
    <div id="congBoModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-2xl max-w-2xl mx-4 relative overflow-hidden" style="border: 1px solid #000;">
            <!-- Header -->
            <div class="px-8 py-2.5 relative rounded-xl" style="background-color: #D9D9D9; border-bottom: 1px solid #000;">
                <h2 class="text-2xl font-bold text-left" style="color: #21546B; padding-left: 15px; font-size: 1.25rem;">
                    Chi tiết công bố khoa học
                </h2>
            </div>

            <!-- Content -->
            <div class="p-8" style="padding-left: 20px; padding-right: 20px;">
                <div class="space-y-4 text-gray-700">
                    <!-- Title -->
                    <div>
                        <span class="font-semibold" style="padding-left: 20px;">Đề tài:</span>
                        <span id="modalDeTai"></span>
                    </div>

                    <!-- Year + Location (centered) -->
                    <div class="font-semibold text-right space-y-5" style="padding-right: 20px; padding-top: 30px;">
                        Năm xuất bản : <span id="modalNam" class="font-normal"></span>
                    </div>
                    <div class="font-semibold" style="padding-left: 20px; padding-top: 15px;">
                        Nơi công bố : <span id="modalNoiCongBo" class="font-normal"></span>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-300 mt-8 mb-4" style="border: 1px solid #000"></div>

                    <!-- Summary -->
                    <div>
                        <span class="font-semibold">Nội dung tóm tắt:</span>
                        <p id="modalTomTat" class="mt-1 leading-relaxed"></p>
                    </div>

                    <!-- File -->
                    <div class="flex items-center gap-5">
                        <span class="font-semibold">File minh chứng:</span>
                        <a id="modalFile" href="#" target="_blank"
                            class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded-lg hover:bg-gray-200 transition">
                            <i class="fas fa-file-pdf text-red-600"></i>
                            <span id="modalFileName" class="text-gray-700"></span>
                        </a>
                    </div>
                </div>

                <div class="mt-8 flex justify-center">
                    <button onclick="closeModal()"
                        class="bg-gray-600 hover:bg-gray-700 text-white px-8 py-3 rounded-lg shadow-md transition">
                        Đóng
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script để mở/đóng modal -->
    <script>
        function openModal(deTai, nam, noiCongBo, tomTat, file) {
            document.getElementById('modalDeTai').textContent = deTai || 'Không có thông tin';
            document.getElementById('modalNam').textContent = nam || 'Không có thông tin';
            document.getElementById('modalNoiCongBo').textContent = noiCongBo || 'Không có thông tin';
            document.getElementById('modalTomTat').textContent = tomTat || 'Không có tóm tắt';
            document.getElementById('modalFileName').textContent = file ? file.split('/').pop() : 'Không có file';
            document.getElementById('modalFile').href = file ? '{{ asset('uploads/pdf') }}/' + file : '#';

            document.getElementById('congBoModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('congBoModal').classList.add('hidden');
        }

        // Đóng modal khi click bên ngoài
        document.getElementById('congBoModal').addEventListener('click', function (e) {
            if (e.target === this) closeModal();
        });

        // Tìm kiếm công bố
        document.getElementById('congBoSearch').addEventListener('input', (e) => {
            const filter = e.target.value.toLowerCase();
            document.querySelectorAll('#congBoListBody tr').forEach(row => {
                const nameCell = row.querySelector('td:nth-child(2)');
                if (!nameCell) return;
                const text = nameCell.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>
@endsection