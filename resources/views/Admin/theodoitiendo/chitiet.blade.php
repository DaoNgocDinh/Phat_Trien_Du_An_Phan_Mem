<div id="chiTietBox" class=" relative bg-[#F3F4F6] p-6 rounded-lg hidden">
    <!-- Tiêu đề -->
    <h2 class="font-semibold text-lg mb-4">
        Theo dõi tiến độ đề tài
    </h2>
    <button onclick="dongChiTiet()"
        class="absolute top-3 right-3 text-gray-500 hover:text-red-500 text-xl">
        <i class="fa-solid fa-xmark"></i>
    </button>
    <!-- Tên đề tài -->
    <h3 class="font-semibold mb-4">
        Hệ thống học tập thông minh
    </h3>

    <!-- Progress -->
    <div class="flex items-center justify-between mb-2">

        <div class="w-full flex items-center">

            <div class="w-1/3 text-center text-sm">
                Chờ phê duyệt
            </div>

            <div class="w-1/3 text-center text-sm font-semibold">
                Đang thực hiện
            </div>

            <div class="w-1/3 text-center text-sm">
            </div>

        </div>

    </div>

    <div class="flex items-center mb-4">

        <div class="w-full h-2 bg-gray-300 rounded relative">

            <div class="absolute left-[30%] top-[-6px] w-4 h-4 bg-green-500 rounded-full"></div>

            <div class="absolute left-[65%] top-[-6px] w-4 h-4 bg-green-500 rounded-full"></div>

            <div class="absolute right-[5%] top-[-6px] w-4 h-4 bg-gray-400 rounded-full"></div>

        </div>

    </div>

    <!-- Thông tin -->
    <div class="text-sm mb-3">
        <span class="font-semibold">Chủ nhiệm :</span> Trần Văn B
    </div>

    <div class="text-sm mb-3">
        <span class="font-semibold">Thời gian thực hiện :</span>
        21/12/2025 - 4/3/2026
    </div>

    <div class="text-sm mb-4">
        <span class="font-semibold">Trạng thái :</span>
        <span class="text-green-600">Đúng tiến độ</span>
    </div>

    <!-- Dropdown cập nhật -->
    <div class="mb-5">
        <label class="text-sm font-semibold block mb-1">
            Cập nhật gần nhất
        </label>

        <select class="border px-3 py-2 rounded w-full">
            <option>Đúng tiến độ</option>
            <option>Trễ hạn</option>
            <option>Hoàn thành</option>
        </select>
    </div>

    <!-- Lịch sử báo cáo -->
    <h3 class="font-semibold mb-3">
        Lịch sử báo cáo
    </h3>

    <!-- Báo cáo 1 -->
    <div class="border rounded-lg p-3 mb-3 bg-white">

        <div class="font-semibold text-sm mb-1">
            Lần cập nhật 02
        </div>

        <div class="text-sm mb-1">
            Thời gian : 27/2/2026
        </div>

        <div class="flex justify-between items-center">

            <div class="flex items-center gap-2 text-sm">

                <i class="fa-solid fa-file-pdf text-red-500"></i>

                Báo cáo tiến độ lần 2.pdf

            </div>

            <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                Xem báo cáo
            </button>

        </div>

    </div>

    <!-- Báo cáo 2 -->
    <div class="border rounded-lg p-3 bg-white">

        <div class="font-semibold text-sm mb-1">
            Lần cập nhật 01
        </div>

        <div class="text-sm mb-1">
            Thời gian : 30/12/2025
        </div>

        <div class="flex justify-between items-center">

            <div class="flex items-center gap-2 text-sm">

                <i class="fa-solid fa-file-pdf text-red-500"></i>

                Báo cáo tiến độ lần 1.pdf

            </div>

            <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                Xem báo cáo
            </button>

        </div>
        

    </div>
    <button onclick="capNhatTienDo()"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mt-4">
            Cập nhật
        </button>


</div>