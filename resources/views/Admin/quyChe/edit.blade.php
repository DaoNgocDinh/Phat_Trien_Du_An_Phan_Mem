@extends('layout.admin')

@section('title', 'Đăng tải quy chế mới')

@section('content')

    <div class="p-6 mt-4">
        <div class="bg-[#1D546D] text-white text-xl font-semibold px-7 py-3 rounded-md w-96 mb-6">
            Quy chế > Chỉnh sửa quy chế
        </div>

        <form id="formQuyChe" method="POST" action="{{ route('admin.quyChe.update', $quyche->MaQuyChe) }}"
            enctype="multipart/form-data" class="w-full mx-auto bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
            @csrf
            @method('PUT') <!-- Bắt buộc khi update -->

            <h2 class="text-2xl font-bold text-gray-800 mb-6">Chỉnh sửa quy chế</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Mã quy chế -->
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Mã quy chế</label>
                    <input type="text" name="MaQuyChe" value="{{ $quyche->MaQuyChe }}" readonly
                        class="w-full px-3 py-2 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none">
                </div>

                <!-- Số hiệu -->
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Số hiệu</label>
                    <input type="text" name="SoHieu" value="{{ $quyche->SoHieu }}" readonly
                        class="w-full px-3 py-2 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none">
                </div>

                <!-- Tên văn bản -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Tên văn bản</label>
                    <input type="text" name="TenVanBan" value="{{ $quyche->TenVanBan }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1D546D] focus:outline-none">
                </div>

                <!-- Ngày ban hành -->
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Ngày ban hành</label>
                    <input type="date" name="NgayPhatHanh" value="{{ $quyche->NgayBanHanh }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1D546D] focus:outline-none">
                </div>

                <!-- Loại văn bản -->
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Cấp</label>
                    <select name="LoaiVanBan" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1D546D] focus:outline-none">
                        <option value="" disabled selected>-- Chọn cấp --</option>
                        <option value="Nội Bộ" {{ $quyche->LoaiVanBan == 'Nội Bộ' ? 'selected' : '' }}>Nội bộ</option>
                        <option value="Ngành" {{ $quyche->LoaiVanBan == 'Ngành' ? 'selected' : '' }}>Ngành</option>
                        <option value="Nhà Nước" {{ $quyche->LoaiVanBan == 'Nhà Nước' ? 'selected' : '' }}>Nhà nước</option>
                    </select>
                </div>
            </div>

            <!-- Upload file -->
            <div class="mt-8">
                <label class="block text-sm font-semibold text-gray-600 mb-2">File PDF (không bắt buộc)</label>

                <label for="FilePDF"
                    class="relative flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition group">

                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-10 h-10 mb-3 text-gray-400 group-hover:text-[#1D546D] transition" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7 16V4m0 0L3 8m4-4l4 4m6 8v4m0 0l-4-4m4 4l4-4" />
                        </svg>

                        <p class="text-sm text-gray-500">
                            <span class="font-semibold text-[#1D546D]">Click để tải lên</span> hoặc kéo thả
                        </p>
                        <p class="text-xs text-gray-400">Chỉ chấp nhận PDF</p>

                        @if($quyche->FilePDF)
                            <p class="mt-2 text-sm text-blue-600">File hiện tại: {{ $quyche->FilePDF }}</p>
                        @endif

                        <p id="file-name" class="mt-2 text-sm text-green-600 hidden"></p>
                    </div>

                    <input id="FilePDF" name="FilePDF" type="file" accept=".pdf"
                        class="absolute inset-0 opacity-0 cursor-pointer">
                </label>
                @error('FilePDF')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <div class="mt-8 flex justify-end">
                <button type="button" onclick="window.history.back()"
                    class="text-white px-6 py-2 bg-gray-300 text-gray-700 rounded-lg shadow hover:bg-gray-400 transition mr-4">
                    Hủy
                </button>
                <button type="submit"
                    class="px-6 py-2 bg-[#1D546D] text-white rounded-lg shadow hover:bg-[#174454] transition">
                    Cập nhật
                </button>
            </div>
        </form>

        <script>
            const input = document.getElementById('FilePDF');
            const fileName = document.getElementById('file-name');

            input.addEventListener('change', function () {
                if (this.files.length > 0) {
                    fileName.textContent = "Đã chọn: " + this.files[0].name;
                    fileName.classList.remove('hidden');
                }
            });
        </script>
@endsection
</div>