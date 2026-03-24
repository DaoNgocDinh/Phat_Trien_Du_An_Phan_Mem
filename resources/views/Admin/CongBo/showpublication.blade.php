@extends('layout.admin')

@section('title', 'Chi tiết công bố')

@section('content')

<div class="mx-10 mt-10">

    <!-- THÔNG BÁO -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header -->
    <div class="bg-[#1D546D] text-white text-xl px-6 py-3 rounded w-fit mb-8">
        Chi tiết công bố
    </div>

    <!-- Thông tin cơ bản -->
    <div class="bg-white shadow rounded-lg p-8 grid grid-cols-2 gap-6">

        <div>
            <b>Tên công bố:</b>
            <div class="mt-1 text-gray-700">{{ $congbo->TenCongBo }}</div>
        </div>

        <div>
            <b>Loại công bố:</b>
            <div class="mt-1 text-gray-700">{{ $congbo->LoaiCongBo }}</div>
        </div>

        <div>
            <b>Tác giả:</b>
            <div class="mt-1 text-gray-700">{{ $congbo->TacGia }}</div>
        </div>

        <div>
            <b>Năm xuất bản:</b>
            <div class="mt-1 text-gray-700">{{ $congbo->NamXuatBan }}</div>
        </div>

        <div>
            <b>Nơi công bố:</b>
            <div class="mt-1 text-gray-700">{{ $congbo->NoiCongBo }}</div>
        </div>

        <div>
            <b>DOI:</b>
            <div class="mt-1 text-gray-700">
                {{ $congbo->DOI ?? 'Không có' }}
            </div>
        </div>

    </div>

    <!-- Nội dung tóm tắt -->
    <div class="bg-white shadow rounded-lg p-8 mt-6">
        <b>Tóm tắt nội dung:</b>
        <div class="mt-3 text-gray-700 leading-relaxed">
            {{ $congbo->NoiDungTomTat }}
        </div>
    </div>

    <!-- File PDF -->
    @if($congbo->FilePDF)
        <div class="bg-white shadow rounded-lg p-8 mt-6">
            <b>File PDF: {{ $congbo->FilePDF }}</b>

            <div class="mt-3">
                <a href="{{ asset('storage/' . $congbo->FilePDF) }}" target="_blank"
                   class="text-blue-600 hover:underline">
                    Xem file PDF
                </a>
            </div>
        </div>
    @endif

    <!-- ACTION -->
    <div class="flex justify-end gap-4 mt-10">

        <!-- FORM ẨN -->
        <form id="actionForm" method="POST" action="{{ route('admin.congbo.trangthai', $congbo->MaCongBo) }}">
            @csrf
            <input type="hidden" name="TrangThai" id="trangThaiInput">
        </form>

        <button onclick="openModal('Đã Duyệt')"
            class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
            Phê duyệt
        </button>

        <button onclick="openModal('Từ chối')"
            class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">
            Từ chối
        </button>

        <a href="{{ url()->previous() }}"
           class="bg-gray-400 text-white px-6 py-2 rounded hover:bg-gray-500">
            Quay lại
        </a>

    </div>

</div>

<!-- ================= MODAL ================= -->
<div id="confirmModal"
     class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl shadow-lg w-[400px] p-6 animate-fadeIn">

        <h2 class="text-lg font-semibold mb-4 text-gray-800">
            Xác nhận hành động
        </h2>

        <p id="modalMessage" class="text-gray-600 mb-6">
            Bạn có chắc chắn không?
        </p>

        <div class="flex justify-end gap-3">
            
            <button onclick="submitAction()"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Xác nhận
            </button>
            <button onclick="closeModal()"
                class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                Hủy
            </button>


        </div>

    </div>
</div>

<!-- ================= SCRIPT ================= -->
<script>
    let selectedStatus = '';

    function openModal(status) {
        selectedStatus = status;

        document.getElementById('modalMessage').innerText =
            `Bạn có chắc muốn ${status.toUpperCase()} công bố này không?`;

        document.getElementById('confirmModal').classList.remove('hidden');
        document.getElementById('confirmModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('confirmModal').classList.add('hidden');
        document.getElementById('confirmModal').classList.remove('flex');
    }

    function submitAction() {
        document.getElementById('trangThaiInput').value = selectedStatus;
        document.getElementById('actionForm').submit();
    }

    // click ra ngoài để đóng modal
    window.onclick = function(e) {
        const modal = document.getElementById('confirmModal');
        if (e.target === modal) {
            closeModal();
        }
    }
</script>

<!-- OPTIONAL ANIMATION -->
<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fadeIn {
    animation: fadeIn 0.2s ease-out;
}
</style>

@endsection