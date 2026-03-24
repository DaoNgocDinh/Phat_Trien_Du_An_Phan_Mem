@extends('layout.giangVien')
<div class="ml-64 p-9 mt-10">

    <!-- TITLE -->

    <div class="flex justify-between items-center">

        <div class="bg-[#2f5d6e] text-white px-6 py-2 rounded-md font-semibold">
            Hồ sơ cá nhân
        </div>

    </div>


    <h2 class="mt-3 font-semibold text-lg">
        Thông tin cá nhân
    </h2>


    <!-- FORM -->
    <form action="{{ route('hoso.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="bg-[#D9E2E6] rounded-lg p-8 mt-2">

            <p class="text-red-500 text-center mb-3">
                Vui lòng sửa các thông tin muốn thay đổi !
            </p>


            <div class="grid grid-cols-3 gap-6">

                <!-- AVATAR -->

                <div class="flex justify-center">

                    <div class="border-[20px] border-[#40444D] rounded-lg p-6 w-56 h-56 flex items-center justify-center">
                        @if(!empty($hoso->AnhDaiDien))
                        <img src="{{ asset('storage/'.$hoso->AnhDaiDien) }}" class="w-40 h-40 rounded">
                        @else

                        <i class="fa fa-user text-9xl text-[#40444D]"></i>
                        @endif
                    </div>

                </div>


                <!-- FORM INPUT -->

                <div class="col-span-2 grid grid-cols-2 gap-6">
                    <div>
                        <label>Họ và tên :</label>

                        <input type="text"
                            name="HoTen"
                            value="{{ $hoso->HoTen ?? '' }}"
                            class="border border-black rounded px-3 py-2 w-full">
                        @error('HoTen')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>

                        <label>Ngày sinh :</label>
                        <input type="date"
                            name="NgaySinh"
                            value="{{ $hoso->NgaySinh ? $hoso->NgaySinh->format('Y-m-d') : '' }}"
                            class="border border-black rounded px-3 py-2 w-full">
                        @error('NgaySinh')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label>Chức vụ :</label>

                        <input type="text"
                            name="ChucVu"
                            value="{{ $hoso->chucVu->TenChucVu ?? '' }}"
                            class="border border-black rounded px-3 py-2 w-full bg-gray-200"
                            readonly>
                    </div>
                    <div>
                        <label>Số điện thoại :</label>

                        <input type="text"
                            name="SoDienThoai"
                            value="{{ $hoso->Sdt ?? '' }}"
                            class="border border-black rounded px-3 py-2 w-full"
                            readonly>
                    </div>


                    <div>
                        <label>Khoa :</label>

                        <input type="text"
                            name="Khoa"
                            value="{{ $hoso->khoa->TenKhoa ?? '' }}"
                            class="border border-black rounded px-3 py-2 w-full bg-gray-200"
                            readonly>
                    </div>


                    <div>
                        <label>CV :</label>

                        <input type="file"
                            name="CV"
                            class="border border-black rounded px-3 py-2 w-full"
                            disabled>

                    </div>


                    <div class="col-span-2">

                        <label>Email :</label>

                        <input type="text"
                            name="Email"
                            value="{{ $hoso->Email ?? '' }}"
                            class="border border-black rounded px-3 py-2 w-full"
                            readonly>

                    </div>

                </div>

            </div>


            <!-- BUTTON -->

            <div class="flex justify-end mt-6 gap-4">

                <!-- BUTTON CHỈNH SỬA -->

                <button id="btnEdit"
                    type="button"
                    onclick="batCheDoChinhSua()"
                    class="bg-[#7AB2B2] text-white px-6 py-2 rounded">

                    <i class="fa fa-pen"></i>
                    Chỉnh sửa hồ sơ

                </button>


                <!-- BUTTON CẬP NHẬT + HỦY -->

                <div id="editButtons" class="hidden flex gap-4">

                    <button id="btnSave" type="submit"
                        class="bg-[#1D8E8E] text-white px-6 py-2 rounded">
                        <i class="fa fa-check"></i>
                        Lưu thay đổi
                    </button>


                    <button type="button"
                        onclick="huyChinhSua()"
                        class="bg-[#D3DBDB] px-6 py-2 rounded">

                        <i class="fa fa-times"></i>
                        Hủy
                    </button>

                </div>

            </div>


        </div>
    </form>

</div>

<div id="successPopup"
    class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center">

    <div class="bg-white p-6 rounded-lg shadow-lg text-center w-80">

        <i class="fa fa-circle-check text-green-500 text-4xl mb-3"></i>

        <p class="text-lg font-semibold">
            Cập nhật thành công
        </p>

        <button
            onclick="closePopup()"
            class="mt-4 bg-[#2f5d6e] text-white px-4 py-2 rounded">

            OK

        </button>

    </div>

</div>
<!-- JAVASCRIPT -->

<script>
    function batCheDoChinhSua() {

        let inputs = document.querySelectorAll("input");

        inputs.forEach(input => {

            // chỉ bỏ qua những field không cho sửa thật
            if (input.name !== "ChucVu" && input.name !== "Khoa") {

                input.removeAttribute("readonly");
                input.disabled = false;

                input.classList.remove("bg-gray-200");
                input.classList.add("bg-white");
            }
        });

        document.getElementById("btnEdit").classList.add("hidden");
        document.getElementById("editButtons").classList.remove("hidden");
    }


    function huyChinhSua() {

        let inputs = document.querySelectorAll("input");

        inputs.forEach(input => {

            if (input.name !== "ChucVu" && input.name !== "Khoa") {

                input.setAttribute("readonly", true);
            }

            input.classList.remove("bg-white");
            input.classList.add("bg-gray-200");
        });

        document.getElementById("btnEdit").classList.remove("hidden");
        document.getElementById("editButtons").classList.add("hidden");
    }

    // Hàm hiển thị popup thành công
    function showSuccess() {

        document.getElementById("successPopup").classList.remove("hidden");
        document.getElementById("successPopup").classList.add("flex");

    }

    function closePopup() {

        document.getElementById("successPopup").classList.add("hidden");
        let inputs = document.querySelectorAll("input, select");
        inputs.forEach(input => {

            if (!input.hasAttribute("readonly")) {
                input.disabled = true;
            }

        });
        // Hiện lại nút chỉnh sửa
        document.getElementById("btnEdit").classList.remove("hidden");

        // Ẩn nút cập nhật + hủy
        document.getElementById("editButtons").classList.add("hidden");
    }
</script>
@if(session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("successPopup").classList.remove("hidden");
        document.getElementById("successPopup").classList.add("flex");
    });
</script>
@endif

<!-- xử lý validate -->
<script>
    const form = document.querySelector("form");
    const hoTen = document.querySelector("input[name='HoTen']");
    const ngaySinh = document.querySelector("input[name='NgaySinh']");
    const sdt = document.querySelector("input[name='SoDienThoai']");
    const email = document.querySelector("input[name='Email']");
    const btnSave = document.getElementById("btnSave");

    // ===== VALIDATE =====
    function validateHoTen() {
        if (hoTen.value.trim() === "") {
            showError(hoTen, "Vui lòng nhập họ tên");
            return false;
        }
        clearError(hoTen);
        return true;
    }

    function validateNgaySinh() {
        if (!ngaySinh.value) {
            showError(ngaySinh, "Vui lòng chọn ngày sinh");
            return false;
        }

        let today = new Date().toISOString().split('T')[0];
        if (ngaySinh.value > today) {
            showError(ngaySinh, "Ngày sinh không hợp lệ");
            return false;
        }

        clearError(ngaySinh);
        return true;
    }

    function validateSDT() {
        let value = sdt.value.trim();

        if (value === "") {
            showError(sdt, "Vui lòng nhập số điện thoại");
            return false;
        }

        if (!/^[0-9]{10}$/.test(value)) {
            showError(sdt, "Số điện thoại phải 10 chữ số");
            return false;
        }

        clearError(sdt);
        return true;
    }

    function validateEmail() {
        let value = email.value.trim();

        if (value === "") {
            showError(email, "Vui lòng nhập email");
            return false;
        }

        // regex email chuẩn
        let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!regex.test(value)) {
            showError(email, "Email không hợp lệ");
            return false;
        }

        clearError(email);
        return true;
    }

    // ===== CHECK ALL =====
    function validateAll() {
        let v1 = validateHoTen();
        let v2 = validateNgaySinh();
        let v3 = validateSDT();
        let v4 = validateEmail();

        return v1 && v2 && v3 && v4;
    }

    // ===== REALTIME =====
    hoTen.addEventListener("input", validateAll);
    ngaySinh.addEventListener("input", validateAll);
    sdt.addEventListener("input", validateAll);
    email.addEventListener("input", validateEmail);

    // ===== SUBMIT =====
    form.addEventListener("submit", function(e) {
        if (!validateAll()) {
            e.preventDefault();
        }
    });

    // ===== UI ERROR =====
    function showError(input, message) {
        clearError(input);

        input.classList.add("border-red-500");

        let error = document.createElement("p");
        error.className = "text-red-500 text-sm mt-1 error-msg";
        error.innerText = message;

        input.parentElement.appendChild(error);
    }

    function clearError(input) {
        input.classList.remove("border-red-500");

        let oldError = input.parentElement.querySelector(".error-msg");
        if (oldError) oldError.remove();
    }
</script>

