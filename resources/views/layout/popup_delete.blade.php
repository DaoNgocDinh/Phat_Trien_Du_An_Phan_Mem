<div id="deleteModal"
class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden z-50">

    <div class="bg-white w-[420px] rounded-lg shadow-lg border">

        <!-- HEADER -->
        <div class="flex justify-between items-center border-b p-3 bg-[#e0dddd] rounded-lg">

            <h2 class="font-bold text-[#1D546D]">
                Xóa Công Bố
            </h2>

            <button onclick="closeDeleteModal()">
                <i class="fa fa-xmark text-xl"></i>
            </button>

        </div>

        <!-- BODY -->
        <div class="p-5 text-sm">

            <p class="mb-2 text-base">
                Bạn có chắc chắn muốn xóa công bố này?
            </p>

            <p class="text-gray-600 mb-6">
                Hành động này không thể hoàn tác.
            </p>

            <!-- BUTTON -->
            <div class="flex justify-center gap-6">

                <button
                class="bg-[#1D8E8E] text-white px-4 py-2 rounded flex items-center gap-2">
                    <i class="fa fa-check"></i>
                    Xác nhận
                </button>

                <button onclick="closeDeleteModal()"
                class="bg-gray-300 px-4 py-2 rounded flex items-center gap-2">
                    <i class="fa fa-xmark"></i>
                    Hủy
                </button>

            </div>

        </div>

    </div>

</div>