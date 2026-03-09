<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Công bố khoa học</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-100">

    @include('layout.navbar')
    @include('layout.sidebar')
    @include('layout.popup_delete')

    <!-- Content -->
    <div class="ml-64 mt-5 p-8">
        <div class="mb-10">
            <button class="ml-10 bg-[#1D546D] px-3 py-4 rounded-lg text-white font-semibold text-3xl shadow">Công bố
                khóa học</button>
        </div>

        <div class="flex justify-between items-center mb-6">

            <h1 class="text-3xl font-bold ml-10">
                Danh sách công bố khoa học
            </h1>

            <button class="bg-[#3498DB] hover:bg-[#2980B9] text-white px-4 py-2 rounded-md  shadow">
                <i class="fa-regular fa-circle-check mr-3"></i>
                Phê duyệt công bố
            </button>

        </div>

        <table class="w-full bg-white rounded shadow overflow-hidden">

            <thead class="bg-gray-200 text-sm">

                <tr>
                    <th class="p-3">STT</th>
                    <th class="p-3">Tên công bố</th>
                    <th class="p-3">Tác giả</th>
                    <th class="p-3">Lĩnh vực</th>
                    <th class="p-3">Năm</th>
                    <th class="p-3">Trạng thái</th>
                    <th class="p-3">Hành động</th>
                </tr>

            </thead>

            <tbody class="text-center text-sm">

                @for ($i = 1; $i <= 16; $i++)

                    <tr class="border-t hover:bg-gray-50">

                        <td class="p-3">{{ $i }}</td>
                        <td class="p-3">Nghiên cứu AI</td>
                        <td class="p-3">Nguyễn Văn A</td>
                        <td class="p-3">CNTT</td>
                        <td class="p-3">2024</td>

                        <td class="p-3 font-semibold">
                            @php
                                $status = ['Từ chối', 'Chờ duyệt', 'Đã duyệt'][rand(0, 2)];
                            @endphp

                            @if ($status == 'Đã duyệt')
                                <span class=" text-[#00FF66] px-2 py-1 rounded text-xs">
                                    Đã duyệt
                                </span>

                            @elseif ($status == 'Chờ duyệt')
                                <span class=" text-[#C8C210] px-2 py-1 rounded text-xs">
                                    Chờ duyệt
                                </span>

                            @else
                                <span class=" text-[#FF4A4A] px-2 py-1 rounded text-xs">
                                    Từ chối
                                </span>
                            @endif
                        </td>

                        <td class="p-3 space-x-2">

                            <a href="#" class="bg-[#7AB2B2] hover:bg-[#7AB2B2] text-white px-3 py-1 rounded text-xs">
                                Chỉnh sửa
                            </a>

                            <a onclick="openDeleteModal()"
                                class="bg-[#C65E40] hover:bg-[#b04f34] text-white px-3 py-1 rounded text-xs cursor-pointer">
                                Xóa
                            </a>
                            <a href="#" class="bg-[#1D546D] hover:bg-[#1D546D] text-white px-3 py-1 rounded text-xs">
                                Xem chi tiết
                            </a>

                        </td>

                    </tr>

                @endfor

            </tbody>

        </table>

    </div>

</body>
<script>

function openDeleteModal(){
document.getElementById("deleteModal").classList.remove("hidden")
}

function closeDeleteModal(){
document.getElementById("deleteModal").classList.add("hidden")
}

</script>

</html>