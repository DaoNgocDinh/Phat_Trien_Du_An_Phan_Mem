@extends('layout.giangVien')

@section('title', 'Đề xuất đề tài nghiên cứu')

@section('content')
<div class="p-6" style="margin-top: 60px; margin-left: 260px;">
    <button type="submit"
        class="text-xl flex gap-2 text-white bg-[#2c5d6e] px-4 py-2 rounded-md hover:bg-[#3f7b8e] hover:shadow-xl hover:border-gray-600">
        Đề xuất đề tài
    </button>
    <form id="formDeTai" method="POST" action="{{ route('giangvien.detai.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- GRID 2 CỘT -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- CỘT TRÁI -->
            <div class="space-y-4">
                <div>
                    <label class="block mb-1 font-medium text-gray-600">Tên đề tài</label>
                    <input type="text" name="TenDeTai"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2c5d6e] focus:outline-none" />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Đơn vị</label>
                    <select name="DonVi"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1D546D]">
                        <option disabled selected>-- Chọn đơn vị --</option>
                        <option>CNTT</option>
                        <option>HTTT</option>
                        <option>AI</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Cấp đề tài</label>
                    <select name="CapDeTai"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1D546D]">
                        <option disabled selected>-- Chọn cấp đề tài --</option>
                        <option>Cấp trường</option>
                        <option>Cấp bộ</option>
                        <option>Nhà nước</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Loại đề tài</label>
                    <select name="LoaiDeTai"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1D546D]">
                        <option disabled selected>-- Chọn loại đề tài --</option>
                        <option>Nghiên cứu</option>
                        <option>Ứng dụng</option>
                        <option>Khảo sát</option>
                        <option>Chế tạo</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Thời gian bắt đầu</label>
                    <input type="date" name="ThoiGianBatDau"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-[#1D546D]">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Thời gian kết thúc</label>
                    <input type="date" name="ThoiGianKetThuc"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-[#1D546D]">
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-600">Kinh phí</label>
                    <input type="number" name="KinhPhi"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2c5d6e]">
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block mb-1 font-medium text-gray-600">Mô tả chi tiết</label>
                    <textarea rows="4" name="NoiDungChinh"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2c5d6e]"></textarea>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-600">Mục tiêu nghiên cứu</label>
                    <textarea rows="4" name="MucTieu"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2c5d6e]"></textarea>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-600">Tải file lên</label>

                    <div
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2c5d6e] focus:outline-none flex items-center justify-between cursor-pointer">

                        <input type="file" id="fileInput" name="FileSanPham" class="hidden">

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

            <button type="submit" class="px-6 py-2 bg-[#1D546D] text-white rounded-lg hover:bg-[#174454]">
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
        const form = document.getElementById('formDeTai');
        const input = document.getElementById('FileSanPham');
    </script>
    </form>
</div>