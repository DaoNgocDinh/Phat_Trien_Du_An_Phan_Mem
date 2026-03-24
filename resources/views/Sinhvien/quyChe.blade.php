@extends('layout.sinhVien')

@section('title', 'Quy chế khoa học')

@section('content')
    <div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
        <div class="max-w-[1400px] mx-auto">

            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
                <h2 class="text-2xl font-bold text-[#1D546D] border-l-4 border-[#1D546D] pl-3">
                    Danh sách Quy chế - Văn bản
                </h2>

                <div class="relative w-full md:w-80 shadow-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fas fa-search text-gray-500"></i>
                    </div>
                    <input type="text" id="quyCheSearch" placeholder="Tìm tên quy chế, văn bản..."
                        class="w-full pl-10 pr-3 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-700 focus:ring-2 focus:ring-[#1D546D] focus:outline-none transition">
                </div>
            </div>

            <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead
                            style="background-color: #EBF4F6 !important; color: black !important; font-weight: bold !important;">
                            <tr>
                                <th class="px-6 py-4 text-center text-sm uppercase tracking-wider w-16">STT</th>
                                <th class="px-6 py-4 text-left text-sm uppercase tracking-wider w-32">Số hiệu</th>
                                <th class="px-6 py-4 text-left text-sm uppercase tracking-wider">Tên quy chế / Văn bản</th>
                                <th class="px-6 py-4 text-center text-sm uppercase tracking-wider w-36">Ngày ban hành</th>
                                <th class="px-6 py-4 text-center text-sm uppercase tracking-wider w-32">Cấp độ</th>
                                <th class="px-6 py-4 text-center text-sm uppercase tracking-wider w-40">Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="quyCheListBody" class="divide-y divide-gray-200">
                            @forelse($quyches as $index => $quyche)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                                        {{ $index + 1 + ($quyches->currentPage() - 1) * $quyches->perPage() }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-700">
                                        {{ $quyche->SoHieu ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-bold text-[#1D546D]">
                                        {{ $quyche->TenVanBan }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700 font-medium">
                                        {{ $quyche->NgayBanHanh ? \Carbon\Carbon::parse($quyche->NgayBanHanh)->format('d/m/Y') : 'Chưa cập nhật' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700 border border-gray-200">
                                            {{ $quyche->LoaiVanBan ?? 'Khác' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <div class="flex items-center justify-center gap-2">
                                            <button
                                                class="px-3 py-1.5 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 font-semibold transition shadow-sm flex items-center gap-1"
                                                onclick="openModal(
                                                            '{{ addslashes($quyche->SoHieu) }}',
                                                            '{{ addslashes($quyche->TenVanBan) }}',
                                                            '{{ $quyche->NgayBanHanh }}',
                                                            '{{ addslashes($quyche->LoaiVanBan) }}',
                                                            '{{ $quyche->FilePDF }}'
                                                        )" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i> Xem
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500 text-lg">
                                        Chưa có quy chế khoa học nào.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div
                    class="px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center text-sm text-gray-600 gap-4">
                    <div>
                        Hiển thị {{ $quyches->firstItem() }} - {{ $quyches->lastItem() }} trong {{ $quyches->total() }} quy
                        chế
                    </div>
                    <div class="flex items-center gap-2">
                        {{ $quyches->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="quyCheModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4 transition-opacity">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">

            <div class="px-6 py-4 bg-[#EBF4F6] border-b border-gray-200 flex justify-between items-center shrink-0">
                <h2 class="text-xl font-bold text-[#1D546D]">Chi tiết Quy chế - Văn bản</h2>
                <button onclick="closeModal()" class="text-gray-500 hover:text-red-500 transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <div class="p-6 overflow-y-auto space-y-5 text-gray-700">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <div>
                        <span class="font-semibold text-gray-800">Số hiệu:</span>
                        <span id="modalSoHieu" class="ml-1 font-bold text-[#1D546D]"></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-800">Ngày ban hành:</span>
                        <span id="modalNgayBanHanh" class="ml-1"></span>
                    </div>
                </div>

                <div>
                    <span class="font-semibold text-gray-800 block mb-1">Tên văn bản / Quy chế:</span>
                    <div id="modalTenVanBan" class="font-bold text-gray-900 text-lg leading-snug"></div>
                </div>

                <div>
                    <span class="font-semibold text-gray-800">Cấp ban hành:</span>
                    <span id="modalLoaiVanBan"
                        class="ml-2 inline-block bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-semibold border border-gray-200"></span>
                </div>

                <div class="border-t border-gray-200 pt-4 mt-2">
                    <span class="font-semibold text-gray-800 block mb-2">Tài liệu đính kèm:</span>
                    <a id="modalFile" href="#" target="_blank"
                        class="inline-flex items-center px-4 py-2 bg-[#EBF4F6] border border-gray-200 rounded-md text-sm font-medium text-[#1D546D] hover:bg-gray-200 transition shadow-sm">
                        <i class="fas fa-file-pdf mr-2 text-red-500 text-lg"></i>
                        <span id="modalFileName">Xem file đính kèm</span>
                    </a>
                    <span id="noFileMsg" class="hidden text-sm text-gray-500 italic">Không có tài liệu đính kèm</span>
                </div>
            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end shrink-0 gap-3">
                <a id="modalDownloadBtn" href="#"
                    class="px-6 py-2 bg-[#1D546D] text-white font-semibold rounded-lg hover:bg-[#154053] transition shadow-sm flex items-center gap-2 hidden">
                    <i class="fas fa-download"></i> Tải xuống
                </a>
                <button onclick="closeModal()"
                    class="px-6 py-2 bg-gray-300 text-gray-800 font-semibold rounded-lg hover:bg-gray-400 transition shadow-sm">
                    Đóng
                </button>
            </div>
        </div>
    </div>

    <script>
        // Hàm format ngày tháng
        function formatDate(dateString) {
            if (!dateString) return 'Chưa cập nhật';
            const date = new Date(dateString);
            return date.toLocaleDateString('vi-VN');
        }

        // Mở Modal và đổ dữ liệu
        function openModal(soHieu, tenVanBan, ngayBanHanh, loaiVanBan, filePDF) {
            document.getElementById('modalSoHieu').textContent = soHieu || 'N/A';
            document.getElementById('modalTenVanBan').textContent = tenVanBan || 'Không có tên văn bản';
            document.getElementById('modalNgayBanHanh').textContent = formatDate(ngayBanHanh);
            document.getElementById('modalLoaiVanBan').textContent = loaiVanBan || 'Khác';

            // Xử lý File PDF
            const fileLink = document.getElementById('modalFile');
            const fileName = document.getElementById('modalFileName');
            const noFileMsg = document.getElementById('noFileMsg');
            const downloadBtn = document.getElementById('modalDownloadBtn');

            if (filePDF) {
                // Giả định route xem pdf của bạn cấu hình trong public
                const fileUrl = '{{ asset('uploads/pdf') }}/' + filePDF;
                fileLink.href = fileUrl;
                fileName.textContent = filePDF.split('/').pop();
                fileLink.style.display = 'inline-flex';
                noFileMsg.style.display = 'none';

                // Setup nút tải xuống
                downloadBtn.href = '/download-pdf/' + filePDF; // Chỉnh sửa lại URL cho phù hợp với route tải PDF của bạn nếu cần
                downloadBtn.style.display = 'inline-flex';
            } else {
                fileLink.style.display = 'none';
                noFileMsg.style.display = 'inline-block';
                downloadBtn.style.display = 'none';
            }

            const modal = document.getElementById('quyCheModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        // Đóng Modal
        function closeModal() {
            const modal = document.getElementById('quyCheModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Đóng modal khi bấm ra ngoài vùng đen
        document.getElementById('quyCheModal').addEventListener('click', function (e) {
            if (e.target === this) closeModal();
        });

        // Tìm kiếm (Lọc trực tiếp trên bảng theo Tên văn bản)
        document.getElementById('quyCheSearch').addEventListener('input', (e) => {
            const filter = e.target.value.toLowerCase();
            document.querySelectorAll('#quyCheListBody tr').forEach(row => {
                const nameCell = row.querySelector('td:nth-child(3)'); // Lọc theo cột thứ 3: "Tên quy chế"
                if (!nameCell) return;
                const text = nameCell.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>
@endsection