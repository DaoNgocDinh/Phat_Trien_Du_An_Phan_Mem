<?php
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa danh mục</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>


<body>
    <div id="formEdit"
        class="hidden bg-[#EBF4F6] border border-black rounded-lg w-1/3 h-fit">

        <!-- header -->

        <div class="border-b border-black px-4 py-2 font-semibold">

            Chỉnh sửa danh mục

        </div>


        <div class="p-4">

            <label class="block text-sm mb-2">

                Loại đề tài

            </label>

            <input
                id="editInput"
                type="text"
                class="bg-white w-full border border-gray-400 rounded px-3 py-2 mb-6">


            <div class="flex justify-center gap-4">

                <button
                    onclick="capNhatDanhMuc()"
                    class="bg-[#82b1ad] px-6 py-1 rounded">

                    Cập nhật

                </button>

                <button
                    onclick="huyEdit()"
                    class="bg-gray-300 px-6 py-1 rounded">

                    Hủy

                </button>

            </div>

        </div>

    </div>
</body>

</html>