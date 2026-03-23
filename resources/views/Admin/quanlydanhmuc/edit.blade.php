<div id="formEdit"
    class="hidden bg-[#EBF4F6] border border-black rounded-xl shadow-md w-full max-w-md mx-auto">

    <!-- Header -->
    <div class="border-b border-gray-200 px-6 py-4 font-semibold text-gray-700">
        Chỉnh sửa danh mục
    </div>

    <!-- Body -->
    <div class="px-6 py-6">

        <label class="block text-sm font-medium text-gray-600 mb-2">
            Loại đề tài
        </label>

        <form method="POST" id="formUpdate">
            @csrf
            @method('PUT')

            <input type="hidden" id="editId" name="id">

            <input
                id="editInput"
                name="ten_loai"
                type="text"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-6 focus:outline-none focus:ring-2 focus:ring-blue-400">

            <!-- Buttons -->
            <div class="flex justify-end gap-3">
                <button type="button"
                    onclick="huyEdit()"
                    class="px-5 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm">
                    Hủy
                </button>

                <button type="submit"
                    class="px-5 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-sm">
                    Cập nhật
                </button>
            </div>

        </form>

    </div>
</div>