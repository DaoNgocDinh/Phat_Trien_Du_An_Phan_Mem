<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Phê duyệt đề xuất</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-white">

    @include('layout.navbar')
    @include('layout.sidebar')

    <div class="ml-64 p-10">

        <!-- TITLE -->

        <div class="bg-[#2f5d6e] text-white px-6 py-2 rounded-md inline-block font-semibold">
            Phê duyệt đề xuất
        </div>

        <p class="mt-10 text-sm text-gray-600">
            Chọn các tiêu chí để xem các đề xuất
        </p>


        <!-- GRID LAYOUT -->

        <div class="grid grid-cols-3 gap-6 mt-10">

            <!-- LEFT SIDE -->

            <div class="col-span-2 bg-[#EBF4F6] rounded-lg p-6">

                <h2 class="font-semibold mb-4">
                    Bộ lọc đề xuất
                </h2>

                <div class="flex gap-6 items-end mb-6">

                    <div>
                        <label class="text-sm">Loại đề xuất</label>

                        <select class="border rounded px-3 py-1 block">
                            <option>Công bố</option>
                            <option>Đề tài</option>
                        </select>
                    </div>


                    <div>
                        <label class="text-sm">Thời gian</label>

                        <input type="date"
                            class="border rounded px-3 py-1 block">
                    </div>


                    <button class="bg-blue-500 text-white px-6 py-1.5 rounded mt-5">
                        Tìm kiếm
                    </button>

                </div>


                <!-- TABLE -->

                <h2 class="font-semibold mb-3">
                    Danh sách đề xuất
                </h2>

                <table class="w-full text-sm">

                    <thead>

                        <tr class="border-b">

                            <th class="text-left">STT</th>
                            <th class="text-left">Tên đề xuất</th>
                            <th class="text-left">Người gửi</th>
                            <th class="text-left">Loại</th>
                            <th class="text-left">Trạng thái</th>
                            <th class="text-left">Hành động</th>

                        </tr>

                    </thead>


                    <tbody>

                        <tr class="border-b">

                            <td>01</td>

                            <td>Xây dựng hệ thống quản lý học tập</td>

                            <td>Nguyễn Văn C</td>

                            <td>Đề tài</td>

                            <td>
                                <span class="bg-orange-400 text-white px-2 py-1 rounded text-xs">
                                    Chờ duyệt
                                </span>
                            </td>

                            <td>

                                <button onclick="xemChiTiet(this)"
                                    class="bg-[#2f5d6e] text-white px-4 py-1 rounded text-sm">

                                    Xem

                                </button>

                            </td>

                        </tr>


                        <tr class="border-b">

                            <td>02</td>

                            <td>Khai phá dữ liệu trong giáo dục</td>

                            <td>Đào Ngọc Lan</td>

                            <td>Công bố</td>

                            <td>

                                <span class="bg-orange-400 text-white px-2 py-1 rounded text-xs">
                                    Chờ duyệt
                                </span>

                            </td>

                            <td>

                                <button onclick="xemChiTiet(this)"
                                    class="bg-[#2f5d6e] text-white px-4 py-1 rounded text-sm">

                                    Xem

                                </button>

                            </td>

                        </tr>

                        <tr class="border-b">

                            <td>03</td>

                            <td>Chatbox hỗ trợ sinh viên </td>

                            <td>Nguyễn Ngọc Lan</td>

                            <td>Đề tài</td>

                            <td>

                                <span class="bg-orange-400 text-white px-2 py-1 rounded text-xs">
                                    Chờ duyệt
                                </span>

                            </td>

                            <td>

                                <button onclick="xemChiTiet(this)"
                                    class="bg-[#2f5d6e] text-white px-4 py-1 rounded text-sm">

                                    Xem

                                </button>

                            </td>

                        </tr>

                        <tr class="border-b">

                            <td>04</td>

                            <td>Hệ thống gợi ý thông tin</td>

                            <td>Vũ Đức Minh</td>

                            <td>Công bố</td>

                            <td>

                                <span class="bg-orange-400 text-white px-2 py-1 rounded text-xs">
                                    Chờ duyệt
                                </span>

                            </td>

                            <td>

                                <button onclick="xemChiTiet(this)"
                                    class="bg-[#2f5d6e] text-white px-4 py-1 rounded text-sm">

                                    Xem

                                </button>

                            </td>

                        </tr>

                        <tr class="border-b">

                            <td>06</td>

                            <td>Phát hiện gian lận trong giao dịch số</td>

                            <td>Trần Văn B</td>

                            <td>Công bố</td>

                            <td>

                                <span class="bg-orange-400 text-white px-2 py-1 rounded text-xs">
                                    Chờ duyệt
                                </span>

                            </td>

                            <td>

                                <button onclick="xemChiTiet(this)"
                                    class="bg-[#2f5d6e] text-white px-4 py-1 rounded text-sm">

                                    Xem

                                </button>

                            </td>

                        </tr>

                    </tbody>

                </table>


                <!-- PAGINATIO: phân trang -->

                <div class="flex justify-center mt-6 gap-2">

                    <button class="px-3 py-1 bg-white rounded hover:bg-gray-300">
                        &lt;
                    </button>

                    <button class="px-3 py-1 bg-white text-black rounded">
                        1
                    </button>

                    <button class="px-3 py-1 bg-white rounded hover:bg-gray-300">
                        &gt;
                    </button>

                </div>

            </div>

            <!-- RIGHT SIDE-->

            <div>
                @include('Admin.pheduyetdexuat.chitiet')
            </div>


        </div>


    </div>


    <!-- POPUP XÁC NHẬN PHÊ DUYỆT -->
    <div id="popupApprove"
        class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center">

        <div class="bg-white rounded-lg w-[420px] shadow-lg">

            <div class="flex justify-between items-center border-b px-4 py-2 font-semibold">

                Xác nhận phê duyệt

                <button onclick="closeApprove()">✖</button>

            </div>

            <div class="p-6 text-center">

                <p class="mb-6">
                    Bạn có chắc chắn muốn phê duyệt đề xuất này ?
                </p>

                <div class="flex justify-center gap-4">

                    <button
                        class="bg-[#1D8E8E] text-white px-5 py-1 rounded">
                        ✔ Xác nhận
                    </button>

                    <button onclick="closeApprove()"
                        class="bg-gray-300 px-5 py-1 rounded">
                        ✖ Hủy
                    </button>

                </div>

            </div>

        </div>

    </div>



    <!-- POPUP TỪ CHỐI -->
    <div id="popupReject"
        class="fixed inset-0 bg-black bg-opacity-40 hidden  flex items-center justify-center">

        <div class="bg-white w-[420px] rounded shadow-lg">

            <!-- HEADER -->
            <div class="flex justify-between items-center border-b px-4 py-2">
                <h3 class="font-semibold">Xác nhận từ chối</h3>
                <button onclick="closeReject()">✖</button>
            </div>

            <!-- BODY -->
            <div class="p-6 text-center">
                <p class="mb-5">
                    Bạn có chắc chắn muốn <b>từ chối</b> đề xuất này ?
                </p>

                <div class="flex justify-center gap-4">

                    <button class="bg-red-500 text-white px-4 py-2 rounded">
                        ✔ Xác nhận
                    </button>

                    <button onclick="closeReject()"
                        class="bg-gray-300 px-4 py-2 rounded">
                        ✖ Hủy
                    </button>

                </div>
            </div>

        </div>
    </div>


    <script>
        function xemChiTiet(btn) {
            // xóa highlight tất cả dòng
            let rows = document.querySelectorAll("tbody tr");
            rows.forEach(row => {
                row.classList.remove("bg-blue-100");
            });

            // lấy dòng hiện tại
            let row = btn.closest("tr");

            // highlight
            row.classList.add("bg-[#E6E6E6]");


            document.getElementById("chiTietBox").classList.remove("hidden")

        }

        function dongChiTiet() {
            document.getElementById("chiTietBox").classList.add("hidden")
            // Xóa highlight tất cả dòng
            let rows = document.querySelectorAll("tbody tr")

            rows.forEach(row => {
                row.classList.remove("bg-[#E6E6E6]")
            })

        }

        function openApprove() {
            document.getElementById("popupApprove").classList.remove("hidden")
        }

        function closeApprove() {
            document.getElementById("popupApprove").classList.add("hidden")
        }

        function openReject() {
            document.getElementById("popupReject").classList.remove("hidden")
        }

        function closeReject() {
            document.getElementById("popupReject").classList.add("hidden")
        }
    </script>


</body>

</html>