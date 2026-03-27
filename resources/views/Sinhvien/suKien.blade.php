@extends('layout.sinhVien')

@section('title', 'Sự kiện')

@section('content')
    <div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
        <div class="max-w-[1400px] mx-auto">
            
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
                <h2 class="text-2xl font-bold text-[#1D546D] border-l-4 border-[#1D546D] pl-3">
                    Danh sách Sự kiện
                </h2>

                <div class="relative w-full md:w-80 shadow-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fas fa-search text-gray-500"></i>
                    </div>
                    <input type="text" id="eventSearch" placeholder="Tìm tên sự kiện..."
                        class="w-full pl-10 pr-3 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-700 focus:ring-2 focus:ring-[#1D546D] focus:outline-none transition">
                </div>
            </div>

            <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead style="background-color: #EBF4F6 !important; color: black !important; font-weight: bold !important;">
                            <tr>
                                <th class="px-6 py-4 text-center text-sm uppercase tracking-wider w-16">STT</th>
                                <th class="px-6 py-4 text-left text-sm uppercase tracking-wider">Tên sự kiện</th>
                                <th class="px-6 py-4 text-center text-sm uppercase tracking-wider w-36">Trạng thái</th>
                                <th class="px-6 py-4 text-center text-sm uppercase tracking-wider w-40">Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200" id="eventListBody">
                            @forelse($sukiens as $index => $event)
                                @php
                                    $eventDate = $event->ThoiGian ? \Carbon\Carbon::parse($event->ThoiGian) : null;
                                    $status = $eventDate && $eventDate->isPast() ? 'Hết hạn' : 'Sắp diễn ra';
                                    $statusClass = $status === 'Hết hạn' ? 'bg-red-100 text-red-800 border-red-200' : 'bg-blue-100 text-blue-800 border-blue-200';
                                @endphp
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900 font-medium">
                                        {{ $index + 1 + ($sukiens->currentPage() - 1) * $sukiens->perPage() }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-bold text-[#1D546D]">
                                        {{ $event->TenSuKien }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border {{ $statusClass }}">
                                            {{ $status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <button class="px-4 py-2 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 font-semibold transition shadow-sm flex items-center justify-center gap-1 mx-auto"
                                            onclick="openEventModal(
                                                '{{ $event->MaSuKien }}',
                                                '{{ addslashes($event->TenSuKien) }}',
                                                '{{ $status }}',
                                                '{{ $event->ThoiGian ? \Carbon\Carbon::parse($event->ThoiGian)->format('d/m/Y') : 'Chưa xác định' }}',
                                                '{{ addslashes($event->DiaDiem) }}',
                                                '{{ addslashes($event->HinhThuc) }}',
                                                '{{ $event->tong_dang_ky ?? 0 }} / {{ $event->SoLuongToiDa ?? '∞' }}',
                                                '{{ addslashes($event->MoTa) }}'
                                            )">
                                            <i class="fas fa-eye"></i> Xem chi tiết
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-500 text-lg">
                                        Chưa có sự kiện nào để hiển thị.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center text-sm text-gray-600 gap-4">
                    <div>
                        Hiển thị {{ $sukiens->firstItem() }} - {{ $sukiens->lastItem() }} trong {{ $sukiens->total() }} sự kiện
                    </div>
                    <div class="flex items-center gap-2">
                        {{ $sukiens->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="suKienModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4 transition-opacity">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
            
            <div class="px-6 py-4 bg-[#EBF4F6] border-b border-gray-200 flex justify-between items-center shrink-0">
                <h2 class="text-xl font-bold text-[#1D546D]">Chi tiết Sự kiện</h2>
                <button onclick="closeEventModal()" class="text-gray-500 hover:text-red-500 transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <div class="p-6 overflow-y-auto space-y-5 text-gray-700">
                
                <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <div>
                        <span class="font-semibold text-gray-800">Mã sự kiện:</span>
                        <span id="modalEventId" class="ml-1 font-bold text-[#1D546D]"></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-800">Trạng thái:</span>
                        <span id="modalEventStatus" class="ml-2 inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border"></span>
                    </div>
                </div>

                <div>
                    <span class="font-semibold text-gray-800 block mb-1">Tên sự kiện:</span>
                    <div id="modalEventName" class="font-bold text-gray-900 text-lg leading-snug"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <span class="font-semibold text-gray-800">Thời gian:</span>
                        <span id="modalEventTime" class="ml-1"></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-800">Địa điểm:</span>
                        <span id="modalEventLocation" class="ml-1"></span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <span class="font-semibold text-gray-800">Hình thức:</span>
                        <span id="modalEventFormat" class="ml-1"></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-800">Số lượng đã đăng ký:</span>
                        <span id="modalEventCapacity" class="ml-1 font-semibold text-[#1D546D]"></span>
                    </div>
                </div>

                <div>
                    <span class="font-semibold text-gray-800 block mb-2">Mô tả chi tiết:</span>
                    <p id="modalEventDescription" class="bg-white p-4 rounded-lg border border-gray-200 text-sm leading-relaxed text-gray-600 shadow-sm whitespace-pre-line"></p>
                </div>
            </div>
            
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end shrink-0">
                <button onclick="closeEventModal()" class="px-6 py-2 bg-gray-300 text-gray-800 font-semibold rounded-lg hover:bg-gray-400 transition shadow-sm">
                    Đóng
                </button>
            </div>
        </div>
    </div>

    <script>
        // Mở Modal và đổ dữ liệu
        function openEventModal(id, name, status, time, location, format, capacity, description) {
            document.getElementById('modalEventId').textContent = id || '-';
            document.getElementById('modalEventName').textContent = name || 'Không có tên';
            document.getElementById('modalEventTime').textContent = time || '-';
            document.getElementById('modalEventLocation').textContent = location || '-';
            document.getElementById('modalEventFormat').textContent = format || '-';
            document.getElementById('modalEventCapacity').textContent = capacity || '-';
            document.getElementById('modalEventDescription').textContent = description || 'Không có mô tả chi tiết.';

            // Xử lý màu sắc của Trạng thái
            const statusSpan = document.getElementById('modalEventStatus');
            statusSpan.textContent = status;
            if (status === 'Hết hạn') {
                statusSpan.className = 'ml-2 inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border bg-red-100 text-red-800 border-red-200';
            } else {
                statusSpan.className = 'ml-2 inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border bg-blue-100 text-blue-800 border-blue-200';
            }

            const modal = document.getElementById('suKienModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        // Đóng Modal
        function closeEventModal() {
            const modal = document.getElementById('suKienModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Đóng modal khi bấm ra ngoài vùng đen
        document.getElementById('suKienModal').addEventListener('click', function(e) {
            if (e.target === this) closeEventModal();
        });

        // Tìm kiếm trên bảng
        document.getElementById('eventSearch').addEventListener('input', (e) => {
            const filter = e.target.value.toLowerCase();
            document.querySelectorAll('#eventListBody tr').forEach(row => {
                const nameCell = row.querySelector('td:nth-child(2)'); // Tìm theo Tên sự kiện
                if (!nameCell) return;
                const text = nameCell.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>
@endsection