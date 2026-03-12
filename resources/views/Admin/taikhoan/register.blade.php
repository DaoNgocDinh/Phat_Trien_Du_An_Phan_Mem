@extends('layout.admin')

@section('title', 'Tạo tài khoản')

@section('content')

    <div class="flex flex-col">

        {{-- Tiêu đề --}}
        <div class="bg-[#1D546D] text-white text-2xl font-semibold px-7 py-3 rounded-md w-fit mb-8 ml-20 mt-10">
            Quản lý tài khoản > Tạo tài khoản
        </div>


        {{-- THÔNG BÁO --}}
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mx-20 mb-5">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-500 text-white p-3 rounded mx-20 mb-5">
                {{ session('error') }}
            </div>
        @endif

        {{-- LỖI VALIDATE --}}
        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mx-20 mb-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- FORM --}}
        <div class="flex-1 mt-10">

            <form action="{{ route('admin.register') }}" method="POST">

                @csrf

                <div class="grid grid-cols-2 gap-12 mx-20 border border-gray-300 p-10 rounded-md shadow-sm bg-white">

                    {{-- LEFT --}}
                    <div class="space-y-8">

                        <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                            <label>UserID</label>
                            <input type="text" value="{{ $nextUserID }}" readonly class="bg-gray-300 p-2 rounded w-full">
                        </div>

                        <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                            <label>Vai trò</label>

                            <select name="VaiTro" id="role" class="bg-gray-200 p-2 rounded w-full">
                                <option value="giangvien">Giảng viên</option>
                                <option value="nghiencuusinh">Nghiên cứu sinh</option>
                            </select>
                        </div>


                        <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                            <label>Họ tên</label>
                            <input type="text" name="HoTen" value="{{ old('HoTen') }}"
                                class="bg-gray-200 p-2 rounded w-full">
                        </div>


                        <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                            <label>Mật khẩu</label>
                            <input type="password" name="MatKhau" class="bg-gray-200 p-2 rounded w-full">
                        </div>


                        <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                            <label>Khoa</label>

                            <select name="Khoa" class="bg-gray-200 p-2 rounded w-full">

                                <option value="">-- Chọn khoa --</option>

                                @php
                                    $khoa = [
                                        'Công nghệ thông tin',
                                        'Điện tử viễn thông',
                                        'Cơ khí',
                                        'Toán ứng dụng',
                                        'Vật lý kỹ thuật',
                                        'Hóa học',
                                        'Sinh học',
                                        'Khoa học máy tính',
                                        'Khoa học dữ liệu',
                                        'Trí tuệ nhân tạo',
                                        'An toàn thông tin',
                                        'Mạng máy tính',
                                        'Công nghệ phần mềm',
                                        'Hệ thống thông tin',
                                        'Khoa học và kỹ thuật tính toán'
                                    ];
                                @endphp

                                @foreach($khoa as $k)
                                    <option value="{{ $k }}">{{ $k }}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>


                    {{-- RIGHT --}}
                    <div class="space-y-8">

                        {{-- GIẢNG VIÊN --}}
                        <div id="giangvien" class="space-y-5">

                            <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                                <label>Chức vụ</label>

                                <select name="ChucVu" class="bg-gray-200 p-2 rounded w-full">

                                    <option value="">-- Chọn chức vụ --</option>

                                    @foreach($chucvu as $cv)
                                        <option value="{{ $cv }}">{{ $cv }}</option>
                                    @endforeach

                                </select>
                            </div>


                            <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                                <label>Email</label>
                                <input type="text" name="Email" class="bg-gray-200 p-2 rounded w-full">
                            </div>


                            <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                                <label>SĐT</label>
                                <input type="text" name="Sdt" class="bg-gray-200 p-2 rounded w-full">
                            </div>

                        </div>


                        {{-- NGHIÊN CỨU SINH --}}
                        <div id="nghiencuusinh" class="space-y-5 hidden">

                            <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                                <label>Lớp</label>
                                <input type="text" name="Lop" class="bg-gray-200 p-2 rounded w-full">
                            </div>


                            <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                                <label>Ngày sinh</label>
                                <input type="date" name="NgaySinh" class="bg-gray-200 p-2 rounded w-full">
                            </div>

                        </div>

                    </div>

                </div>


                {{-- BUTTON --}}
                <div class="flex justify-end gap-4 mt-10 mr-20">

                    <button type="submit" class="bg-[#1D8E8E] text-white px-5 py-2 rounded hover:bg-[#187979] transition">
                        <i class="fa-solid fa-check mr-2"></i>
                        Tạo tài khoản
                    </button>

                    <a href="{{ route('admin.trangChu') }}"
                        class="bg-gray-400 text-white px-5 py-2 rounded hover:bg-gray-500 transition">
                        <i class="fa-solid fa-close mr-2"></i>
                        Hủy
                    </a>

                </div>

            </form>

        </div>

    </div>


    <script>

        let role = document.getElementById("role");
        let gv = document.getElementById("giangvien");
        let ncs = document.getElementById("nghiencuusinh");

        function changeRole() {

            if (role.value === "giangvien") {

                gv.classList.remove("hidden");
                ncs.classList.add("hidden");

            } else {

                gv.classList.add("hidden");
                ncs.classList.remove("hidden");

            }

        }

        role.addEventListener("change", changeRole);

        changeRole();

    </script>

@endsection