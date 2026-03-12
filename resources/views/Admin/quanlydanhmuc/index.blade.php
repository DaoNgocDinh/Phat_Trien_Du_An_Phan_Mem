<?php
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý danh mục</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="bg-white">
    @include('layout.navbar')

    @include('layout.sidebar')
    <div class="ml-64 pt-8 p-8">

        <!-- Tiêu đề -->
        <div id="breadcrumb" class="bg-[#1D546D] text-white px-11 py-3 rounded-md inline-block font-semibold">
            Quản lý danh mục
        </div>

        <!-- Chọn danh mục -->
        <div class="flex justify-between items-center mt-6">
            <div class="flex flex-col ">
                <p class="text-black mb-6">Chọn loại danh mục cần quản lý</p>
                <select class="bg-[#F3F4F4] border border-gray-400 rounded px-3 py-2 w-56">
                    <option>Loại đề tài</option>
                </select>
            </div>

            <div class="flex items-center justify-between mt-10">

                <div class="flex items-center gap-4">
                    <button onclick="moFormCreate()" class="flex items-center gap-3 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        <i class="fa fa-plus"></i>
                        Thêm mới
                    </button>
                </div>
            </div>
        </div>

        <!-- Bảng -->
        <div class="flex gap-10 mt-6">
            <div class="w-2/3">

                <h3 class="font-semibold mb-6 text-black">Danh sách các loại đề tài</h3>

                <table class="w-full text-sm">

                    <thead>
                        <tr class="text-left text-black">
                            <th class="py-2 w-20">STT</th>
                            <th class="py-2 text-center">Loại đề tài</th>
                            <th class="py-2 text-center">Hành động</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-700">

                        <tr id="row1" class="h-12">
                            <td>01</td>
                            <td id="ten1" class="text-center text-black">Bài báo</td>
                            <td class="text-center">
                                <button onclick="moFormEdit('row1', 'ten1')" class="bg-[#7AB2B2] px-3 py-1 rounded text-black text-sm">Chỉnh sửa</button>
                                <button onclick="moPopupXoa('row1', 'ten1')" class="bg-[#C65E40] px-4 py-1 rounded text-black text-sm ml-3 hover:bg-red-600">Xóa</button>
                            </td>
                        </tr>

                        <tr id="row2" class="h-12">
                            <td>02</td>
                            <td id="ten2" class="text-center text-black">Hội thảo</td>
                            <td class="text-center">
                                <button onclick="moFormEdit('row2', 'ten2')" class="bg-[#7AB2B2] px-3 py-1 rounded text-black text-sm">Chỉnh sửa</button>
                                <button onclick="moPopupXoa('row2', 'ten2')" class="bg-[#C65E40] px-4 py-1 rounded text-black text-sm ml-3 hover:bg-red-600">Xóa</button>
                            </td>
                        </tr>

                        <tr id="row3" class="h-12">
                            <td>03</td>
                            <td id="ten3" class="text-center text-black">Sách</td>
                            <td class="text-center">
                                <button onclick="moFormEdit('row3', 'ten3')" class="bg-[#7AB2B2] px-3 py-1 rounded text-black text-sm">Chỉnh sửa</button>
                                <button onclick="moPopupXoa('row3', 'ten3')" class="bg-[#C65E40] px-4 py-1 rounded text-black text-sm ml-3 hover:bg-red-600">Xóa</button>
                            </td>
                        </tr>

                        <tr id="row4" class="h-12">
                            <td>04</td>
                            <td id="ten4" class="text-center text-black">Tạp chí</td>
                            <td class="text-center">
                                <button onclick="moFormEdit('row4', 'ten4')" class="bg-[#7AB2B2] px-3 py-1 rounded text-black text-sm">Chỉnh sửa</button>
                                <button onclick="moPopupXoa('row4', 'ten4')" class="bg-[#C65E40] px-4 py-1 rounded text-black text-sm ml-3 hover:bg-red-600">Xóa</button>
                            </td>
                        </tr>

                        <tr id="row5" class="h-12">
                            <td>05</td>
                            <td id="ten5" class="text-center text-black">ISI</td>
                            <td class="text-center">
                                <button onclick="moFormEdit('row5', 'ten5')" class="bg-[#7AB2B2] px-3 py-1 rounded text-black text-sm">Chỉnh sửa</button>
                                <button onclick="moPopupXoa('row5', 'ten5')" class="bg-[#C65E40] px-4 py-1 rounded text-black text-sm ml-3 hover:bg-red-600">Xóa</button>
                            </td>
                        </tr>

                    </tbody>

                </table>

                <!-- Footer -->
                <div class="flex justify-evenly items-center mt-20 text-sm text-black">

                    <p class="font-bold">Hiển thị 05 danh mục</p>

                    <div class="flex gap-2">
                        <button class="bg-gray-200 px-2 py-1 rounded">&lt;</button>
                        <button class="bg-gray-300 px-3 py-1 rounded">1</button>
                        <button class="bg-gray-200 px-2 py-1 rounded">&gt;</button>
                    </div>

                </div>

            </div>
            <div id="formCreate" class="w1/3">
                @include('Admin.quanlydanhmuc.create')
                @include('Admin.quanlydanhmuc.edit')
            </div>
        </div>

    </div>

    <!-- Popup Xóa -->

    <div id="popupXoa"
        class="hidden fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center">

        <div class="bg-white w-[420px] rounded-lg shadow-lg">

            <!-- HEADER -->
            <div class="flex justify-between items-center border-b px-4 py-2">

                <h2 class="font-semibold text-gray-700">
                    Xóa danh mục
                </h2>

                <button onclick="dongPopupXoa()">
                    <i class="fa fa-times"></i>
                </button>

            </div>


            <!-- CONTENT -->
            <div class="p-6 text-center">

                <p id="noiDungXoa" class="text-gray-700">
                    Bạn có chắc chắn muốn xóa danh mục ?
                </p>

                <div class="mt-6 flex justify-center gap-6">

                    <button
                        onclick="xacNhanXoa()"
                        class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">

                        <i class="fa fa-check"></i>
                        Xác nhận

                    </button>

                    <button
                        onclick="dongPopupXoa()"
                        class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">

                        <i class="fa fa-times"></i>
                        Hủy

                    </button>

                </div>

            </div>

        </div>
    </div>

    <!-- Popup Không Xóa -->
    <div id="popupKhongXoa"
        class="hidden fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center">

        <div class="bg-white w-[420px] rounded-lg shadow-lg">

            <div class="flex justify-between items-center border-b px-4 py-2">

                <h2 class="font-semibold">
                    Thông báo
                </h2>

                <button onclick="dongPopupKhongXoa()">✖</button>

            </div>


            <div class="p-6 text-center">

                <div class="text-red-500 text-4xl mb-3">
                    <i class="fa fa-exclamation-circle"></i>
                </div>

                <p class="font-semibold text-gray-700">

                    Danh mục này đang hoạt động nên không thể xóa

                </p>

                <div class="mt-6">

                    <button
                        onclick="dongPopupKhongXoa()"
                        class="bg-gray-400 text-white px-6 py-2 rounded">

                        Đóng

                    </button>

                </div>

            </div>

        </div>

    </div>
</body>

<script>
    //////////XÓA
    let rowDangXoa = null

    function moPopupXoa(rowId, tenDanhMuc) {

        rowDangXoa = rowId
        dongTatCaForm()

        // đổi màu dòng
        document.getElementById(rowId).style.backgroundColor = "#E7E7E7"

        // đổi nội dung popup
        document.getElementById("noiDungXoa").innerHTML =
            'Bạn có chắc chắn muốn xóa danh mục "' + tenDanhMuc + '" ?'

        // đổi breadcrumb
        document.getElementById("breadcrumb").innerHTML =
            "Quản lý danh mục > Xóa danh mục"

        // hiện popup
        document.getElementById("popupXoa").classList.remove("hidden")

    }


    function dongPopupXoa() {

        document.getElementById("popupXoa").classList.add("hidden")

        // bỏ màu dòng
        if (rowDangXoa) {
            document.getElementById(rowDangXoa).style.backgroundColor = ""
        }

        // trả breadcrumb
        document.getElementById("breadcrumb").innerHTML =
            "Quản lý danh mục"

    }


    function xacNhanXoa() {

        if (rowDangXoa) {
            document.getElementById(rowDangXoa).remove()
        }

        document.getElementById("popupXoa").classList.add("hidden")

        document.getElementById("breadcrumb").innerHTML =
            "Quản lý danh mục"

    }

    ////////CREATE
    function moFormCreate() {
        
        dongTatCaForm()
        document.getElementById("popupForm").classList.remove("hidden")

        document.getElementById("breadcrumb").innerHTML =
            "Quản lý danh mục > Thêm danh mục"

    }

    function huyForm() {

        document.getElementById("popupForm").classList.add("hidden")

        document.getElementById("breadcrumb").innerHTML =
            "Quản lý danh mục"

    }

    function luuDanhMuc() {

        let ten = document.getElementById("tenDanhMuc").value

        if (ten === "") {
            alert("Vui lòng nhập thông tin!")
            return
        }

        document.getElementById("popupSuccess").classList.remove("hidden")

    }

    function dongPopup() {

        document.getElementById("popupSuccess").classList.add("hidden")

        document.getElementById("popupForm").classList.add("hidden")

        document.getElementById("breadcrumb").innerHTML =
            "Quản lý danh mục"

    }

    ////////KHONGTHEXOA
    function moPopupKhongXoa() {

        document.getElementById("popupKhongXoa")
            .classList.remove("hidden")

    }

    function dongPopupKhongXoa() {

        document.getElementById("popupKhongXoa")
            .classList.add("hidden")

    }

    ////////EDIT
    let rowDangSua = null
    let cellDangSua = null

    function moFormEdit(rowId, cellId) {

        rowDangSua = rowId
        cellDangSua = cellId
        dongTatCaForm()

        document.getElementById(rowId).style.backgroundColor = "#D9D9D9"

        let ten = document.getElementById(cellId).innerText
        document.getElementById("editInput").value = ten

        document.getElementById("formEdit").classList.remove("hidden")

        document.getElementById("breadcrumb").innerHTML =
            "Quản lý danh mục > Chỉnh sửa danh mục"
    }

    function capNhatDanhMuc() {

        let tenMoi = document.getElementById("editInput").value

        document.getElementById(cellDangSua).innerText = tenMoi

        document.getElementById("formEdit").classList.add("hidden")

        document.getElementById("breadcrumb").innerHTML =
            "Quản lý danh mục"

        document.getElementById(rowDangSua).style.backgroundColor = ""
    }

    function huyEdit() {

        document.getElementById("formEdit").classList.add("hidden")

        document.getElementById("breadcrumb").innerHTML =
            "Quản lý danh mục"

        document.getElementById(rowDangSua).style.backgroundColor = ""

    }

    ///FIX LỖI UI
    function dongTatCaForm() {

        // đóng form thêm
        let popupForm = document.getElementById("popupForm")
        if (popupForm) {
            popupForm.classList.add("hidden")
        }

        // đóng form edit
        let formEdit = document.getElementById("formEdit")
        if (formEdit) {
            formEdit.classList.add("hidden")
        }

        // đóng popup xóa
        let popupXoa = document.getElementById("popupXoa")
        if (popupXoa) {
            popupXoa.classList.add("hidden")
        }

        // reset breadcrumb
        document.getElementById("breadcrumb").innerHTML = "Quản lý danh mục"

        // bỏ highlight tất cả dòng
        document.querySelectorAll("tr").forEach(row => {
            row.style.backgroundColor = ""
        })

    }
</script>

</html>