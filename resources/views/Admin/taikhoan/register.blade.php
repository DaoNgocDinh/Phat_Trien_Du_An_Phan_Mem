@extends('layout.admin')

@section('title', 'Tạo tài khoản')

@section('content')

<div class="flex flex-col">

    <div class="bg-[#1D546D] text-white text-2xl font-semibold px-7 py-3 rounded-md w-fit mb-8 ml-20 mt-10">
        Quản lý tài khoản > Tạo tài khoản
    </div>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 rounded mx-20 mb-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex-1 mt-10">

        <form action="{{ route('admin.register.process') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-12 mx-20 border p-10 rounded-md bg-white">

                <!-- LEFT -->
                <div class="space-y-6">

                    <div class="grid grid-cols-[160px_1fr] gap-3">
                        <label>UserID</label>
                        <input type="text" value="{{ $nextUserID }}" readonly class="bg-gray-300 p-2 rounded w-full">
                    </div>

                    <div class="grid grid-cols-[160px_1fr] gap-3">
                        <label>Vai trò</label>
                        <select name="VaiTro" id="role" class="bg-gray-200 p-2 rounded w-full">
                            <option value="giangvien">Giảng viên</option>
                            <option value="nghiencuusinh">Nghiên cứu sinh</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-[160px_1fr] gap-3">
                        <label>Họ tên</label>
                        <input type="text" name="HoTen" value="{{ old('HoTen') }}" class="bg-gray-200 p-2 rounded w-full">
                    </div>

                    <div class="grid grid-cols-[160px_1fr] gap-3">
                        <label>Mật khẩu</label>
                        <input type="password" name="MatKhau" class="bg-gray-200 p-2 rounded w-full">
                    </div>

                    <div class="grid grid-cols-[160px_1fr] gap-3">
                        <label>Khoa</label>
                        <select id="khoa" name="Khoa" class="bg-gray-200 p-2 rounded w-full">
                            <option value="">-- Chọn khoa --</option>
                            @foreach($khoas as $k)
                                <option value="{{ $k->MaKhoa }}" {{ old('Khoa') == $k->MaKhoa ? 'selected' : '' }}>
                                    {{ $k->TenKhoa }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <!-- RIGHT -->
                <div class="space-y-6">

                    <!-- EMAIL CHUNG -->
                    <div class="grid grid-cols-[160px_1fr] gap-3">
                        <label>Email</label>
                        <input type="email" name="Email" value="{{ old('Email') }}"
                            class="bg-gray-200 p-2 rounded w-full">
                    </div>

                    <!-- NGÀY SINH -->
                    <div class="grid grid-cols-[160px_1fr] gap-3">
                        <label>Ngày sinh</label>
                        <input type="date" name="NgaySinh" value="{{ old('NgaySinh') }}"
                            class="bg-gray-200 p-2 rounded w-full">
                    </div>

                    <!-- GIẢNG VIÊN -->
                    <div id="giangvien" class="space-y-5">

                        <div class="grid grid-cols-[160px_1fr] gap-3">
                            <label>Chức vụ</label>
                            <select id="chucvu" name="ChucVu" class="bg-gray-200 p-2 rounded w-full">
                                <option value="">-- Chọn chức vụ --</option>
                                @foreach($chucvus as $cv)
                                    <option value="{{ $cv->MaChucVu }}" {{ old('ChucVu') == $cv->MaChucVu ? 'selected' : '' }}>
                                        {{ $cv->TenChucVu }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-[160px_1fr] gap-3">
                            <label>SĐT</label>
                            <input type="text" name="Sdt" value="{{ old('Sdt') }}"
                                class="bg-gray-200 p-2 rounded w-full">
                        </div>

                    </div>

                    <!-- NGHIÊN CỨU SINH -->
                    <div id="nghiencuusinh" class="space-y-5 hidden">

                        <div class="grid grid-cols-[160px_1fr] gap-3">
                            <label>Lớp</label>
                            <input type="text" name="Lop" value="{{ old('Lop') }}"
                                class="bg-gray-200 p-2 rounded w-full">
                        </div>

                    </div>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="flex justify-end gap-4 mt-10 mr-20">

                <button type="submit"
                    class="bg-[#1D8E8E] text-white px-5 py-2 rounded hover:bg-[#187979]">
                    Tạo tài khoản
                </button>

                <a href="{{ route('admin.trangChu') }}"
                    class="bg-gray-400 text-white px-5 py-2 rounded">
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

            // reset field GV
            document.getElementById("chucvu").value = "";
        }
    }

    role.addEventListener("change", changeRole);
    changeRole();
</script>

@endsection