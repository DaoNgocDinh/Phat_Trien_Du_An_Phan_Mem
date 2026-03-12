<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <!-- Form -->
    <div id="popupForm" class="hidden bg-[#EBF4F6] border border-black rounded-lg w-full h-full">

        <!-- Header -->
        <div class="border-b border-black px-4 py-2 font-semibold text-black">
            Thêm danh mục mới
        </div>

        <!-- Body -->
        <div class="p-4">

            <label class="block text-sm text-black mb-2">
                Loại đề tài
            </label>

            <input
                id="tenDanhMuc"
                type="text"
                placeholder="Nhập thông tin ..."
                class="bg-[#F3F4F4] w-full border border-gray-400 rounded px-3 py-1 mb-6 focus:outline-none focus:ring-1 focus:ring-blue-400">

            <!-- Buttons -->
            <div class="flex justify-center gap-4">

                <button onclick="luuDanhMuc()" class=" bg-[#1D546D] text-white px-6 py-1 rounded hover:bg-[#254b59]">
                    Lưu
                </button>
                <button onclick="huyForm()" class="bg-gray-300 text-gray-700 px-6 py-1 rounded hover:bg-gray-400">
                    Hủy
                </button>
            </div>

        </div>

    </div>

    <div id="popupSuccess"
        class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center">

        <div class="bg-white rounded-lg p-6 text-center shadow-lg animate-fadeIn">

            <div class="text-green-500 text-5xl mb-3">
                <i class="fa fa-check-circle"></i>
            </div>

            <p class="text-lg font-semibold mb-4">
                Thêm danh mục thành công
            </p>

            <button onclick="dongPopup()"
                class="bg-[#1D546D] text-white px-6 py-2 rounded hover:bg-[#254b59]">
                OK
            </button>

        </div>

    </div>

    </div>
</body>

</html>