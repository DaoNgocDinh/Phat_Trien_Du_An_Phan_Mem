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
    @include('layout.sidebarAdmin')


    <!-- MAIN CONTENT -->
    <div class="ml-[260px] mt-[80px] p-6">

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

                        @foreach($detai as $index => $dt)

                        <tr onclick="xemChiTiet({{ $dt->MaSo }}, this)"
                            class="cursor-pointer hover:bg-gray-200">

                            <td class="py-2">{{ $index+1 }}</td>

                            <td>{{ $dt->TenDeTai }}</td>

                            <td>{{ $dt->ChuNhiem }}</td>

                            <td>
                                {{ $dt->ThoiGianBatDau }} - {{ $dt->ThoiGianKetThuc }}
                            </td>

                            <td>

                                @if($dt->TrangThai == 'Đúng tiến độ')
                                <span class="bg-green-600 text-white px-3 py-1 rounded text-xs">
                                    {{ $dt->TrangThai }}
                                </span>

                                @elseif($dt->TrangThai == 'Trễ hạn')
                                <span class="bg-red-500 text-white px-3 py-1 rounded text-xs">
                                    {{ $dt->TrangThai }}
                                </span>

                                @else
                                <span class="bg-gray-400 text-white px-3 py-1 rounded text-xs">
                                    {{ $dt->TrangThai }}
                                </span>
                                @endif

                            </td>

                        </tr>

                        @endforeach

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
        function xemChiTiet(id, row) {

            fetch('/admin/theodoitiendo/' + id)

                .then(res => res.json())

                .then(data => {

                    document.getElementById("chiTietBox").classList.remove("hidden")

                    document.getElementById("tenDeTai").innerText = data.detai.TenDeTai
                    document.getElementById("chuNhiem").innerText = "Chủ nhiệm : " + data.detai.ChuNhiem

                    document.getElementById("thoiGian").innerText =
                        "Thời gian thực hiện : " +
                        data.detai.ThoiGianBatDau + " - " +
                        data.detai.ThoiGianKetThuc


                    // trạng thái hiện tại
                    if (data.ganNhat) {
                        document.getElementById("trangThai").innerText =
                            data.ganNhat.TrangThai

                        document.getElementById("lanGanNhat").value =
                            data.ganNhat.TrangThai

                        capNhatProgress(data.ganNhat.TrangThai)

                    } else {
                        document.getElementById("trangThai").innerText =
                            "Chưa cập nhật"

                        document.getElementById("lanGanNhat").value =
                            "Chưa có dữ liệu"
                    }


                    // lịch sử báo cáo
                    let html = ""

                    data.tiendo.forEach((td, index) => {

                        html += `
            <div class="border rounded-lg p-3 mb-3 bg-white">

                <div class="font-semibold text-sm mb-1">
                    Lần cập nhật ${data.tiendo.length-index}
                </div>

                <div class="text-sm mb-1">
                    Thời gian : ${td.ThoiGianCapNhat}
                </div>

                <div class="flex justify-between items-center">

                    <div class="flex items-center gap-2 text-sm">
                        <i class="fa-solid fa-file-pdf text-red-500"></i>
                        ${td.FileBaoCao}
                    </div>

                    <a href="/storage/${td.FileBaoCao}"
                       class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                       Xem báo cáo
                    </a>

                </div>

            </div>
            `
                    })

                    document.getElementById("lichSuBaoCao").innerHTML = html

                })

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

        /// Cập nhật màu sắc tiến độ
        function capNhatProgress(trangThai) {

            let dot1 = document.getElementById("dot1")
            let dot2 = document.getElementById("dot2")
            let dot3 = document.getElementById("dot3")

            // reset
            dot1.classList.remove("bg-green-500")
            dot2.classList.remove("bg-green-500")
            dot3.classList.remove("bg-green-500")

            dot1.classList.add("bg-gray-400")
            dot2.classList.add("bg-gray-400")
            dot3.classList.add("bg-gray-400")

            if (trangThai === "Chờ phê duyệt") {

                dot1.classList.remove("bg-gray-400")
                dot1.classList.add("bg-green-500")

            }

            if (trangThai === "Đang thực hiện") {

                dot1.classList.remove("bg-gray-400")
                dot2.classList.remove("bg-gray-400")

                dot1.classList.add("bg-green-500")
                dot2.classList.add("bg-green-500")

            }

            if (trangThai === "Hoàn thành") {

                dot1.classList.remove("bg-gray-400")
                dot2.classList.remove("bg-gray-400")
                dot3.classList.remove("bg-gray-400")

                dot1.classList.add("bg-green-500")
                dot2.classList.add("bg-green-500")
                dot3.classList.add("bg-green-500")

            }

        }
    </script>

</body>

</html>