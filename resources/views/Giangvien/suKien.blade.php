@extends('layout.giangVien')

@section('title', 'Sự kiện')

@section('content')
    <div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
        <div class="max-w-[1400px] mx-auto">
            <!-- Tiêu đề -->
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">

                <div class="w-full md:w-72">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>

                        <input id="eventSearch" type="text" placeholder="Tìm tên sự kiện..."
                            class="w-full pr-3 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700"
                            style="padding-left: 2.5rem; background: #D9D9D9;" />
                    </div>
                </div>
            </div>

            <!-- Bảng danh sách -->
            <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead style="background-color: #EBF4F6 !important; color: black !important; font-weight: bold !important;">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">STT</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Tên sự kiện</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold uppercase tracking-wider">Trạng thái</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold uppercase tracking-wider">Xem chi tiết</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200" id="eventListBody">
                            @forelse($sukiens as $index => $event)
                                @php
                                    $eventDate = $event->ThoiGian ? \Carbon\Carbon::parse($event->ThoiGian) : null;
                                    $status = $eventDate && $eventDate->isPast() ? 'Hết hạn' : 'Sắp diễn ra';
                                @endphp
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                        {{ $index + 1 + ($sukiens->currentPage() - 1) * $sukiens->perPage() }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $event->TenSuKien }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold" data-status="{{ $status }}">
                                            {{ $status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <button type="button" class="view-details text-gray-600 hover:text-gray-900" 
                                            data-event-id="{{ $event->MaSuKien }}"
                                            data-event-name="{{ $event->TenSuKien }}"
                                            data-event-description="{{ $event->MoTa }}"
                                            data-event-location="{{ $event->DiaDiem }}"
                                            data-event-time="{{ $event->ThoiGian }}"
                                            data-event-format="{{ $event->HinhThuc }}"
                                            data-event-capacity="{{ $event->SoLuongToiDa }}"
                                            data-event-status="{{ $status }}">
                                            <span class="text-sm font-medium">Xem chi tiết</span>
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

                <!-- Phân trang -->
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

    <!-- Modal Chi tiết sự kiện -->
    <div id="suKienModal" class="bg-white rounded-xl shadow-lg mx-auto mt-6 relative overflow-hidden hidden" style="border: 1px solid #000; width: 100%; max-width: 600px;">
        <!-- Header -->
        <div class="px-8 py-2.5 relative rounded-xl" style="background-color: #D9D9D9; border-bottom: 1px solid #000;">
            <h2 class="text-2xl font-bold text-left" style="color: #21546B; padding-left: 15px; font-size: 1.25rem;">
                Chi tiết sự kiện
            </h2>
        </div>

            <!-- Content -->
            <div class="p-6 space-y-4 text-gray-700">
                <div class="flex justify-between text-sm">
                    <div>
                        <span class="font-semibold text-gray-800">Mã sự kiện:</span>
                        <span id="modalEventId"></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-800">Trạng thái:</span>
                        <span id="modalEventStatus" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold"></span>
                    </div>
                </div>

                <div>
                    <span class="font-semibold text-gray-800">Tên sự kiện:</span>
                    <span id="modalEventName"></span>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <span class="font-semibold text-gray-800">Thời gian:</span>
                        <span id="modalEventTime"></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-800">Địa điểm:</span>
                        <span id="modalEventLocation"></span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <span class="font-semibold text-gray-800">Hình thức:</span>
                        <span id="modalEventFormat"></span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-800">Số lượng tối đa:</span>
                        <span id="modalEventCapacity"></span>
                    </div>
                </div>

                <div>
                    <span class="font-semibold text-gray-800">Mô tả:</span>
                    <p id="modalEventDescription" class="mt-1 leading-relaxed"></p>
                </div>

                <div class="mt-4 border-t border-gray-200 pt-4">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Trạng thái đăng ký</p>
                            <p class="mt-1 text-sm text-gray-600" id="modalRegisterMessage">Chọn sự kiện để xem thông tin đăng ký.</p>
                        </div>
                        <button id="modalRegisterBtn" type="button" class="inline-flex items-center justify-center px-6 py-2 text-sm font-semibold rounded-lg text-white" style="background-color: #1D546D;">
                            Đăng ký
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const registeredEventsKey = 'registeredEvents';

        function getRegisteredEvents() {
            try {
                return JSON.parse(localStorage.getItem(registeredEventsKey) || '[]');
            } catch {
                return [];
            }
        }

        function setRegisteredEvents(list) {
            localStorage.setItem(registeredEventsKey, JSON.stringify(list));
        }

        function formatStatus(status) {
            const mapping = {
                'Sắp diễn ra': { label: 'Sắp diễn ra', bg: '#E6F7FF', color: '#0C4A6E' },
                'Đang đăng ký': { label: 'Đang đăng ký', bg: '#E6F7FF', color: '#0C4A6E' },
                'Đã đăng ký': { label: 'Đã đăng ký', bg: '#ECFDF5', color: '#0F5132' },
                'Hết hạn': { label: 'Hết hạn', bg: '#FEE2E2', color: '#991B1B' },
            };
            return mapping[status] || { label: status, bg: '#E2E8F0', color: '#1F2937' };
        }

        function updateStatusPills() {
            const registered = getRegisteredEvents();
            document.querySelectorAll('tbody tr').forEach(row => {
                const statusSpan = row.querySelector('span[data-status]');
                if (!statusSpan) return;
                const status = statusSpan.getAttribute('data-status');
                const button = row.querySelector('.view-details');
                const eventId = button.dataset.eventId;
                const isRegistered = registered.includes(parseInt(eventId));
                const computedStatus = isRegistered ? 'Đã đăng ký' : status;

                const formatted = formatStatus(computedStatus);
                statusSpan.textContent = formatted.label;
                statusSpan.style.backgroundColor = formatted.bg;
                statusSpan.style.color = formatted.color;
            });
        }

        function openEventModal(eventData) {
            const status = getRegisteredEvents().includes(eventData.id) ? 'Đã đăng ký' : eventData.status;
            const formatted = formatStatus(status);

            document.getElementById('modalEventId').textContent = eventData.id || '-';
            document.getElementById('modalEventName').textContent = eventData.name || '-';
            document.getElementById('modalEventTime').textContent = eventData.time ? eventData.time : '-';
            document.getElementById('modalEventLocation').textContent = eventData.location || '-';
            document.getElementById('modalEventFormat').textContent = eventData.format || '-';
            document.getElementById('modalEventCapacity').textContent = eventData.capacity || '-';
            document.getElementById('modalEventDescription').textContent = eventData.description || '-';

            const statusSpan = document.getElementById('modalEventStatus');
            statusSpan.textContent = formatted.label;
            statusSpan.style.backgroundColor = formatted.bg;
            statusSpan.style.color = formatted.color;

            const registerMessage = document.getElementById('modalRegisterMessage');
            const registerBtn = document.getElementById('modalRegisterBtn');
            const registered = getRegisteredEvents();

            if (status === 'Hết hạn') {
                registerMessage.textContent = 'Sự kiện đã hết hạn đăng ký.';
                registerBtn.textContent = 'Đã hết hạn';
                registerBtn.disabled = true;
                registerBtn.style.backgroundColor = '#D1D5DB';
                registerBtn.style.cursor = 'not-allowed';
            } else if (registered.includes(eventData.id)) {
                registerMessage.textContent = 'Bạn đã đăng ký sự kiện này.';
                registerBtn.textContent = 'Đã đăng ký';
                registerBtn.disabled = true;
                registerBtn.style.backgroundColor = '#10B981';
                registerBtn.style.cursor = 'not-allowed';
            } else {
                registerMessage.textContent = 'Bạn có thể đăng ký tham gia sự kiện này.';
                registerBtn.textContent = 'Đăng ký';
                registerBtn.disabled = false;
                registerBtn.style.backgroundColor = '#1D546D';
                registerBtn.style.cursor = 'pointer';
            }

            registerBtn.onclick = () => {
                const nowRegistered = getRegisteredEvents();
                if (nowRegistered.includes(eventData.id)) return;
                nowRegistered.push(eventData.id);
                setRegisteredEvents(nowRegistered);
                updateStatusPills();
                openEventModal(eventData);
                alert('Đăng ký thành công!');
            };

            const modal = document.getElementById('suKienModal');
            if (modal) {
                modal.classList.remove('hidden');
                modal.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        function closeEventModal() {
            const modal = document.getElementById('suKienModal');
            if (modal) {
                modal.classList.add('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.view-details').forEach(button => {
                button.addEventListener('click', () => {
                    const eventData = {
                        id: parseInt(button.dataset.eventId),
                        name: button.dataset.eventName,
                        description: button.dataset.eventDescription,
                        location: button.dataset.eventLocation,
                        time: button.dataset.eventTime,
                        format: button.dataset.eventFormat,
                        capacity: button.dataset.eventCapacity,
                        status: button.dataset.eventStatus
                    };
                    openEventModal(eventData);
                });
            });

            document.getElementById('eventSearch').addEventListener('input', (e) => {
                const filter = e.target.value.toLowerCase();
                document.querySelectorAll('#eventListBody tr').forEach(row => {
                    const nameCell = row.querySelector('td:nth-child(2)');
                    if (!nameCell) return;
                    const text = nameCell.textContent.toLowerCase();
                    row.style.display = text.includes(filter) ? '' : 'none';
                });
            });

            updateStatusPills();
        });
    </script>
@endsection
