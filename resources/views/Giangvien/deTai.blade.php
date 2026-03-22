@extends('layout.giangVien')

@section('title', 'Công bố Khoa học')

@section('content')
    <div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
        <div class="max-w-[1400px] mx-auto">

            <!-- Thanh tìm kiếm -->
             <div class="mb-6">
                <div class="relative" style="width:300px;">
                    
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"  style="padding-left:10px">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>

                    <input type="text"
                        placeholder="Tìm tên đề tài..."
                        style="padding-left:40px; background:#D9D9D9;"
                        class="w-full pr-3 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700">
                </div>
            </div>
            
            <!-- Header + Nút đề xuất đề tài -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                <button class="bg-[#1D546D] hover:bg-[#2c5d6e] text-white px-6 py-2.5 shadow-md transition flex items-center gap-2 font-medium">
                    <!-- <i class="fas fa-plus-circle"></i> -->
                    Đề xuất đề tài
                </button>
            </div>

            <!-- Bảng danh sách -->
            <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead style="background-color: #EBF4F6 !important; color: black !important; font-weight: bold !important;">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">STT</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Tên đề tài</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Năm</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Trạng thái</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($detais as $index => $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                        {{ $index + 1 + ($detais->currentPage() - 1) * $detais->perPage() }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $item->TenDeTai }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $item->ThoiGianKetThuc ? \Carbon\Carbon::parse($item->ThoiGianKetThuc)->format('Y') : '' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold"
                                            style="background-color: #12CD51; color: white;">
                                            {{ $item->TrangThai }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <button
                                            onclick="openModal(
                                                '{{ $item->MaSo }}',
                                                '{{ $item->TenDeTai }}',
                                                '{{ $item->ChuNhiem }}',
                                                '{{ $item->DonVi }}',
                                                '{{ $item->CapDeTai }}',
                                                '{{ $item->LoaiDeTai }}',
                                                '{{ $item->ThoiGianBatDau }}',
                                                '{{ $item->ThoiGianKetThuc }}',
                                                '{{ $item->TrangThai }}',
                                                '{{ $item->MucTieu }}',
                                                '{{ $item->NoiDungChinh }}',
                                                '{{ $item->ThanhVien }}',
                                                '{{ $item->KetQua }}',
                                                '{{ $item->FileSanPham }}',
                                                '{{ $item->KinhPhi }}'
                                            )"
                                            class="text-green-600 hover:text-green-900 text-xl">
                                            <i class="fas fa-eye" style="color:#3D99D7;"></i>
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

                <!-- Phân trang -->
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

    <!-- Modal Chi tiết đề tài -->
    <div id="deTaiModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-2xl mx-4 relative overflow-hidden" style="border: 1px solid #000; width: 450px; max-width: calc(100% - 2rem);">
            <!-- Header -->
            <div class="px-8 py-2.5 relative rounded-xl" style="background-color: #D9D9D9; border-bottom: 1px solid #000;">
                <h2 class="text-2xl font-bold text-left" style="color: #21546B; padding-left: 15px; font-size: 1.25rem;">
                    Chi tiết đề tài
                </h2>
            </div>

            <!-- Content -->
            <div class="p-6 space-y-4 text-gray-700">
                <div class="flex justify-between text-sm">
                    <div>
                        <span class="font-semibold text-gray-800">Mã số:</span>
                        <span id="modalMaSo"></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-800">Cấp đề tài:</span>
                        <span id="modalCapDeTai"></span>
                    </div>
                </div>

                <div>
                    <span class="font-semibold text-gray-800">Đề tài:</span>
                    <span id="modalDeTai"></span>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <span class="font-semibold text-gray-800">Chủ nhiệm:</span>
                        <span id="modalChuNhiem"></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-800">Đơn vị:</span>
                        <span id="modalDonVi"></span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <span class="font-semibold text-gray-800">Thời gian bắt đầu:</span>
                        <span id="modalThoiGianBatDau"></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-800">Thời gian kết thúc:</span>
                        <span id="modalThoiGianKetThuc"></span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <span class="font-semibold text-gray-800">Loại đề tài:</span>
                        <span id="modalLoaiDeTai"></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-800">Trạng thái:</span>
                        <span id="modalTrangThai"></span>
                    </div>
                </div>

                <div>
                    <span class="font-semibold text-gray-800">Mục tiêu:</span>
                    <p id="modalMucTieu" class="mt-1 leading-relaxed"></p>
                </div>

                <div>
                    <span class="font-semibold text-gray-800">Nội dung chính:</span>
                    <p id="modalNoiDungChinh" class="mt-1 leading-relaxed"></p>
                </div>

                <div>
                    <span class="font-semibold text-gray-800">Thành viên:</span>
                    <p id="modalThanhVien" class="mt-1 leading-relaxed"></p>
                </div>

                <div>
                    <span class="font-semibold text-gray-800">Kết quả:</span>
                    <p id="modalKetQua" class="mt-1 leading-relaxed"></p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <span class="font-semibold text-gray-800">Kinh phí:</span>
                        <span id="modalKinhPhi"></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="font-semibold text-gray-800">File sản phẩm:</span>
                        <a id="modalFile" href="#" target="_blank" class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded-lg hover:bg-gray-200 transition">
                            <i class="fas fa-file-pdf text-red-600"></i>
                            <span id="modalFileName" class="text-gray-700"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script để mở/đóng modal -->
    <script>
        function openModal(maSo, deTai, chuNhiem, donVi, capDeTai, loaiDeTai, thoiGianBatDau, thoiGianKetThuc, trangThai, mucTieu, noiDungChinh, thanhVien, ketQua, fileSanPham, kinhPhi) {
            console.log('openModal called with:', deTai);
            document.getElementById('modalMaSo').textContent = maSo ?? '-';
            document.getElementById('modalDeTai').textContent = deTai || 'Không có thông tin';
            document.getElementById('modalChuNhiem').textContent = chuNhiem || 'Không có thông tin';
            document.getElementById('modalDonVi').textContent = donVi || 'Không có thông tin';
            document.getElementById('modalCapDeTai').textContent = capDeTai || 'Không có thông tin';
            document.getElementById('modalLoaiDeTai').textContent = loaiDeTai || 'Không có thông tin';
            document.getElementById('modalThoiGianBatDau').textContent = thoiGianBatDau ? new Date(thoiGianBatDau).toLocaleDateString() : 'Không có thông tin';
            document.getElementById('modalThoiGianKetThuc').textContent = thoiGianKetThuc ? new Date(thoiGianKetThuc).toLocaleDateString() : 'Không có thông tin';
            document.getElementById('modalTrangThai').textContent = trangThai || 'Không có thông tin';
            document.getElementById('modalMucTieu').textContent = mucTieu || 'Không có thông tin';
            document.getElementById('modalNoiDungChinh').textContent = noiDungChinh || 'Không có thông tin';
            document.getElementById('modalThanhVien').textContent = thanhVien || 'Không có thông tin';
            document.getElementById('modalKetQua').textContent = ketQua || 'Không có thông tin';
            document.getElementById('modalKinhPhi').textContent = kinhPhi ? Number(kinhPhi).toLocaleString() + ' đ' : 'Không có thông tin';

            const fileLink = document.getElementById('modalFile');
            fileLink.textContent = fileSanPham ? fileSanPham.split('/').pop() : 'Không có file';
            fileLink.href = fileSanPham ? '{{ asset('storage/') }}' + fileSanPham : '#';

            const modal = document.getElementById('deTaiModal');
            console.log('Modal element:', modal);
            if (modal) {
                modal.classList.remove('hidden');
                console.log('Modal shown');
            } else {
                console.error('Modal element not found');
            }
        }

        function closeModal() {
            document.getElementById('deTaiModal').classList.add('hidden');
        }

        // Đóng modal khi click bên ngoài
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('deTaiModal');
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) closeModal();
                });
            }
        });
    </script>
@endsection