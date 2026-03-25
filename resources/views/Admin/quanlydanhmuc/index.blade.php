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
    @include('layout.sidebarAdmin')

    <div class="ml-64 pt-8 p-8 mt-20">

        <!-- Tiêu đề -->
        <div id="breadcrumb" class="bg-[#1D546D] text-white px-11 py-3 rounded-md inline-block font-semibold">
            Quản lý danh mục
        </div>
        @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
        @endif
        @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
        @endif
        <!-- Header -->
        <div class="flex justify-between items-center mt-6">
            <div>
                <p class="text-black mb-6">Chọn loại danh mục cần quản lý</p>
                <select class="bg-[#F3F4F4] border border-gray-400 rounded px-3 py-2 w-56" onchange="window.location.href='{{ route('admin.danhmuc.index') }}?type=' + this.value">
                    <option value="loai" {{ $type == 'loai' ? 'selected' : '' }}>Loại đề tài</option>
                    <option value="donvi" {{ $type == 'donvi' ? 'selected' : '' }}>Đơn vị</option>
                </select>
            </div>

            <button onclick="moFormCreate()" class="bg-blue-500 text-white px-4 py-2 rounded">
                <i class="fa fa-plus"></i> Thêm mới
            </button>
        </div>

        <!-- Bảng -->
        <div class="flex gap-10 mt-6">
            <div class="w-2/3">

                @if($type == 'loai')
                <h3 class="font-semibold mb-4 text-black">Danh sách các loại đề tài</h3>
                @else
                <h3 class="font-semibold mb-4 text-black">Danh sách các đơn vị</h3>
                @endif

                <table class="w-full text-sm border-separate border-spacing-y-2">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th class="text-center">
                                {{ $type == 'loai' ? 'Loại đề tài' : 'Đơn vị' }}
                            </th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($danhmuc as $index => $dm)
                        <tr id="row{{$index}}">
                            <td>{{ $danhmuc->firstItem() + $index }}</td>

                            <!-- FIX CHỖ NÀY -->
                            <td id="ten{{$index}}" class="text-center">
                                @if($type == 'loai')
                                {{ $dm->ten_loai }}
                                @else
                                {{ $dm->ten_don_vi }}
                                @endif
                            </td>

                            <td class="text-center">

                                <!-- EDIT -->
                                <button
                                    onclick="moFormEdit('row{{$index}}','ten{{$index}}','{{ $dm->id }}')"
                                    class="bg-[#7AB2B2] px-3 py-1 rounded text-black text-sm">
                                    Chỉnh sửa
                                </button>

                                <!-- DELETE -->
                                <button onclick="moPopupXoa({{ $dm->id }}, '{{ $type == 'loai' ? $dm->ten_loai : $dm->ten_don_vi }}')"
                                    class="bg-red-500 px-3 py-1 rounded text-white ml-2">
                                    Xóa
                                </button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $danhmuc->links() }}

            </div>

            <div class="w-1/3">
                @include('Admin.quanlydanhmuc.create')
                @include('Admin.quanlydanhmuc.edit')
            </div>
        </div>
    </div>

    <!-- FORM ẨN -->
    <form id="formXoa" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="type" value="{{ $type }}">
    </form>

    <form id="formEditSubmit" method="POST">
        @csrf
    </form>

    <!-- POPUP XÓA giữ nguyên -->

    <div id="popupXoa" class="hidden fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center">
        <div class="bg-white w-[420px] rounded-lg">
            <div class="flex justify-between border-b px-4 py-2">
                <h2>Xóa danh mục</h2>
                <button onclick="dongPopupXoa()">✖</button>
            </div>

            <div class="p-6 text-center">
                <p id="noiDungXoa"></p>

                <div class="mt-4 flex justify-center gap-4">
                    <button onclick="xacNhanXoa()" class="bg-teal-600 text-white px-4 py-2 rounded">
                        Xác nhận
                    </button>

                    <button onclick="dongPopupXoa()" class="bg-gray-300 px-4 py-2 rounded">
                        Hủy
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let idDangXoa = null
        let idDangSua = null
        let dongDangChon = null;

        function boHighlight() {
            if (dongDangChon) {
                dongDangChon.style.backgroundColor = "";
                dongDangChon = null;
            }
        }

        // DELETE
        function moPopupXoa(id, ten) {
            tatTatCaPopup();
            idDangXoa = id
            document.getElementById("noiDungXoa").innerHTML =
                'Xóa "' + ten + '" ?'
            document.getElementById("popupXoa").classList.remove("hidden")
        }

        function dongPopupXoa() {
            document.getElementById("popupXoa").classList.add("hidden")
        }

        function xacNhanXoa() {
            let form = document.getElementById("formXoa")
            form.action = "/admin/danhmuc/delete/" + idDangXoa
            form.submit()
        }

        // CREATE
        function moFormCreate() {
            tatTatCaPopup();
            document.getElementById("popupForm").classList.remove("hidden")
        }

        // EDIT
        function moFormEdit(rowId, cellId, id) {
            tatTatCaPopup();
            dongTatCaForm()

            boHighlight(); // bỏ cái cũ trước

            dongDangChon = document.getElementById(rowId);
            dongDangChon.style.backgroundColor = "#D9D9D9";

            let ten = document.getElementById(cellId).innerText

            // set dữ liệu
            document.getElementById("editInput").value = ten
            document.getElementById("editId").value = id

            // 🔥 QUAN TRỌNG: set action đúng route
            document.getElementById("formUpdate").action =
                "/admin/danhmuc/update/" + id

            document.getElementById("formEdit").classList.remove("hidden")
        }

        function dongTatCaForm() {
            document.getElementById("formEdit").classList.add("hidden")
            document.getElementById("popupForm").classList.add("hidden")
        }

        function huyEdit() {
            document.getElementById("formEdit").classList.add("hidden")
        }

        function huyForm() {
            document.getElementById("popupForm").classList.add("hidden")
        }

        function tatTatCaPopup() {
            boHighlight();
            document.getElementById("popupForm")?.classList.add("hidden");
            document.getElementById("formEdit")?.classList.add("hidden");
            document.getElementById("popupXoa")?.classList.add("hidden");
        }


        // Lọc danh mục
        function locDanhMuc(type) {
            if (type === "loai") {
                window.location.href = "/admin/danhmuc?type=loai";
            } else {
                window.location.href = "/admin/danhmuc?type=donvi";
            }
        }
    </script>

</body>

</html>