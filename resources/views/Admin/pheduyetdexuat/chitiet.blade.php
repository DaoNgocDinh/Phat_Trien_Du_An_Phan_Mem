<div id="chiTietBox"
    class="bg-[#EBF4F6] rounded-lg p-10 hidden  border border-gray-300 w-[400px]">

    <h2 class="font-semibold border-b border-black pb-2 mb-6">
        Chi tiết đề xuất
    </h2>

    <h3 class="font-semibold mb-6">
        Xây dựng hệ thống quản lý học tập
    </h3>

    <p class="text-sm text-gray-600 mb-6">
        Nguyễn Văn C
    </p>

    <p class="text-sm mb-4">
        Nghiên cứu phát triển hệ thống hỗ trợ quản lý môn học,
        theo dõi kết quả học tập của sinh viên
    </p>

    <div class="bg-[#F3F4F4] p-2 rounded flex items-center justify-between mb-4">
        <span>Bai_nghien_cuu_khoa_hoc.pdf</span>
        <i class="fa fa-file"></i>
    </div>

    <div class="mt-6 mb-3">
        <span class="text-sm font-semibold">Trạng thái:</span>
        <span class="bg-orange-400 text-white text-xs px-3 py-1 rounded">
            Chờ duyệt
        </span>
    </div>

    <p class="text-sm mb-3">
        Vui lòng chọn 1 trong 3 lựa chọn
    </p>

    <div class="flex gap-3">

        <button onclick="openApprove()"
            class="bg-green-600 text-white px-4 py-1 rounded">
            Phê duyệt
        </button>

        <button onclick="openReject()" class="bg-red-500 text-white px-4 py-1 rounded">
            Từ chối
        </button>

        <button onclick="dongChiTiet()"
            class="bg-gray-300 px-4 py-1 rounded">
            Quay lại
        </button>

    </div>

</div>