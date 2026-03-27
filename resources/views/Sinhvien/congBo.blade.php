@extends('layout.sinhVien')

@section('title', 'Công bố Khoa học')

@section('content')
    <div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
        <div class="max-w-[1400px] mx-auto">

            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
                <h2 class="text-2xl font-bold text-[#1D546D] border-l-4 border-[#1D546D] pl-3">
                    Danh sách Công bố Khoa học
                </h2>
                
                <div class="relative w-full md:w-80 shadow-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fas fa-search text-gray-500"></i>
                    </div>
                    <input type="text" id="congBoSearch" placeholder="Tìm tên bài báo..."
                        class="w-full pl-10 pr-3 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-700 focus:ring-2 focus:ring-[#1D546D] focus:outline-none transition">
                </div>
            </div>

            <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead style="background-color: #EBF4F6 !important; color: black !important; font-weight: bold !important;">
                            <tr>
                                <th class="px-6 py-4 text-center text-sm uppercase tracking-wider">STT</th>
                                <th class="px-6 py-4 text-left text-sm uppercase tracking-wider">Tên công bố khoa học</th>
                                <th class="px-6 py-4 text-left text-sm uppercase tracking-wider">Tác giả</th>
                                <th class="px-6 py-4 text-center text-sm uppercase tracking-wider">Loại</th>
                                <th class="px-6 py-4 text-center text-sm uppercase tracking-wider">Năm</th>
                                <th class="px-6 py-4 text-center text-sm uppercase tracking-wider">Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="congBoListBody" class="divide-y divide-gray-200">
                            @forelse($congbos as $index => $item)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                                        {{ $index + 1 + ($congbos->currentPage() - 1) * $congbos->perPage() }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-bold text-[#1D546D]">
                                        {{ $item->TenCongBo }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $item->TacGia ?? 'Chưa cập nhật' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                        {{ $item->Loai ?? $item->LoaiCongBo ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-700">
                                        {{ $item->Nam ?? $item->NamXuatBan ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <button class="px-4 py-2 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 font-semibold transition shadow-sm"
                                            onclick="openModal(
                                                '{{ $item->MaCongBo }}',
                                                '{{ addslashes($item->TenCongBo) }}',
                                                '{{ addslashes($item->TacGia) }}',
                                                '{{ $item->Loai ?? $item->LoaiCongBo ?? '' }}',
                                                '{{ addslashes($item->TenDeTai ?? '') }}',
                                                '{{ $item->Nam ?? $item->NamXuatBan ?? '' }}',
                                                '{{ addslashes($item->NoiCongBo ?? '') }}',
                                                '{{ addslashes($item->NoiDungTomTat ?? '') }}',
                                                '{{ $item->FilePDF ?? '' }}'
                                            )">
                                            <i class="fas fa-eye mr-1"></i> Xem chi tiết
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500 text-lg">
                                        Chưa có công bố khoa học nào.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center text-sm text-gray-600 gap-4">
                    <div>
                        Hiển thị {{ $congbos->firstItem() }} - {{ $congbos->lastItem() }} trong {{ $congbos->total() }} công bố
                    </div>
                    <div class="flex items-center gap-2">
                        {{ $congbos->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="congBoModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4 transition-opacity">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
            
            <div class="px-6 py-4 bg-[#EBF4F6] border-b border-gray-200 flex justify-between items-center shrink-0">
                <h2 class="text-xl font-bold text-[#1D546D]">Chi tiết Công bố Khoa học</h2>
                <button onclick="closeModal()" class="text-gray-500 hover:text-red-500 transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <div class="p-6 overflow-y-auto space-y-5 text-gray-700">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <div><span class="font-semibold text-gray-800">Mã công bố:</span> <span id="modalMa" class="ml-1"></span></div>
                    <div><span class="font-semibold text-gray-800">Năm xuất bản:</span> <span id="modalNam" class="ml-1 font-bold text-[#1D546D]"></span></div>
                </div>
                
                <div>
                    <span class="font-semibold text-gray-800 block mb-1">Tên công bố:</span>
                    <div id="modalTen" class="font-bold text-gray-900 text-lg leading-snug"></div>
                </div>
                
                <div>
                    <span class="font-semibold text-gray-800">Tác giả:</span> 
                    <span id="modalTacGia" class="ml-1"></span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><span class="font-semibold text-gray-800">Loại công bố:</span> <span id="modalLoai" class="ml-1"></span></div>
                    <div><span class="font-semibold text-gray-800">Nơi công bố:</span> <span id="modalNoiCongBo" class="ml-1"></span></div>
                </div>

                <div>
                    <span class="font-semibold text-gray-800 block mb-1">Thuộc đề tài:</span> 
                    <span id="modalDeTai" class="inline-block bg-blue-50 text-blue-700 px-3 py-1 rounded text-sm font-medium"></span>
                </div>

                <div>
                    <span class="font-semibold text-gray-800 block mb-2">Tóm tắt nội dung:</span>
                    <p id="modalTomTat" class="bg-white p-4 rounded-lg border border-gray-200 text-sm leading-relaxed text-gray-600 shadow-sm"></p>
                </div>

                <div>
                    <span class="font-semibold text-gray-800 block mb-2">File đính kèm:</span>
                    <a id="modalFile" href="#" target="_blank" class="inline-flex items-center px-4 py-2 bg-[#EBF4F6] border border-gray-200 rounded-md text-sm font-medium text-[#1D546D] hover:bg-gray-200 transition shadow-sm">
                        <i class="fas fa-file-pdf mr-2 text-red-500 text-lg"></i>
                        <span id="modalFileName">Xem file PDF</span>
                    </a>
                    <span id="noFileMsg" class="hidden text-sm text-gray-500 italic">Không có file đính kèm</span>
                </div>
            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end shrink-0">
                <button onclick="closeModal()" class="px-6 py-2 bg-gray-300 text-gray-800 font-semibold rounded-lg hover:bg-gray-400 transition shadow-sm">
                    Đóng
                </button>
            </div>
        </div>
    </div>

    <script>
        // Mở Modal và đổ dữ liệu
        function openModal(ma, ten, tacGia, loai, deTai, nam, noiCongBo, tomTat, file) {
            document.getElementById('modalMa').textContent = ma || 'N/A';
            document.getElementById('modalTen').textContent = ten || 'Không có tên';
            document.getElementById('modalTacGia').textContent = tacGia || 'Không có thông tin';
            document.getElementById('modalLoai').textContent = loai || 'Không xác định';
            document.getElementById('modalDeTai').textContent = deTai || 'Không thuộc đề tài nào';
            document.getElementById('modalNam').textContent = nam || 'Không có thông tin';
            document.getElementById('modalNoiCongBo').textContent = noiCongBo || 'Không có thông tin';
            document.getElementById('modalTomTat').textContent = tomTat || 'Chưa có thông tin tóm tắt cho công bố này.';
            
            const fileLink = document.getElementById('modalFile');
            const fileName = document.getElementById('modalFileName');
            const noFileMsg = document.getElementById('noFileMsg');
            
            if (file) {
                fileLink.href = '{{ asset('uploads/pdf') }}/' + file;
                fileName.textContent = file.split('/').pop();
                fileLink.style.display = 'inline-flex';
                noFileMsg.style.display = 'none';
            } else {
                fileLink.style.display = 'none';
                noFileMsg.style.display = 'inline-block';
            }

            const modal = document.getElementById('congBoModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        // Đóng Modal
        function closeModal() {
            const modal = document.getElementById('congBoModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Đóng modal khi bấm ra ngoài vùng đen
        document.getElementById('congBoModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });

        // Tìm kiếm (Lọc trực tiếp trên bảng)
        document.getElementById('congBoSearch').addEventListener('input', (e) => {
            const filter = e.target.value.toLowerCase();
            document.querySelectorAll('#congBoListBody tr').forEach(row => {
                const nameCell = row.querySelector('td:nth-child(2)'); // Lọc theo cột "Tên công bố"
                if (!nameCell) return;
                const text = nameCell.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>
@endsection