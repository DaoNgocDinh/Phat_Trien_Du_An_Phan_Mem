<div id="chiTietBox" class="relative bg-[#F3F4F6] p-6 rounded-lg hidden">

    <!-- Tiêu đề -->
    <h2 class="font-semibold text-lg mb-4">
        Theo dõi tiến độ đề tài
    </h2>
    
    <!-- nút đóng -->
    <button onclick="dongChiTiet()"
        class="absolute top-3 right-3 text-gray-500 hover:text-red-500 text-xl">
        <i class="fa-solid fa-xmark"></i>
    </button>


    <!-- Tên đề tài -->
    <h3 id="tenDeTai" class="font-semibold mb-4">
        Chọn đề tài để xem chi tiết
    </h3>


    <!-- Progress -->
    <div class="flex items-center mb-4">

        <div class="w-full h-2 bg-gray-300 rounded relative">

            <div id="dot1"
                class="absolute left-[10%] top-[-6px] w-4 h-4 bg-gray-400 rounded-full"></div>

            <div id="dot2"
                class="absolute left-[50%] top-[-6px] w-4 h-4 bg-gray-400 rounded-full"></div>

            <div id="dot3"
                class="absolute right-[10%] top-[-6px] w-4 h-4 bg-gray-400 rounded-full"></div>

        </div>

    </div>


    <!-- Chủ nhiệm -->
    <div class="text-sm mb-3">
        <span id="chuNhiem"></span>
    </div>


    <!-- Thời gian -->
    <div class="text-sm mb-3">
        <span id="thoiGian"></span>
    </div>


    <!-- Trạng thái -->
    <div class="text-sm mb-4">
        <span id="trangThai" class="text-green-600"></span>
    </div>


    <!-- Dropdown cập nhật -->
    <div class="mt-2 text-sm">

        <label class="font-semibold">Cập nhật gần nhất:</label>

        <select id="lanGanNhat"
            class="border rounded px-2 py-1 ml-2 w-40 relative z-50">

            <option value="Đúng tiến độ">Đúng tiến độ</option>
            <option value="Trễ hạn">Trễ hạn</option>
            <option value="Hoàn thành">Hoàn thành</option>

        </select>

    </div>


    <!-- Lịch sử báo cáo -->
    <div class="mt-4">

        <h4 class="font-semibold mb-2">Lịch sử báo cáo</h4>

        <div id="lichSuBaoCao"></div>

    </div>


    <!-- nút cập nhật -->
    <button onclick="capNhatTienDo()"
        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mt-4">

        Cập nhật

    </button>

</div>