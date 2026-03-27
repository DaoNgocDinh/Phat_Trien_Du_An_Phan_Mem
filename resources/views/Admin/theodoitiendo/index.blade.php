<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Theo dõi tiến độ</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="bg-white">

    @include('layout.navbar')
    @include('layout.sidebarAdmin')


    <!-- MAIN CONTENT -->
    <div class="ml-[260px] mt-[80px] p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">

            <button class="bg-[#2f5d6e] text-white px-6 py-3 rounded">
                Theo dõi tiến độ đề tài
            </button>

        </div>


        <!-- CONTENT -->
        <div class="flex gap-6">

            <!-- DANH SÁCH ĐỀ TÀI -->
            <div class="w-2/3 bg-[#EBF4F6] p-6 rounded-lg">
                <!-- TABLE -->
                <table class="w-full text-sm">

                    <thead>
                        <tr class="border-b text-left">
                            <th class="py-2">STT</th>
                            <th>Tên đề tài</th>
                            <th>Chủ nhiệm</th>
                            <th>Thời gian</th>
                            <th>Trạng thái tiến độ</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($detai as $index => $dt)

                        <tr onclick="xemChiTiet({{ $dt->MaSo }}, this)"
                            class="cursor-pointer hover:bg-gray-200">

                            <td class="py-2">{{ $detai->firstItem() + $index }}</td>

                            <td>{{ $dt->TenDeTai }}</td>

                            <td>{{ $dt->ChuNhiem }}</td>

                            <td>
                                {{ $dt->ThoiGianBatDau }} - {{ $dt->ThoiGianKetThuc }}
                            </td>

                            <td>

                                @if($dt->TrangThaiTienDo == 'Đúng tiến độ')
                                <span class="bg-green-600 text-white px-3 py-1 rounded text-xs">
                                    {{ $dt->TrangThaiTienDo }}
                                </span>

                                @elseif($dt->TrangThaiTienDo == 'Trễ hạn')
                                <span class="bg-red-500 text-white px-3 py-1 rounded text-xs">
                                    {{ $dt->TrangThaiTienDo }}
                                </span>

                                @elseif($dt->TrangThaiTienDo == 'Hoàn thành')
                                <span class="bg-blue-500 text-white px-3 py-1 rounded text-xs">
                                    {{ $dt->TrangThaiTienDo }}
                                </span>

                                @else
                                <span class="bg-gray-400 text-white px-3 py-1 rounded text-xs">
                                    {{ $dt->TrangThaiTienDo ?? 'Chưa có dữ liệu' }}
                                </span>
                                @endif

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>
                <div class="mt-4">
                    {{ $detai->links() }}
                </div>

            </div>


            <!-- CHI TIẾT ĐỀ TÀI -->
            <div class="w-1/3">

                @include('Admin.theodoitiendo.chitiet')

            </div>

        </div>


    </div>



    <script>
        function xemChiTiet(id, row) {
            window.currentMaDeTai = id;

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
                            data.ganNhat.TienDoHienTai

                        document.getElementById("lanGanNhat").value =
                            data.ganNhat.TienDoHienTai

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
            let trangThai = document.getElementById("lanGanNhat").value
            let maDeTai = window.currentMaDeTai

            fetch("{{ route('admin.theodoitiendo.capnhat-trang-thai') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        MaDeTai: maDeTai,
                        TienDoHienTai: trangThai
                    })
                })
                .then(res => res.json())
                .then(data => {
<<<<<<< HEAD
                    if (data.success) {
                        alert("Cập nhật thành công!");
                        // đóng box
                        document.getElementById("chiTietBox").classList.add("hidden")
                        // reload lại trang
                        location.reload()
                    } else {
                        alert("Lỗi: " + (data.message || "Không thể cập nhật"))
                    }
                })
                .catch(err => {
                    console.error(err)
                    alert("Lỗi khi cập nhật!")
=======
                    alert("Cập nhật thành công!")
                    location.reload()
>>>>>>> 2ac26ef81abab5960f59367bd9801d1ce0e85d19
                })
        }
    </script>

</body>

</html>