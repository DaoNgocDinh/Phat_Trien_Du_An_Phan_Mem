<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Hồ sơ cá nhân</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="bg-white">

    <!-- NAVBAR -->
    @include('layout.navbar')

    <!-- SIDEBAR -->
    @include('layout.sidebar')


    <div class="ml-64 p-2">

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

        <div class="bg-[#D9E2E6] rounded-lg p-8 mt-2">

            <p class="text-red-500 text-center mb-3">
                Vui lòng sửa các thông tin muốn thay đổi
            </p>


            <div class="grid grid-cols-3 gap-6">

                <!-- AVATAR -->

                <div class="flex justify-center">

                    <div class="border-[20px] border-[#40444D] rounded-lg p-6 w-56 h-56 flex items-center justify-center">

                        <i class="fa fa-user text-9xl text-[#40444D]"></i>

                    </div>

                </div>


                <!-- FORM INPUT -->

                <div class="col-span-2 grid grid-cols-2 gap-6">

                    <div>
                        <label>Họ :</label>

                        <input type="text"
                            class="border border-black rounded px-3 py-2 w-full"
                            value="Nguyễn"
                            disabled>
                    </div>


                    <div>
                        <label>Tên :</label>

                        <input type="text"
                            class="border border-black rounded px-3 py-2 w-full"
                            value="Lan Anh"
                            disabled>
                    </div>


                    <div>
                        <label>Họ và tên :</label>

                        <input type="text"
                            class="border border-black rounded px-3 py-2 w-full"
                            value="Nguyễn Lan Anh"
                            disabled>
                    </div>


                    <div>
                        <label>Ngày sinh :</label>

                        <input type="text"
                            class="border border-black rounded px-3 py-2 w-full"
                            value="12/05/1980"
                            disabled>
                    </div>


                    <div>
                        <label>Giới tính :</label>

                        <select class="border border-black rounded px-3 py-2 w-full" disabled>

                            <option>Nữ</option>
                            <option>Nam</option>

                        </select>
                    </div>


                    <div>
                        <label>Chức vụ :</label>

                        <input type="text"
                            class="border border-black rounded px-3 py-2 w-full"
                            value="Giảng viên"
                            disabled>
                    </div>


                    <div>
                        <label>Số CCSD :</label>

                        <input type="text"
                            class="border border-black rounded px-3 py-2 w-full"
                            value="034307993282"
                            disabled>
                    </div>


                    <div>
                        <label>Số điện thoại :</label>

                        <input type="text"
                            class="border border-black rounded px-3 py-2 w-full"
                            value="0367419932"
                            disabled>
                    </div>


                    <div>
                        <label>Khoa :</label>

                        <select class="border border-black rounded px-3 py-2 w-full" disabled>

                            <option>Công nghệ thông tin</option>

                        </select>
                    </div>


                    <div>
                        <label>CV :</label>

                        <input type="file"
                            class="border border-black rounded px-3 py-2 w-full"
                            disabled>
                    </div>


                    <div class="col-span-2">

                        <label>Email :</label>

                        <input type="text"
                            class="border border-black rounded px-3 py-2 w-full"
                            value="lanhnguyen80@gmail.com"
                            disabled>

                    </div>

                </div>

            </div>


            <!-- BUTTON -->

            <div class="flex justify-end mt-6 gap-4">

                <!-- BUTTON CHỈNH SỬA -->

                <button id="btnEdit"
                    onclick="batCheDoChinhSua()"
                    class="bg-[#7AB2B2] text-white px-6 py-2 rounded">

                    <i class="fa fa-pen"></i>
                    Chỉnh sửa hồ sơ

                </button>


                <!-- BUTTON CẬP NHẬT + HỦY -->

                <div id="editButtons" class="hidden flex gap-4">

                    <button onclick="showSuccess()"
                        class="bg-[#1D8E8E] text-white px-6 py-2 rounded">

                        <i class="fa fa-check"></i>
                        Cập nhật

                    </button>


                    <button
                        onclick="huyChinhSua()"
                        class="bg-[#D3DBDB] px-6 py-2 rounded">

                        <i class="fa fa-times"></i>
                        Hủy

                    </button>

                </div>

            </div>


        </div>

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

            let inputs = document.querySelectorAll("input, select");

            inputs.forEach(input => {

                input.disabled = false;

            });


            document.getElementById("btnEdit").classList.add("hidden");

            document.getElementById("editButtons").classList.remove("hidden");

        }


        function huyChinhSua() {

            let inputs = document.querySelectorAll("input, select");

            inputs.forEach(input => {

                input.disabled = true;

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

                input.disabled = true;

            });
            // Hiện lại nút chỉnh sửa
            document.getElementById("btnEdit").classList.remove("hidden");

            // Ẩn nút cập nhật + hủy
            document.getElementById("editButtons").classList.add("hidden");
        }
    </script>

</body>

</html>