<div id="reportModal"
class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden z-50 rounded-xl">

    <div class="bg-white w-[420px] rounded-md shadow-lg">

        <!-- Header -->
        <div class="flex justify-between items-center border-b p-3 bg-gray-200 rounded-md">
            <h2 class="font-semibold text-[#1D546D]">Xuất báo cáo</h2>

            <button onclick="closeModal()">
                <i class="fa fa-xmark"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="p-4 text-sm">

            <p class="mb-3">Chọn định dạng xuất file</p>

            <div class="flex gap-6 mb-5">
                <label class="flex items-center gap-2">
                    <input type="radio" name="type" checked>
                    PDF
                </label>

                <label class="flex items-center gap-2">
                    <input type="radio" name="type">
                    Excel
                </label>
            </div>

            <p class="text-center mb-6">
                Bạn có chắc chắn muốn xuất báo cáo <br>
                theo tiêu chí đã chọn?
            </p>

            <!-- BUTTON -->
            <div class="flex justify-center gap-4">

                <button class="bg-[#6FA9A9] px-4 py-2 rounded flex items-center gap-2">
                    <i class="fa fa-check"></i>
                    Xác nhận
                </button>

                <button onclick="closeModal()"
                class="bg-gray-300 px-4 py-2 rounded flex items-center gap-2">
                    <i class="fa fa-xmark"></i>
                    Hủy
                </button>

            </div>

        </div>

    </div>

</div>