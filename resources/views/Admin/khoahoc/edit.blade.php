
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa công bố</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-100">

@include('layout.navbar')
@include('layout.sidebar')

<div class="ml-64 mt-6 p-8">

    <!-- TITLE -->
    <div class="bg-[#1D546D] text-white font-semibold px-6 py-2 rounded w-fit mb-8 ml-20">
        Công bố khoa học > Chỉnh sửa công bố
    </div>

    <!-- FORM -->
    <form>

        <div class="grid grid-cols-2 gap-12">

            <!-- LEFT -->
            <div class="space-y-5 ml-20">

                <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                    <label class="text-sm">Tên công bố</label>
                    <input type="text"
                        value="Ứng dụng AI trong giáo dục"
                        class="bg-gray-200 p-2 rounded w-full">
                </div>

                <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                    <label class="text-sm">Tên tác giả</label>
                    <input type="text"
                        value="Nguyễn Việt Anh"
                        class="bg-gray-200 p-2 rounded w-full">
                </div>

                <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                    <label class="text-sm">Loại</label>
                    <select class="bg-gray-200 p-2 rounded w-full">
                        <option>Bài báo</option>
                    </select>
                </div>

                <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                    <label class="text-sm">Năm xuất bản</label>
                    <input type="text"
                        value="2017"
                        class="bg-gray-200 p-2 rounded w-full">
                </div>

                <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                    <label class="text-sm">Nơi công bố</label>
                    <input type="text"
                        placeholder="Vui lòng nhập đầy đủ thông tin"
                        class="bg-gray-200 p-2 rounded w-full text-red-500">
                </div>

                <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                    <label class="text-sm">DOI/link</label>
                    <input type="text"
                        value="https://doi.org/10.5678/jdi.2023.089"
                        class="bg-gray-200 p-2 rounded w-full">
                </div>

                <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                    <label class="text-sm">Trạng thái</label>
                    <span class="bg-[#FF4A4A] text-white px-3 py-1 rounded text-sm w-fit">
                        Từ chối
                    </span>
                </div>

            </div>

            <!-- RIGHT -->
            <div class="space-y-6 mr-20">

                <div>
                    <label class="block text-sm mb-2">Nội dung tóm tắt</label>

                    <textarea
                        class="w-full bg-gray-200 p-3 rounded h-32 text-sm">
Nghiên cứu này đề xuất mô hình ứng dụng trí tuệ nhân tạo trong việc phân tích dữ liệu học tập của sinh viên nhằm nâng cao hiệu quả giảng dạy...
                    </textarea>
                </div>

                <div>
                    <label class="block text-sm mb-2">
                        File chứng minh (word,pdf,..)
                    </label>

                    <input type="file"
                        class="w-full bg-gray-200 p-2 rounded">
                </div>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="flex gap-4 mt-12 justify-end mr-20">

            <button
                class="bg-[#1D8E8E] text-black px-5 py-2 rounded flex items-center gap-2 hover:bg-[#166b6b]">
                <i class="fa fa-check"></i>
                Cập nhật
            </button>

            <button
                class="bg-gray-400 text-black px-5 py-2 rounded flex items-center gap-2 hover:bg-gray-500">
                <i class="fa fa-xmark"></i>
                Hủy
            </button>

        </div>

    </form>

</div>

</body>
</html>
```
