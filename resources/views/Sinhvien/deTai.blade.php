@extends('layout.sinhVien')

@section('title', 'Đề tài nghiên cứu')

@section('content')
    <div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
        <div class="max-w-[1400px] mx-auto">

            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
                <h2 class="text-2xl font-bold text-[#1D546D] border-l-4 border-[#1D546D] pl-3">
                    Danh sách Đề tài Nghiên cứu
                </h2>
                
                <div class="relative w-full md:w-80 shadow-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fas fa-search text-gray-500"></i>
                    </div>
                    <input type="text" id="deTaiSearch" placeholder="Tìm tên đề tài..."
                        class="w-full pl-10 pr-3 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-700 focus:ring-2 focus:ring-[#1D546D] focus:outline-none transition">
                </div>
            </div>

            <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead style="background-color: #EBF4F6 !important; color: black !important; font-weight: bold !important;">
                            <tr>
                                <th class="px-6 py-4 text-center text-sm uppercase tracking-wider w-20">STT</th>
                                <th class="px-6 py-4 text-left text-sm uppercase tracking-wider">Tên đề tài</th>
                                <th class="px-6 py-4 text-center text-sm uppercase tracking-wider w-32">Năm</th>
                                <th class="px-6 py-4 text-center text-sm uppercase tracking-wider w-40">Trạng thái</th>
                                <th class="px-6 py-4 text-center text-sm uppercase tracking-wider w-36">Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="deTaiListBody" class="divide-y divide-gray-200">
                            @forelse($detais as $index => $item)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                                        {{ $index + 1 + ($detais->currentPage() - 1) * $detais->perPage() }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-bold text-[#1D546D]">
                                        {{ $item->TenDeTai }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700 font-medium">
                                        {{ $item->ThoiGianKetThuc ? \Carbon\Carbon::parse($item->ThoiGianKetThuc)->format('Y') : 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                        @php
                                            $status = mb_strtolower(trim($item->TrangThai), 'UTF-8');
                                            $statusClass = 'bg-gray-200 text-gray-700'; // Default
                                            
                                            if (str_contains($status, 'đang thực hiện') || str_contains($status, 'dang thuc hien')) {
                                                $statusClass = 'bg-yellow-100 text-yellow-800 border border-yellow-200';
                                            } elseif (str_contains($status, 'hoàn thành') || str_contains($status, 'hoan thanh')) {
                                                $statusClass = 'bg-green-100 text-green-800 border border-green-200';
                                            } elseif (str_contains($status, 'hủy') || str_contains($status, 'huy')) {
                                                $statusClass = 'bg-red-100 text-red-800 border border-red-200';
                                            }
                                        @endphp
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $statusClass }}">
                                            {{ $item->TrangThai }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <button class="px-4 py-2 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 font-semibold transition shadow-sm"
                                            onclick="openModal(
                                                '{{ $item->MaSo }}',
                                                '{{ addslashes($item->TenDeTai) }}',
                                                '{{ addslashes($item->ChuNhiem) }}',
                                                '{{ addslashes($item->DonVi) }}',
                                                '{{ addslashes($item->CapDeTai) }}',
                                                '{{ addslashes($item->LoaiDeTai) }}',
                                                '{{ $item->ThoiGianBatDau }}',
                                                '{{ $item->ThoiGianKetThuc }}',
                                                '{{ $item->TrangThai }}',
                                                '{{ addslashes($item->MucTieu) }}',
                                                '{{ addslashes($item->NoiDungChinh) }}',
                                                '{{ addslashes($item->ThanhVien) }}',
                                                '{{ addslashes($item->KetQua) }}',
                                                '{{ $item->FileSanPham }}',
                                                '{{ $item->KinhPhi }}'
                                            )">
                                            <i class="fas fa-eye mr-1"></i> Xem chi tiết
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500 text-lg">
                                        Chưa có đề tài nào để hiển thị.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center text-sm text-gray-600 gap-4">
                    <div>
                        Hiển thị {{ $detais->firstItem() }} - {{ $detais->lastItem() }} trong {{ $detais->total() }} đề tài
                    </div>
                    <div class="flex items-center gap-2">
                        {{ $detais->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="deTaiModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4 transition-opacity">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-4xl overflow-hidden flex flex-col max-h-[90vh]">
            
            <div class="px-6 py-4 bg-[#EBF4F6] border-b border-gray-200 flex justify-between items-center shrink-0">
                <h2 class="text-xl font-bold text-[#1D546D]">Chi tiết Đề tài Nghiên cứu</h2>
                <button onclick="closeModal()" class="text-gray-500 hover:text-red-500 transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <div class="p-6 overflow-y-auto space-y-5 text-gray-700">
                
                <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <div><span class="font-semibold text-gray-800">Mã số:</span> <span id="modalMaSo" class="ml-1 font-bold text-[#1D546D]"></span></div>
                    <div>
                        <span class="font-semibold text-gray-800">Trạng thái:</span> 
                        <span id="modalTrangThai" class="ml-2 inline-block bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold border border-blue-200"></span>
                    </div>
                </div>
                
                <div>
                    <span class="font-semibold text-gray-800 block mb-1">Tên đề tài:</span>
                    <div id="modalDeTai" class="font-bold text-gray-900 text-lg leading-snug"></div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><span class="font-semibold text-gray-800">Cấp đề tài:</span> <span id="modalCapDeTai" class="ml-1"></span></div>
                    <div><span class="font-semibold text-gray-800">Loại đề tài:</span> <span id="modalLoaiDeTai" class="ml-1"></span></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><span class="font-semibold text-gray-800">Chủ nhiệm:</span> <span id="modalChuNhiem" class="ml-1 text-[#1D546D] font-medium"></span></div>
                    <div><span class="font-semibold text-gray-800">Đơn vị:</span> <span id="modalDonVi" class="ml-1"></span></div>
                </div>
                <div>
                    <span class="font-semibold text-gray-800">Thành viên:</span>
                    <p id="modalThanhVien" class="mt-1 text-sm text-gray-600 leading-relaxed"></p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <div>
                        <i class="far fa-calendar-alt text-gray-500 mr-1"></i>
                        <span class="font-semibold text-gray-800">Bắt đầu:</span> <span id="modalThoiGianBatDau" class="ml-1"></span>
                    </div>
                    <div>
                        <i class="far fa-calendar-check text-gray-500 mr-1"></i>
                        <span class="font-semibold text-gray-800">Kết thúc:</span> <span id="modalThoiGianKetThuc" class="ml-1"></span>
                    </div>
                </div>

                <div>
                    <span class="font-semibold text-gray-800 block mb-1">Mục tiêu:</span>
                    <p id="modalMucTieu" class="bg-white p-3 rounded border border-gray-200 text-sm leading-relaxed text-gray-600"></p>
                </div>

                <div>
                    <span class="font-semibold text-gray-800 block mb-1">Nội dung chính:</span>
                    <p id="modalNoiDungChinh" class="bg-white p-3 rounded border border-gray-200 text-sm leading-relaxed text-gray-600"></p>
                </div>

                <div>
                    <span class="font-semibold text-gray-800 block mb-1">Kết quả:</span>
                    <p id="modalKetQua" class="bg-white p-3 rounded border border-gray-200 text-sm leading-relaxed text-gray-600"></p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center border-t border-gray-200 pt-4">
                    <div>
                        <span class="font-semibold text-gray-800">Kinh phí:</span>
                        <span id="modalKinhPhi" class="ml-2 font-bold text-green-600 text-lg"></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-800 block mb-2">File đính kèm:</span>
                        <a id="modalFile" href="#" target="_blank" class="inline-flex items-center px-4 py-2 bg-[#EBF4F6] border border-gray-200 rounded-md text-sm font-medium text-[#1D546D] hover:bg-gray-200 transition shadow-sm">
                            <i class="fas fa-file-pdf mr-2 text-red-500 text-lg"></i>
                            <span id="modalFileName">Xem file đính kèm</span>
                        </a>
                        <span id="noFileMsg" class="hidden text-sm text-gray-500 italic">Không có file đính kèm</span>
                    </div>
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
        // Hàm format ngày tháng
        function formatDate(dateString) {
            if (!dateString) return 'Không có thông tin';
            const date = new Date(dateString);
            return date.toLocaleDateString('vi-VN');
        }

        // Mở Modal và đổ dữ liệu
        function openModal(maSo, deTai, chuNhiem, donVi, capDeTai, loaiDeTai, thoiGianBatDau, thoiGianKetThuc, trangThai, mucTieu, noiDungChinh, thanhVien, ketQua, fileSanPham, kinhPhi) {
            
            document.getElementById('modalMaSo').textContent = maSo || 'N/A';
            document.getElementById('modalDeTai').textContent = deTai || 'Không có tên đề tài';
            document.getElementById('modalChuNhiem').textContent = chuNhiem || 'Chưa xác định';
            document.getElementById('modalDonVi').textContent = donVi || 'Không có thông tin';
            document.getElementById('modalCapDeTai').textContent = capDeTai || 'N/A';
            document.getElementById('modalLoaiDeTai').textContent = loaiDeTai || 'N/A';
            document.getElementById('modalThoiGianBatDau').textContent = formatDate(thoiGianBatDau);
            document.getElementById('modalThoiGianKetThuc').textContent = formatDate(thoiGianKetThuc);
            document.getElementById('modalTrangThai').textContent = trangThai || 'Chưa cập nhật';
            document.getElementById('modalMucTieu').textContent = mucTieu || 'Chưa có thông tin mục tiêu.';
            document.getElementById('modalNoiDungChinh').textContent = noiDungChinh || 'Chưa có nội dung.';
            document.getElementById('modalThanhVien').textContent = thanhVien || 'Không có thông tin thành viên.';
            document.getElementById('modalKetQua').textContent = ketQua || 'Chưa có báo cáo kết quả.';
            
            // Format Kinh phí
            const amount = parseFloat(kinhPhi);
            document.getElementById('modalKinhPhi').textContent = !isNaN(amount) ? amount.toLocaleString('vi-VN') + ' VNĐ' : 'N/A';

            // Xử lý File
            const fileLink = document.getElementById('modalFile');
            const fileName = document.getElementById('modalFileName');
            const noFileMsg = document.getElementById('noFileMsg');
            
            if (fileSanPham) {
                fileLink.href = '{{ asset('uploads/pdf') }}/' + fileSanPham;
                fileName.textContent = fileSanPham.split('/').pop();
                fileLink.style.display = 'inline-flex';
                noFileMsg.style.display = 'none';
            } else {
                fileLink.style.display = 'none';
                noFileMsg.style.display = 'inline-block';
            }

            // Hiển thị Modal
            const modal = document.getElementById('deTaiModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        // Đóng Modal
        function closeModal() {
            const modal = document.getElementById('deTaiModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Đóng modal khi bấm ra ngoài vùng đen
        document.getElementById('deTaiModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });

        // Tìm kiếm (Lọc trực tiếp trên bảng)
        document.getElementById('deTaiSearch').addEventListener('input', (e) => {
            const filter = e.target.value.toLowerCase();
            document.querySelectorAll('#deTaiListBody tr').forEach(row => {
                const nameCell = row.querySelector('td:nth-child(2)'); // Lọc theo cột "Tên đề tài"
                if (!nameCell) return;
                const text = nameCell.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>
@endsection