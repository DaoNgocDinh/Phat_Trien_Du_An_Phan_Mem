@extends('layout.admin')

@section('title', 'Tạo tài khoản')

@section('content')

@if(session('success'))
<div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">
    <div class="bg-white w-[400px] rounded-lg shadow-lg overflow-hidden">
        <div class="flex justify-between items-center border-b px-4 py-2 bg-gray-100">
            <span class="font-semibold text-gray-700">Thông báo</span>
            <button onclick="closeModal()" class="text-gray-600 hover:text-black">✖</button>
        </div>

        <div class="text-center py-8 px-4">
            <div class="w-16 h-16 mx-auto mb-4 bg-green-500 rounded-full flex items-center justify-center">
                ✔
            </div>
            <h2 class="text-lg font-bold mb-2">Thêm tài khoản thành công!</h2>
            <p class="text-gray-600 text-sm">{{ session('success') }}</p>
        </div>
    </div>
</div>
@endif

<div class="flex flex-col">

    <div class="bg-[#1D546D] text-white text-2xl font-semibold px-7 py-3 rounded-md w-fit mb-8 ml-20 mt-10">
        Quản lý tài khoản > Tạo tài khoản
    </div>

    <div class="flex-1 mt-10">

        <form action="{{ route('admin.register.process') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-12 mx-20 border p-10 rounded-md bg-white">

                <!-- LEFT -->
                <div class="space-y-6">

                    <!-- UserID -->
                    <div class="grid grid-cols-[160px_1fr] gap-3">
                        <label>UserID</label>
                        <input type="text" value="{{ $nextUserID }}" readonly class="bg-gray-300 p-2 rounded w-full">
                    </div>

                    <!-- Vai trò -->
                    <div class="grid grid-cols-[160px_1fr] gap-3">
                        <label>Vai trò *</label>
                        <select name="VaiTro" id="role" class="p-2 rounded w-full border @error('VaiTro') border-red-500 @enderror">
                            <option value="giangvien" {{ old('VaiTro')=='giangvien'?'selected':'' }}>Giảng viên</option>
                            <option value="nghiencuusinh" {{ old('VaiTro')=='nghiencuusinh'?'selected':'' }}>Nghiên cứu sinh</option>
                        </select>
                    </div>
                    @error('VaiTro') <p class="text-red-500 text-sm ml-[160px]">{{ $message }}</p> @enderror

                    <!-- Họ tên -->
                    <div class="grid grid-cols-[160px_1fr] gap-3">
                        <label>Họ tên *</label>
                        <input type="text" name="HoTen" value="{{ old('HoTen') }}"
                            class="p-2 rounded w-full border @error('HoTen') border-red-500 @enderror">
                    </div>
                    @error('HoTen') <p class="text-red-500 text-sm ml-[160px]">{{ $message }}</p> @enderror

                    <!-- Mật khẩu -->
                    <div class="grid grid-cols-[160px_1fr] gap-3">
                        <label>Mật khẩu *</label>
                        <input type="password" name="MatKhau"
                            class="p-2 rounded w-full border @error('MatKhau') border-red-500 @enderror">
                    </div>
                    @error('MatKhau') <p class="text-red-500 text-sm ml-[160px]">{{ $message }}</p> @enderror

                    <!-- Khoa -->
                    <div class="grid grid-cols-[160px_1fr] gap-3">
                        <label>Khoa *</label>
                        <select name="Khoa" class="p-2 rounded w-full border @error('Khoa') border-red-500 @enderror">
                            <option value="">-- Chọn khoa --</option>
                            @foreach($khoas as $k)
                                <option value="{{ $k->MaKhoa }}" {{ old('Khoa') == $k->MaKhoa ? 'selected' : '' }}>
                                    {{ $k->TenKhoa }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('Khoa') <p class="text-red-500 text-sm ml-[160px]">{{ $message }}</p> @enderror

                </div>

                <!-- RIGHT -->
                <div class="space-y-6">

                    <!-- Email -->
                    <div class="grid grid-cols-[160px_1fr] gap-3">
                        <label>Email *</label>
                        <input type="email" name="Email" value="{{ old('Email') }}"
                            class="p-2 rounded w-full border @error('Email') border-red-500 @enderror">
                    </div>
                    @error('Email') <p class="text-red-500 text-sm ml-[160px]">{{ $message }}</p> @enderror

                    <!-- Ngày sinh -->
                    <div class="grid grid-cols-[160px_1fr] gap-3">
                        <label>Ngày sinh *</label>
                        <input type="date" name="NgaySinh" value="{{ old('NgaySinh') }}"
                            class="p-2 rounded w-full border @error('NgaySinh') border-red-500 @enderror">
                    </div>
                    @error('NgaySinh') <p class="text-red-500 text-sm ml-[160px]">{{ $message }}</p> @enderror

                    <!-- GIẢNG VIÊN -->
                    <div id="giangvien" class="space-y-5">

                        <div class="grid grid-cols-[160px_1fr] gap-3">
                            <label>Chức vụ *</label>
                            <select name="ChucVu" id="chucvu"
                                class="p-2 rounded w-full border @error('ChucVu') border-red-500 @enderror">
                                <option value="">-- Chọn chức vụ --</option>
                                @foreach($chucvus as $cv)
                                    <option value="{{ $cv->MaChucVu }}" {{ old('ChucVu') == $cv->MaChucVu ? 'selected' : '' }}>
                                        {{ $cv->TenChucVu }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('ChucVu') <p class="text-red-500 text-sm ml-[160px]">{{ $message }}</p> @enderror

                        <div class="grid grid-cols-[160px_1fr] gap-3">
                            <label>SĐT *</label>
                            <input type="text" name="Sdt" value="{{ old('Sdt') }}"
                                class="p-2 rounded w-full border @error('Sdt') border-red-500 @enderror">
                        </div>
                        @error('Sdt') <p class="text-red-500 text-sm ml-[160px]">{{ $message }}</p> @enderror

                    </div>

                    <!-- NCS -->
                    <div id="nghiencuusinh" class="space-y-5 hidden">

                        <div class="grid grid-cols-[160px_1fr] gap-3">
                            <label>Lớp *</label>
                            <input type="text" name="Lop" value="{{ old('Lop') }}"
                                class="p-2 rounded w-full border @error('Lop') border-red-500 @enderror">
                        </div>
                        @error('Lop') <p class="text-red-500 text-sm ml-[160px]">{{ $message }}</p> @enderror

                    </div>

                </div>

            </div>

            <div class="flex justify-end gap-4 mt-10 mr-20">
                <button type="submit" class="bg-[#1D8E8E] text-white px-5 py-2 rounded">
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
        }
    }

    role.addEventListener("change", changeRole);
    changeRole();

    setTimeout(() => {
        let modal = document.getElementById('successModal');
        if(modal) modal.style.display = 'none';
    }, 2000);
</script>

@endsection