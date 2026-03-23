<form action="{{ route('danhmuc.store') }}" method="POST">
    @csrf

    <div id="popupForm" class="hidden bg-[#EBF4F6] border border-black rounded-lg w-full h-full">

        <div class="border-b border-black px-4 py-2 font-semibold text-black">
            Thêm danh mục mới
        </div>

        <div class="p-4">

            <label class="block text-sm text-black mb-2">
                Loại đề tài
            </label>

            <input
                id="tenDanhMuc"
                name="ten_loai"
                type="text"
                placeholder="Nhập thông tin ..."
                class="bg-[#F3F4F4] w-full border border-gray-400 rounded px-3 py-1 mb-6">

            <div class="flex justify-center gap-4">

                <button type="submit"
                    class="bg-[#1D546D] text-white px-6 py-1 rounded">
                    Lưu
                </button>

                <button type="button" onclick="huyForm()"
                    class="bg-gray-300 px-6 py-1 rounded">
                    Hủy
                </button>

            </div>

        </div>

    </div>
</form>