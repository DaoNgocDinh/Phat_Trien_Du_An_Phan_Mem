@extends('layout.admin')

@section('title', 'Quản lý Sự kiện')

@section('content')
<div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
    <div class="max-w-[1400px] mx-auto">
        
        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
            <h2 class="text-2xl font-bold text-[#1D546D]">Quản lý Sự kiện</h2>
            <button onclick="openFormModal('add')" class="px-5 py-2.5 bg-[#1D546D] text-white font-semibold rounded-lg hover:bg-[#154053] transition shadow-md flex items-center gap-2">
                <i class="fas fa-plus"></i> Thêm sự kiện mới
            </button>
        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full divide-y divide-gray-200">
                    <thead style="background-color: #EBF4F6 !important; color: black !important; font-weight: bold !important;">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold uppercase">Mã</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold uppercase">Tên sự kiện</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold uppercase">Thời gian</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold uppercase">Số lượng</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold uppercase">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($sukiens as $event)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                    {{ $event->MaSuKien }}
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                    {{ $event->TenSuKien }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-600">
                                    {{ \Carbon\Carbon::parse($event->ThoiGian)->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">
                                    {{ $event->tong_dang_ky ?? 0 }} / {{ $event->SoLuongToiDa ?? '∞' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium flex justify-center gap-3">
                                    
                                    <button class="text-blue-600 hover:text-blue-900" title="Xem chi tiết"
                                        onclick="openDetailModal({{ json_encode($event) }}, '{{ \Carbon\Carbon::parse($event->ThoiGian)->format('d/m/Y') }}', '{{ $event->tong_dang_ky ?? 0 }}')">
                                        <i class="fas fa-eye text-lg"></i>
                                    </button>

                                    <button class="text-yellow-500 hover:text-yellow-700" title="Sửa sự kiện"
                                        onclick="openFormModal('edit', {{ json_encode($event) }})">
                                        <i class="fas fa-edit text-lg"></i>
                                    </button>

                                    <form action="{{ route('admin.sukien.destroy', $event->MaSuKien) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sự kiện này? Toàn bộ lượt đăng ký của sự kiện cũng sẽ bị xóa!');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700" title="Xóa sự kiện">
                                            <i class="fas fa-trash-alt text-lg"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500 text-lg">
                                    Chưa có sự kiện nào.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $sukiens->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</div>

<div id="detailModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl mx-4 overflow-hidden">
        <div class="px-6 py-4 bg-[#EBF4F6] border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-xl font-bold text-[#1D546D]">Chi tiết Sự kiện</h2>
            <button onclick="closeModal('detailModal')" class="text-gray-500 hover:text-red-500"><i class="fas fa-times text-xl"></i></button>
        </div>
        <div class="p-6 space-y-4 text-gray-700">
            <div class="grid grid-cols-2 gap-4">
                <div><span class="font-semibold">Mã sự kiện:</span> <span id="dt_id"></span></div>
                <div><span class="font-semibold">Thời gian:</span> <span id="dt_time"></span></div>
            </div>
            <div><span class="font-semibold">Tên sự kiện:</span> <span id="dt_name" class="font-bold text-black"></span></div>
            <div class="grid grid-cols-2 gap-4">
                <div><span class="font-semibold">Địa điểm:</span> <span id="dt_location"></span></div>
                <div><span class="font-semibold">Hình thức:</span> <span id="dt_format"></span></div>
            </div>
            <div><span class="font-semibold">Số lượng (Hiện tại/Tối đa):</span> <span id="dt_capacity" class="text-blue-600 font-bold"></span></div>
            <div>
                <span class="font-semibold">Mô tả:</span>
                <p id="dt_desc" class="mt-2 bg-gray-50 p-3 rounded border border-gray-100 whitespace-pre-line"></p>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 text-right">
            <button onclick="closeModal('detailModal')" class="px-5 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Đóng</button>
        </div>
    </div>
</div>

<div id="formModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 overflow-y-auto pt-10 pb-10">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl mx-4 overflow-hidden relative">
        <div class="px-6 py-4 bg-[#1D546D] text-white flex justify-between items-center">
            <h2 id="formModalTitle" class="text-xl font-bold">Thêm Sự kiện</h2>
            <button onclick="closeModal('formModal')" class="text-gray-300 hover:text-white"><i class="fas fa-times text-xl"></i></button>
        </div>
        
        <form id="actionForm" method="POST" action="">
            @csrf
            <input type="hidden" name="_method" id="formMethod" value="POST">
            
            <div class="p-6 space-y-4 text-gray-700">
                <div>
                    <label class="block font-semibold mb-1">Tên sự kiện <span class="text-red-500">*</span></label>
                    <input type="text" name="TenSuKien" id="f_TenSuKien" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-[#1D546D] focus:border-[#1D546D]">
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold mb-1">Thời gian <span class="text-red-500">*</span></label>
                        <input type="date" name="ThoiGian" id="f_ThoiGian" required class="w-full border border-gray-300 rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Số lượng tối đa</label>
                        <input type="number" name="SoLuongToiDa" id="f_SoLuongToiDa" placeholder="Bỏ trống nếu không giới hạn" class="w-full border border-gray-300 rounded px-3 py-2">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold mb-1">Địa điểm</label>
                        <input type="text" name="DiaDiem" id="f_DiaDiem" class="w-full border border-gray-300 rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Hình thức</label>
                        <select name="HinhThuc" id="f_HinhThuc" class="w-full border border-gray-300 rounded px-3 py-2">
                            <option value="Offline">Offline</option>
                            <option value="Online">Online</option>
                            <option value="Hybrid">Hybrid (Kết hợp)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Mô tả</label>
                    <textarea name="MoTa" id="f_MoTa" rows="4" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
                </div>
            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
                <button type="button" onclick="closeModal('formModal')" class="px-5 py-2 bg-gray-300 text-gray-800 font-semibold rounded hover:bg-gray-400">Hủy</button>
                <button type="submit" class="px-5 py-2 bg-[#1D546D] text-white font-semibold rounded hover:bg-[#154053]">Lưu thông tin</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Hàm mở Modal Xem Chi tiết
    function openDetailModal(event, timeFormatted, currentCapacity) {
        document.getElementById('dt_id').innerText = event.MaSuKien;
        document.getElementById('dt_name').innerText = event.TenSuKien;
        document.getElementById('dt_time').innerText = timeFormatted;
        document.getElementById('dt_location').innerText = event.DiaDiem || '-';
        document.getElementById('dt_format').innerText = event.HinhThuc || '-';
        document.getElementById('dt_capacity').innerText = currentCapacity + ' / ' + (event.SoLuongToiDa || '∞');
        document.getElementById('dt_desc').innerText = event.MoTa || 'Không có mô tả';
        
        document.getElementById('detailModal').classList.remove('hidden');
        document.getElementById('detailModal').classList.add('flex');
    }

    // Hàm mở Modal Thêm / Sửa
    function openFormModal(type, event = null) {
        const form = document.getElementById('actionForm');
        const title = document.getElementById('formModalTitle');
        const methodInput = document.getElementById('formMethod');

        if (type === 'add') {
            title.innerText = 'Thêm Sự kiện mới';
            form.action = "{{ route('admin.sukien.store') }}";
            methodInput.value = "POST";
            form.reset(); // Xóa trắng form
            
        } else if (type === 'edit') {
            title.innerText = 'Cập nhật Sự kiện';
            
            // [ĐÃ SỬA] Dùng hàm route() của Laravel để sinh URL an toàn tuyệt đối
            let updateUrl = "{{ route('admin.sukien.update', ':id') }}";
            form.action = updateUrl.replace(':id', event.MaSuKien);
            
            methodInput.value = "PUT"; // Giả lập method PUT
            
            // Đổ dữ liệu cũ vào form
            document.getElementById('f_TenSuKien').value = event.TenSuKien;
            
            // [ĐÃ SỬA] Xử lý chuỗi ngày tháng cực kỳ an toàn
            if(event.ThoiGian) {
                // Tách lấy phần ngày (trước khoảng trắng hoặc chữ T)
                document.getElementById('f_ThoiGian').value = event.ThoiGian.split(' ')[0].split('T')[0];
            }
            
            document.getElementById('f_SoLuongToiDa').value = event.SoLuongToiDa;
            document.getElementById('f_DiaDiem').value = event.DiaDiem;
            document.getElementById('f_HinhThuc').value = event.HinhThuc || 'Offline';
            document.getElementById('f_MoTa').value = event.MoTa;
        }

        document.getElementById('formModal').classList.remove('hidden');
        document.getElementById('formModal').classList.add('flex');
    }

    // Hàm đóng Modal
    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.getElementById(modalId).classList.remove('flex');
    }
</script>
@endsection