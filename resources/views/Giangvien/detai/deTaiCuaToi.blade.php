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
            <div class="flex flex-wrap gap-4 mb-6">
                <button id="tab-de-xuat" 
                        class="px-6 py-3 rounded-lg font-medium transition tab-btn bg-gray-200 text-gray-700 hover:bg-gray-300">
                    Đề xuất đề tài
                </button>
                <button id="tab-de-tai-cua-toi" 
                        class="px-6 py-3 rounded-lg font-medium transition tab-btn active bg-[#1D546D] text-white shadow-md">
                    Đề tài của tôi
                </button>
            </div>

            <!-- Tab 1: Đề xuất đề tài (link về file cũ nếu cần, hoặc ẩn) -->
            <div id="content-de-xuat" class="tab-content hidden">
                <!-- Nếu bạn muốn giữ nội dung đề xuất đề tài từ file cũ, có thể @include hoặc copy bảng -->
                <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-200 p-8 text-center text-gray-600">
                    Nội dung đề xuất đề tài (có thể @include('giangvien.deTai') hoặc giữ trống nếu chuyển sang file khác)
                </div>
            </div>

            <!-- Tab 2: Đề tài của tôi -->
            <div id="content-de-tai-cua-toi" class="tab-content">
                <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-200 flex-1 flex flex-col min-h-[600px]">
                    <div class="overflow-x-auto flex-1">
                        <table class="min-w-full divide-y divide-gray-200 h-full table-fixed">
                            <thead class="bg-[#1D546D] text-white sticky top-0 z-10">
                                <tr>
                                    <th class="w-16 px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">STT</th>
                                    <th class="w-3/5 px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Tên đề tài</th>
                                    <th class="w-1/4 px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Trạng thái</th>
                                    <th class="w-1/4 px-6 py-4 text-center text-sm font-semibold uppercase tracking-wider">Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @forelse($deTaiCuaToi as $index => $item)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-900 font-medium text-center">
                                            {{ $index + 1 + ($deTaiCuaToi->currentPage() - 1) * $deTaiCuaToi->perPage() }}
                                        </td>
                                        <td class="px-6 py-5 text-sm font-medium text-gray-900 truncate">
                                            {{ $item->TenDeTai }}
                                        </td>
                                        <td class="px-6 py-5 whitespace-nowrap text-center">
                                            <span class="px-4 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                  {{ $item->TrangThai == 'Đang thực hiện' ? 'bg-blue-100 text-blue-800' : 
                                                     ($item->TrangThai == 'Chờ phê duyệt' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                                {{ $item->TrangThai ?? 'Chưa xác định' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-5 whitespace-nowrap text-center">
                                            <button 
                                                onclick="openCapNhatModal('{{ addslashes($item->TenDeTai) }}', '{{ $item->TrangThai ?? 'Chưa xác định' }}', '{{ $item->PhanTramTienDo ?? 0 }}', '{{ $item->MaSo }}')"
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
    </div>

    <!-- Modal Cập nhật tiến độ đề tài -->
    <div id="capNhatModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-2xl max-w-3xl w-full mx-4 p-8 relative overflow-y-auto max-h-[90vh]">
            <button onclick="closeCapNhatModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-2xl font-bold">
                ×
            </button>

            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center border-b pb-4">
                Cập nhật tiến độ đề tài
            </h2>

            <div class="space-y-6 text-gray-700">
                <div>
                    <span class="font-semibold block mb-1">Tên đề tài:</span> 
                    <span id="modalTenDeTai" class="text-lg font-medium block"></span>
                </div>
                <div>
                    <span class="font-semibold block mb-1">Trạng thái hiện tại:</span> 
                    <span id="modalTrangThai" class="text-lg block"></span>
                </div>
                <div>
                    <span class="font-semibold block mb-1">Tiến độ hiện tại:</span> 
                    <div class="mt-2 text-xl font-bold text-[#1D546D]" id="modalPhanTram"></div>
                </div>

                <form class="space-y-6" method="POST" action="{{ route('giangvien.cap-nhat-tien-do') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="maDeTai" id="modalMaDeTai">

                    <div>
                        <label class="block font-semibold mb-1">Tiêu đề cập nhật</label>
                        <input type="text" name="tieuDe" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D546D]">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Thời gian cập nhật</label>
                        <div class="relative">
                            <input type="date" name="thoiGian" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D546D]">
                            <i class="fas fa-calendar-alt absolute right-3 top-1/2 -translate-y-1/2 text-gray-500"></i>
                        </div>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Phần trăm tiến độ (%)</label>
                        <input type="number" name="phanTram" min="0" max="100" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D546D]">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Nội dung báo cáo</label>
                        <textarea name="noiDung" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D546D]"></textarea>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Kết quả đạt được</label>
                        <textarea name="ketQua" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D546D]"></textarea>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Khó khăn</label>
                        <textarea name="khoKhan" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D546D]"></textarea>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">File minh chứng / báo cáo</label>
                        <input type="file" name="fileBaoCao" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>
                </form>

                <!-- Thông báo thành công -->
                <div id="thanhCongMsg" class="hidden mt-6 p-4 bg-green-100 text-green-800 rounded-lg text-center font-medium">
                    Tiến độ đề tài cập nhật thành công!
                </div>

                <!-- Nút hành động -->
                <div class="mt-8 flex justify-center gap-4 flex-wrap">
                    <button onclick="closeCapNhatModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg shadow-md transition">
                        Hủy
                    </button>
                    <button type="submit" form="capNhatForm" class="bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-3 rounded-lg shadow-md transition">
                        Lưu nháp
                    </button>
                    <button type="submit" form="capNhatForm" onclick="document.getElementById('thanhCongMsg').classList.remove('hidden'); setTimeout(() => { closeCapNhatModal(); }, 2000)" 
                            class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg shadow-md transition">
                        Gửi báo cáo
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script tab switch + modal + tìm kiếm -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabDeXuat = document.getElementById('tab-de-xuat');
            const tabCuaToi = document.getElementById('tab-de-tai-cua-toi');
            const contentDeXuat = document.getElementById('content-de-xuat');
            const contentCuaToi = document.getElementById('content-de-tai-cua-toi');

            tabDeXuat.addEventListener('click', () => {
                tabDeXuat.classList.add('bg-[#1D546D]', 'text-white', 'shadow-md');
                tabDeXuat.classList.remove('bg-gray-200', 'text-gray-700');
                tabCuaToi.classList.add('bg-gray-200', 'text-gray-700');
                tabCuaToi.classList.remove('bg-[#1D546D]', 'text-white', 'shadow-md');

                contentDeXuat.classList.remove('hidden');
                contentCuaToi.classList.add('hidden');
            });

            tabCuaToi.addEventListener('click', () => {
                tabCuaToi.classList.add('bg-[#1D546D]', 'text-white', 'shadow-md');
                tabCuaToi.classList.remove('bg-gray-200', 'text-gray-700');
                tabDeXuat.classList.add('bg-gray-200', 'text-gray-700');
                tabDeXuat.classList.remove('bg-[#1D546D]', 'text-white', 'shadow-md');

                contentCuaToi.classList.remove('hidden');
                contentDeXuat.classList.add('hidden');
            });

            // Tìm kiếm client-side
            document.getElementById('deTaiSearch').addEventListener('input', (e) => {
                const filter = e.target.value.toLowerCase();
                const activeContent = document.querySelector('.tab-content:not(.hidden)');
                if (!activeContent) return;
                activeContent.querySelectorAll('tbody tr').forEach(row => {
                    const nameCell = row.querySelector('td:nth-child(2)');
                    if (!nameCell) return;
                    const text = nameCell.textContent.toLowerCase();
                    row.style.display = text.includes(filter) ? '' : 'none';
                });
            });
        });

        // Modal cập nhật tiến độ
        function openCapNhatModal(tenDeTai, trangThai, phanTram, maDeTai) {
            document.getElementById('modalTenDeTai').textContent = tenDeTai || 'Không có thông tin';
            document.getElementById('modalTrangThai').textContent = trangThai || 'Không có thông tin';
            document.getElementById('modalPhanTram').textContent = phanTram || '0';
            document.getElementById('modalMaDeTai').value = maDeTai || '';

            document.getElementById('capNhatModal').classList.remove('hidden');
        }

        function closeCapNhatModal() {
            document.getElementById('capNhatModal').classList.add('hidden');
            document.getElementById('thanhCongMsg').classList.add('hidden');
        }

        document.getElementById('capNhatModal').addEventListener('click', function(e) {
            if (e.target === this) closeCapNhatModal();
        });
    </script>
@endsection