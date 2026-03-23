@extends('layout.giangvien')

@section('title', 'Đề xuất đề tài nghiên cứu')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="p-6">

        <!-- Card -->
        <div class="w-full mx-auto  bg-white rounded-xl shadow-lg p-8">

            <!-- Title -->
            <h2 class="text-2xl font-semibold text-center mb-6 text-gray-700">
                Gửi yêu cầu liên hệ
            </h2>



            <form id="formLienHe" action="{{ route('giangvien.lienhe.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Họ tên -->
                <div>
                    <label class="block mb-1 font-medium text-gray-600">Họ và tên</label>
                    <input type="text" name="name"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2c5d6e] focus:outline-none" />
                </div>

                <!-- Email -->
                <div>
                    <label class="block mb-1 font-medium text-gray-600">Email</label>
                    <input type="text" name="email"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2c5d6e] focus:outline-none" />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Chủ đề -->
                <div>
                    <label class="block mb-1 font-medium text-gray-600">Chủ đề</label>
                    <input type="text" name="subject"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2c5d6e] focus:outline-none" />
                </div>

                <!-- Nội dung -->
                <div>
                    <label class="block mb-1 font-medium text-gray-600">Nội dung</label>
                    <textarea name="message" rows="4"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2c5d6e] focus:outline-none"></textarea>
                </div>

                <!-- Buttons -->
                <div class="flex justify-center gap-6 pt-4">

                    <!-- Hủy -->
                    <a href="{{ route('giangvien.trangChu') }}"
                        class="px-5 py-2 bg-gray-400 text-black rounded-lg hover:bg-gray-500 transition">
                        Hủy
                    </a>

                    <!-- Gửi -->
                    <button type="button" onclick="validateAndSubmit()"
                        class="px-5 py-2 bg-[#2c5d6e] text-white rounded-lg hover:bg-[#3f7b8e] transition shadow">
                        Gửi
                    </button>

                </div>
                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center">
                        {{ session('success') }}
                    </div>
                @endif
                <script>
                    function validateAndSubmit() {
                        const name = document.querySelector('input[name="name"]').value.trim();
                        const email = document.querySelector('input[name="email"]').value.trim();
                        const subject = document.querySelector('input[name="subject"]').value.trim();
                        const message = document.querySelector('textarea[name="message"]').value.trim();

                        // Regex email cơ bản
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                        if (!name) {
                            Swal.fire("Thiếu thông tin", "Vui lòng nhập họ tên", "warning");
                            return;
                        }

                        if (!email) {
                            Swal.fire("Thiếu thông tin", "Vui lòng nhập email", "warning");
                            return;
                        }

                        if (!emailRegex.test(email)) {
                            Swal.fire("Email không hợp lệ", "Vui lòng nhập đúng định dạng email", "error");
                            return;
                        }

                        if (!subject) {
                            Swal.fire("Thiếu thông tin", "Vui lòng nhập chủ đề", "warning");
                            return;
                        }

                        if (!message) {
                            Swal.fire("Thiếu thông tin", "Vui lòng nhập nội dung", "warning");
                            return;
                        }

                        if (message.length < 10) {
                            Swal.fire("Nội dung quá ngắn", "Vui lòng nhập ít nhất 10 ký tự", "warning");
                            return;
                        }

                        Swal.fire({
                            title: "Xác nhận gửi",
                            text: "Bạn có chắc muốn gửi yêu cầu liên hệ?",
                            icon: "question",
                            showCancelButton: true,
                            confirmButtonText: "Gửi",
                            cancelButtonText: "Hủy"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.querySelector('#formLienHe').submit();
                            }
                        });
                    }
                </script>
            </form>
        </div>
    </div>
@endsection