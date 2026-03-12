<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Theo dõi tiến độ</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="bg-white">

    @include('layout.navbar')
    @include('layout.sidebar')


    <!-- MAIN CONTENT -->
    <div class="ml-[260px] mt-[10px] p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">

            <button class="bg-[#2f5d6e] text-white px-6 py-2 rounded">
                Theo dõi tiến độ đề tài
            </button>

        </div>


        <!-- CONTENT -->
        <div class="flex gap-6">

            <!-- DANH SÁCH ĐỀ TÀI -->
            <div class="w-2/3 bg-[#EBF4F6] p-6 rounded-lg">

                <!-- SEARCH -->
                <div class="flex gap-4 mb-4">

                    <input type="text"
                        placeholder="Tìm kiếm đề tài ..."
                        class="border px-3 py-2 rounded w-60">

                    <select class="border px-3 py-2 rounded">
                        <option>Tất cả trạng thái</option>
                    </select>

                </div>


                <!-- TABLE -->
                <table class="w-full text-sm">

                    <thead>
                        <tr class="border-b text-left">
                            <th class="py-2">STT</th>
                            <th>Tên đề tài</th>
                            <th>Chủ nhiệm</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr onclick="xemChiTiet(this)"
                            class="cursor-pointer hover:bg-gray-200">

                            <td class="py-2">01</td>
                            <td>Nghiên cứu AI trong giáo dục</td>
                            <td>Nguyễn Văn C</td>
                            <td>20/1/2026-15/4/2026</td>

                            <td>
                                <span class="bg-green-600 text-white px-3 py-1 rounded text-xs">
                                    Đúng tiến độ
                                </span>
                            </td>

                        </tr>

                        <tr onclick="xemChiTiet(this)"
                            class="cursor-pointer hover:bg-gray-200">

                            <td class="py-2">02</td>
                            <td>Deep Learning nhận diện ảnh</td>
                            <td>Đào Ngọc Lan</td>
                            <td>1/4/2025-6/5/2025</td>

                            <td>
                                <span class="bg-red-500 text-white px-3 py-1 rounded text-xs">
                                    Trễ hạn
                                </span>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>


            <!-- CHI TIẾT ĐỀ TÀI -->
            <div class="w-1/3">

                @include('Admin.theodoitiendo.chitiet')

            </div>

        </div>

    </div>



    <script>
        function xemChiTiet(row) {
            document.getElementById("chiTietBox").classList.remove("hidden")

            document.querySelectorAll("tbody tr").forEach(r => {
                r.classList.remove("bg-blue-100")
            })

            row.classList.add("bg-blue-100")
        }

        /// Đóng chi tiết
        function dongChiTiet() {
            document.getElementById("chiTietBox").classList.add("hidden")

            // bỏ highlight dòng
            document.querySelectorAll("tbody tr").forEach(r => {
                r.classList.remove("bg-gray-200")
            })
        }

        function capNhatTienDo() {
            alert("Cập nhật tiến độ thành công!");

            // đóng form chi tiết
            document.getElementById("chiTietBox").classList.add("hidden");

            // bỏ highlight dòng bảng
            let rows = document.querySelectorAll("tbody tr");
            rows.forEach(row => {
                row.classList.remove("bg-gray-200");
                row.classList.remove("bg-blue-100");
            });
        }
    </script>

</body>

</html>