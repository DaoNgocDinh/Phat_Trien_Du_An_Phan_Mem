@extends('layout.giangvien')

@section('title', 'Đề xuất công bố khoa học')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="p-6" style="margin-top: 60px; margin-left: 260px;">
    <button type="button"
        class="text-2xl flex gap-2 text-white bg-[#1D546D] px-4 py-2 rounded-md hover:bg-[#3f7b8e] hover:shadow-xl hover:border-gray-600 cursor-pointer">
        Đề xuất công bố
    </button>
    <form id="formCongBo" method="POST" action="{{ route('giangvien.congbo.suggest') }}" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-300 rounded">
                <ul class="list-disc list-inside text-sm text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-300 rounded text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row items-start md:items-center mb-6 gap-4 mt-6">
            <a href="{{ route('giangvien.congBo') }}">
                <button type="button"
                    class="bg-gray-500 hover:bg-[#2c5d6e] text-black px-6 py-2.5 shadow-md transition flex items-center gap-2 font-medium">
                    <!-- <i class="fas fa-plus-circle"></i> -->
                    Tất cả công bố
                </button>
            </a>
            <a href="{{ route('giangvien.congBoCuaToi') }}">
                <button type="button"
                    class="bg-gray-500 hover:bg-[#2c5d6e] text-black px-6 py-2.5 shadow-md transition flex items-center gap-2 font-medium">
                    <!-- <i class="fas fa-plus-circle"></i> -->
                    Công bố của tôi
                </button>
            </a>
            <a>
                <button
                    class="bg-[#1D546D] text-white px-6 py-2.5 shadow-md transition flex items-center gap-2 font-medium">
                    <!-- <i class="fas fa-plus-circle"></i> -->
                    Đề xuất công bố
                </button>
            </a>
        </div>

        <!-- GRID 2 CỘT -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- CỘT TRÁI -->
            <div class="space-y-4">
                <div>
                    <label class="block mb-1 font-medium text-gray-600">Tiêu đề</label>
                    <input type="text" name="TenCongBo"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2c5d6e] focus:outline-none" />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Loại công bố</label>
                    <input type="text" name="LoaiCongBo"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2c5d6e] focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Tác giả</label>
                    <input type="text" name="TacGia"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2c5d6e] focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Nơi đăng</label>
                    <input type="text" name="NoiCongBo"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2c5d6e] focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Ngày công bố</label>
                    <input type="date" name="NamXuatBan"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-[#1D546D]">
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block mb-1 font-medium text-gray-600">Tóm tắt nội dung</label>
                    <textarea rows="4" name="NoiDungTomTat"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2c5d6e]"></textarea>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-600">File với định dạng pdf</label>

                    <div
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2c5d6e] focus:outline-none flex items-center justify-between cursor-pointer">

                        <input type="file" id="fileInput" name="FilePDF" class="hidden">

                        <label for="fileInput" id="fileLabel"
                            class="w-full px-2 py-2 text-sm text-gray-500 cursor-pointer">
                            Chọn file...
                        </label>

                        <!-- ICON -->
                        <div class="px-3 text-gray-500"> <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BUTTON -->
        <div class="mt-8 flex justify-end gap-4">
            <button type="button" onclick="window.history.back()"
                class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
                Hủy
            </button>

            <button type="button" onclick="validateAndSubmit()"
                class="px-6 py-2 bg-[#1D546D] text-white rounded-lg hover:bg-[#174454]">
                Gửi đề xuất
            </button>
        </div>
    </form>

    <script>
        const input = document.getElementById('fileInput');
        const fileName = document.getElementById('fileLabel');

        input.addEventListener('change', function () {
            fileName.textContent = this.files[0]?.name || "Chọn file...";
        });
    </script>

    <script>
        function validateAndSubmit() {
            const ten = document.querySelector('input[name="TenCongBo"]').value.trim();
            const loai = document.querySelector('input[name="LoaiCongBo"]').value.trim();
            const tacGia = document.querySelector('input[name="TacGia"]').value.trim();
            const noi = document.querySelector('input[name="NoiCongBo"]').value.trim();
            const ngay = document.querySelector('input[name="NamXuatBan"]').value;
            const tomTat = document.querySelector('textarea[name="NoiDungTomTat"]').value.trim();
            const file = document.getElementById('fileInput').files[0];

            // ===== VALIDATE =====
            if (!ten) {
                Swal.fire("Thiếu thông tin", "Vui lòng nhập tiêu đề", "warning");
                return;
            }

            if (!loai) {
                Swal.fire("Thiếu thông tin", "Vui lòng nhập loại công bố", "warning");
                return;
            }

            if (!tacGia) {
                Swal.fire("Thiếu thông tin", "Vui lòng nhập tác giả", "warning");
                return;
            }

            if (!noi) {
                Swal.fire("Thiếu thông tin", "Vui lòng nhập nơi công bố", "warning");
                return;
            }

            if (!ngay) {
                Swal.fire("Thiếu thông tin", "Vui lòng chọn ngày công bố", "warning");
                return;
            }

            if (!tomTat) {
                Swal.fire("Thiếu thông tin", "Vui lòng nhập tóm tắt nội dung", "warning");
                return;
            }

            // ===== FILE BẮT BUỘC =====
            if (!file) {
                Swal.fire("Thiếu file", "Vui lòng tải lên file PDF", "warning");
                return;
            }

            if (file.type !== "application/pdf") {
                Swal.fire("Sai định dạng", "Chỉ chấp nhận file PDF", "error");
                return;
            }

            if (file.size > 5 * 1024 * 1024) {
                Swal.fire("File quá lớn", "File PDF tối đa 5MB", "error");
                return;
            }

            // ===== CONFIRM =====
            Swal.fire({
                title: "Xác nhận gửi",
                text: "Bạn có chắc chắn muốn gửi công bố này?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Gửi",
                cancelButtonText: "Hủy"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formCongBo').submit();
                }
            });
        }
    </script>
</div>