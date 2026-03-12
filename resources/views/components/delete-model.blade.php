<div id="deleteModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-lg shadow-lg w-[500px]">

        <div class="flex justify-between items-center border-b p-4">

            <h2 class="text-lg font-semibold text-gray-700">
                Xóa Công Bố
            </h2>

            <button onclick="closeDeleteModal()">
                <i class="fa fa-xmark text-xl"></i>
            </button>

        </div>


        <div class="p-6 text-gray-700">

            <p class="mb-3">
                Bạn có chắc chắn muốn xóa công bố này?
            </p>

            <p class="text-sm text-gray-500">
                Hành động này không thể hoàn tác.
            </p>

        </div>


        <div class="flex justify-end gap-3 p-4 border-t">

            <form id="deleteForm" method="POST">

                @csrf
                @method('DELETE')

                <button type="submit" class="bg-[#3A8F8F] text-white px-4 py-2 rounded">

                    ✔ Xác nhận

                </button>

            </form>

            <button onclick="closeDeleteModal()" class="bg-gray-300 px-4 py-2 rounded">

                ✖ Hủy

            </button>

        </div>

    </div>

</div>