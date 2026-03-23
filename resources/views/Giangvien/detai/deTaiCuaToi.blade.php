@extends('layout.giangVien')

@section('title', 'Đề tài Nghiên cứu')

@section('content')
    <div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
        <div class="max-w-[1400px] mx-auto flex flex-col min-h-[calc(100vh-140px)]">

            <!-- Thanh tìm kiếm -->
            <div class="mb-6">
                <div class="relative" style="width:300px;">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none" style="padding-left:10px">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" id="deTaiSearch"
                           placeholder="Tìm tên đề tài..."
                           style="padding-left:40px; background:#D9D9D9;"
                           class="w-full pr-3 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700">
                </div>
            </div>

            <!-- Tab buttons -->
            <div class="flex flex-row justify-start items-center mb-6 gap-2">
            <a href="{{ route('giangvien.deTai') }}">
                <button
                    class="bg-[#6B727F] hover:bg-[#2c5d6e] text-white px-6 py-2.5 shadow-md transition flex items-center gap-2 font-medium">
                    <!-- <i class="fas fa-plus-circle"></i> -->
                    Tất cả đề tài
                </button>
            </a>
            <a href="#">
                <button
                    class="bg-[#1D546D] text-white px-6 py-2.5 shadow-md transition flex items-center gap-2 font-medium">
                    <!-- <i class="fas fa-plus-circle"></i> -->
                    Đề xuất của tôi
                </button>
            </a>
            <a href="{{ route('giangvien.detai.sugget') }}">
                <button
                    class="bg-[#6B727F] hover:bg-[#2c5d6e] text-white px-6 py-2.5 shadow-md transition flex items-center gap-2 font-medium">
                    <!-- <i class="fas fa-plus-circle"></i> -->
                    Đề xuất đề tài
                </button>
            </a>
        </div>

            <!-- Bảng danh sách -->
            <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-200 flex-1 flex flex-col min-h-[600px]">
                <div class="overflow-x-auto flex-1">
                    <table class="min-w-full divide-y divide-gray-200 h-full table-fixed">
                        <thead class="bg-[#EBF4F6] sticky top-0 z-10">
                            <tr>
                                <th class="w-16 px-6 py-4 text-center text-sm font-bold uppercase tracking-wider">STT</th>
                                <th class="w-3/5 px-6 py-4 text-center text-sm font-bold uppercase tracking-wider">Tên đề tài</th>
                                <th class="w-1/4 px-6 py-4 text-center text-sm font-bold uppercase tracking-wider">Trạng thái</th>
                                <th class="w-1/4 px-6 py-4 text-center text-sm font-bold uppercase tracking-wider">Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($deTaiCuaToi as $index => $item)
                                @php
                                    // Lấy tiến độ gần nhất trực tiếp bằng Model
                                    $tienDoCu = \App\Models\Tiendodetai::where('MaDeTai', $item->MaSo)
                                                    ->orderBy('ThoiGianCapNhat', 'desc')
                                                    ->first();
                                @endphp
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-900 font-medium text-center">
                                        {{ $index + 1 + ($deTaiCuaToi->currentPage() - 1) * $deTaiCuaToi->perPage() }}
                                    </td>
                                    <td class="px-6 py-5 text-sm font-medium text-gray-900 truncate text-center">
                                        {{ $item->TenDeTai }}
                                    </td>
                                    <td class="px-6 py-5 whitespace-nowrap text-center">
                                        @if($item->TrangThai == 'Đang thực hiện')
                                            <span class="px-4 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#619597] text-white">
                                                {{ $item->TrangThai }}
                                            </span>
                                        @elseif($item->TrangThai == 'Chờ phê duyệt')
                                            <span class="px-4 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#67C3D9] text-white">
                                                {{ $item->TrangThai }}
                                            </span>
                                        @else
                                            <span class="px-4 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                {{ $item->TrangThai ?? 'Chưa xác định' }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-5 whitespace-nowrap text-center">
                                        <button type="button"
                                            data-maso="{{ $item->MaSo }}"
                                            data-tendetai="{{ $item->TenDeTai }}"
                                            data-trangthai="{{ $item->TrangThai ?? 'Chưa xác định' }}"
                                            data-phantram="{{ $tienDoCu->PhanTramTienDo ?? $item->PhanTramTienDo ?? 0 }}"
                                            data-noidung="{{ $tienDoCu->NoiDungBaoCao ?? '' }}"
                                            data-ketqua="{{ $tienDoCu->KetQua ?? '' }}"
                                            data-khokhan="{{ $tienDoCu->KhoKhan ?? '' }}"
                                            onclick="openCapNhatModal(this)"
                                            class="text-blue-600 hover:text-blue-900 font-medium px-4 py-2 bg-blue-50 rounded hover:bg-blue-100 transition">
                                            Cập nhật tiến độ
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-20 text-center text-gray-500 text-lg">
                                        Bạn chưa có đề tài nào.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Phân trang -->
                <div class="px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center text-sm text-gray-600 gap-4 bg-white">
                    <div>
                        Hiển thị {{ $deTaiCuaToi->firstItem() }} - {{ $deTaiCuaToi->lastItem() }} trong {{ $deTaiCuaToi->total() }} đề tài
                    </div>
                    <div class="flex items-center gap-2">
                        {{ $deTaiCuaToi->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cập nhật tiến độ đề tài -->
    <div id="capNhatModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-2xl max-w-5xl w-full mx-4 p-0 relative overflow-hidden max-h-[90vh] flex flex-col">
            
            <!-- Tiêu đề modal -->
            <div class="bg-[#EBF4F6] px-8 py-5 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 text-center">
                    Cập nhật tiến độ đề tài
                </h2>
            </div>

            <!-- Nội dung chính - 2 cột -->
            <div class="flex flex-col md:flex-row gap-8 p-8 overflow-y-auto flex-1">
                
                <!-- Cột trái: Thông tin hiện tại + Form cập nhật -->
                <div class="md:w-1/2 space-y-6">
                    <!-- Thông tin hiện tại -->
                    <div class="space-y-4">
                        <div>
                            <span class="font-semibold text-gray-700 block mb-1">Tên đề tài:</span>
                            <span id="modalTenDeTai" class="text-lg font-medium block text-gray-900"></span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700 block mb-1">Trạng thái hiện tại:</span>
                            <span id="modalTrangThai" class="text-lg font-medium block text-gray-900"></span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700 block mb-1">Tiến độ hiện tại:</span>
                            <div class="text-2xl font-bold text-[#1D546D]" id="modalPhanTram"></div>
                        </div>
                    </div>

                    <!-- Form cập nhật -->
                    <form id="capNhatForm" method="POST" action="{{ route('giangvien.capNhatTienDo') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <input type="hidden" name="maDeTai" id="modalMaDeTai">

                        <div>
                            <label class="block font-semibold text-gray-700 mb-1">Tiêu đề cập nhật</label>
                            <input type="text" name="tieuDe" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D546D] transition">
                        </div>

                        <div>
                            <label class="block font-semibold text-gray-700 mb-1">Thời gian cập nhật</label>
                            <div class="relative">
                                <input type="date" name="thoiGian" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D546D] transition">
                                <i class="fas fa-calendar-alt absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none"></i>
                            </div>
                        </div>

                        <div>
                            <label class="block font-semibold text-gray-700 mb-1">Phần trăm tiến độ (%)</label>
                            <input type="number" name="phanTram" min="0" max="100" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D546D] transition">
                        </div>

                        <div>
                            <label class="block font-semibold text-gray-700 mb-1">Nội dung báo cáo</label>
                            <textarea name="noiDung" rows="5" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D546D] transition resize-y"></textarea>
                        </div>
                    </form>
                </div>

                <!-- Cột phải -->
                <div class="md:w-1/2 space-y-6">
                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">Kết quả đạt được</label>
                        <textarea name="ketQua" rows="5" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D546D] transition resize-y"></textarea>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">Khó khăn</label>
                        <textarea name="khoKhan" rows="5" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D546D] transition resize-y"></textarea>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">File minh chứng / báo cáo</label>
                        <input type="file" name="fileBaoCao" form="capNhatForm" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D546D] transition">
                        <p class="text-xs text-gray-500 mt-1">Hỗ trợ: word, pdf, excel,...</p>
                    </div>
                </div>
            </div>

            <!-- Nút hành động -->
            <div class="px-8 py-6 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div id="thanhCongMsg" class="hidden text-green-600 font-medium">
                    Tiến độ đề tài cập nhật thành công!
                </div>

                <div class="flex gap-4 flex-wrap">
                    <button onclick="closeCapNhatModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg shadow-md transition font-medium">
                        Hủy
                    </button>
                    <button type="submit" form="capNhatForm" name="action" value="luu_nhap" class="bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-3 rounded-lg shadow-md transition font-medium">
                        Lưu nháp
                    </button>
                    <button type="submit" form="capNhatForm" class="bg-[#1D546D] hover:bg-[#2c5d6e] text-white px-8 py-3 rounded-lg shadow-md transition font-medium">
                        Gửi báo cáo
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script mở/đóng modal -->
    <script>
        function openCapNhatModal(btn) {
        // 1. Reset form
        document.getElementById('capNhatForm').reset();

        // 2. Đọc dữ liệu từ nút bấm (biến 'btn')
        const maDeTai = btn.dataset.maso;
        const tenDeTai = btn.dataset.tendetai;
        const trangThai = btn.dataset.trangthai;
        const phanTram = btn.dataset.phantram;
        const noiDung = btn.dataset.noidung;
        const ketQua = btn.dataset.ketqua;
        const khoKhan = btn.dataset.khokhan;

        // 3. Hiển thị thông tin bên ngoài
        document.getElementById('modalMaDeTai').value = maDeTai || '';
        document.getElementById('modalTenDeTai').textContent = tenDeTai || 'Không có thông tin';
        document.getElementById('modalTrangThai').textContent = trangThai || 'Không có thông tin';
        document.getElementById('modalPhanTram').textContent = (phanTram || '0') + '%';

        // 4. Set mặc định thời gian cập nhật là ngày hôm nay
        const today = new Date().toISOString().split('T')[0];
        document.querySelector('input[name="thoiGian"]').value = today;

        // 5. Điền dữ liệu cũ vào các ô input/textarea
        document.querySelector('input[name="phanTram"]').value = phanTram || 0;
        document.querySelector('textarea[name="noiDung"]').value = noiDung || '';
        document.querySelector('textarea[name="ketQua"]').value = ketQua || '';
        document.querySelector('textarea[name="khoKhan"]').value = khoKhan || '';

        // 6. Hiển thị Modal lên
        document.getElementById('capNhatModal').classList.remove('hidden');
    }

    function closeCapNhatModal() {
        document.getElementById('capNhatModal').classList.add('hidden');
    }

    document.getElementById('capNhatModal').addEventListener('click', function(e) {
        if (e.target === this) closeCapNhatModal();
    });
    </script>
@endsection
@if ($errors->any())
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Có thể lấy lại ID đề tài cũ từ session hoặc flash data để mở đúng form
        document.getElementById('capNhatModal').classList.remove('hidden');
        alert("Có lỗi xảy ra: \n" + @json($errors->all()).join('\n'));
    });
</script>
@endif