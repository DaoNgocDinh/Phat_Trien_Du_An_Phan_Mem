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
    @include('layout.sidebarAdmin')

    <div class="ml-64 pt-20 pl-10 pr-10">

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

                <!-- <h2 class="font-semibold mb-4">
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
                </div> -->


                <!-- TABLE -->

                <h2 class="font-semibold mb-10 border-b border-gray-300 pb-2">
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

                        @forelse($detais as $index => $dt)
                        <tr class="border-b hover:bg-gray-50 transition-colors">

                            <td class="py-4">{{ $detais->firstItem() + $index }}</td>
                            <td class="py-4"> {{ $dt->TenDeTai }}</td>
                            <td class="py-4">{{ $dt->ChuNhiem }}</td>
                            <td class="py-4">{{ $dt->LoaiDeTai }}</td>

                            <td>
                                <span class="bg-orange-400 text-white px-2 py-1 rounded text-xs">
                                    {{ $dt->TrangThai }}
                                </span>
                            </td>

                            <td class="py-4">
                                <button onclick="xemChiTiet({{ $dt->MaSo }}, this)"
                                    class="bg-[#2f5d6e] text-white px-4 py-1 rounded text-sm">
                                    Xem
                                </button>
                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500 italic">
                                Không có đề xuất nào cần phê duyệt
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>


                <!-- PAGINATIO: phân trang -->
                <div class="mt-6">
                    {{ $detais->links() }}
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

                    <button onclick="confirmApprove()"
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

                <!-- 🔥 THÊM TEXTAREA -->
                <textarea id="lyDoTuChoi"
                    placeholder="Nhập lý do từ chối..."
                    class="w-full border rounded p-2 mb-4 text-sm"></textarea>

                <div class="flex justify-center gap-4">

                    <button onclick="confirmReject()"
                        class="bg-[#1D8E8E] text-white px-4 py-2 rounded">
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
        let currentId = null;

        function xemChiTiet(id, btn) {

            currentId = id;

            let rows = document.querySelectorAll("tbody tr");
            rows.forEach(r => r.classList.remove("bg-[#E6E6E6]"));

            btn.closest("tr").classList.add("bg-[#E6E6E6]");

            fetch('/admin/pheduyet/' + id)
                .then(res => res.json())
                .then(data => {

                    document.getElementById("chiTietBox").classList.remove("hidden");

                    document.getElementById("ten").innerText = data.TenDeTai;
                    document.getElementById("nguoi").innerText = data.ChuNhiem;
                    document.getElementById("mota").innerText = data.NoiDungChinh;
                    document.getElementById("file").innerText = data.FileSanPham ?? 'Không có file';
                    document.getElementById("trangthai").innerText = data.TrangThai;

                    if (data.TrangThai === 'TuChoi') {
                        document.getElementById("lydo").innerText = "Lý do: " + data.LyDoTuChoi;
                    } else {
                        document.getElementById("lydo").innerText = "";
                    }
                });
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

        function confirmApprove() {

            fetch("{{ url('/admin/pheduyet') }}/" + currentId + "/approve", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert("Đã phê duyệt!");
                        location.reload();
                    } else {
                        alert("Lỗi!");
                    }
                });

        }

        function confirmReject() {

            let lydo = document.getElementById("lyDoTuChoi").value;

            // ❗ validate
            if (!lydo || lydo.trim() === "") {
                alert("Vui lòng nhập lý do từ chối!");
                return;
            }

            fetch("{{ url('/admin/pheduyet') }}/" + currentId + "/reject", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        LyDoTuChoi: lydo
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert("Đã từ chối!");

                        // reset input
                        document.getElementById("lyDoTuChoi").value = "";

                        closeReject();
                        location.reload();
                    } else {
                        alert("Có lỗi xảy ra!");
                    }
                });
        }
    </script>


</body>

</html>