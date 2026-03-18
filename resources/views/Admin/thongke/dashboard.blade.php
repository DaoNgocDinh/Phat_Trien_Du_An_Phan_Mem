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

    <div class="ml-64 mt-5 p-8">

        <div class="mb-10">
            <button class="ml-10 bg-[#1D546D] px-3 py-4 rounded-lg text-white font-semibold text-3xl shadow">
                Công bố khoa học
            </button>
        </div>


        <div class="flex justify-between items-center mb-6">

            <h1 class="text-3xl font-bold ml-10">
                Danh sách công bố khoa học
            </h1>

            <a href="{{ route('congbo.create') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">

                <i class="fa fa-plus mr-2"></i>
                Thêm công bố

            </a>

        </div>


        <table class="w-full bg-white rounded shadow overflow-hidden">

            <thead class="bg-gray-200 text-sm">

                <tr>

                    <th class="p-3 border">STT</th>
                    <th class="p-3 border">Tên công bố</th>
                    <th class="p-3 border">Tác giả</th>
                    <th class="p-3 border">Lĩnh vực</th>
                    <th class="p-3 border">Năm</th>
                    <th class="p-3 border">Trạng thái</th>
                    <th class="p-3 border">Hành động</th>

                </tr>

            </thead>


            <tbody class="text-center text-sm">

                @foreach ($congbo as $index => $item)

                    <tr class="border-t hover:bg-gray-50">

                        <td class="p-3 border">
                            {{ $congbo->firstItem() + $index }}
                        </td>

                        <td class="p-3 border">
                            {{ $item->TieuDe }}
                        </td>

                        <td class="p-3 border">
                            {{ $item->TacGia }}
                        </td>

                        <td class="p-3 border">
                            {{ $item->LinhVuc }}
                        </td>

                        <td class="p-3 border">
                            {{ $item->NamCongBo }}
                        </td>


                        <td class="p-3 font-semibold border">

                            @if ($item->TrangThai == 'DaDuyet')

                                <span class="text-green-500 text-xs font-bold">
                                    Đã duyệt
                                </span>

                            @elseif ($item->TrangThai == 'ChoDuyet')

                                <span class="text-yellow-500 text-xs font-bold">
                                    Chờ duyệt
                                </span>

                            @else

                                <span class="text-red-500 text-xs font-bold">
                                    Từ chối
                                </span>

                            @endif

                        </td>


                        <td class="p-3 space-x-2 border">

                            <a href="{{ route('congbo.edit', $item->id) }}"
                                class="bg-[#7AB2B2] text-white px-3 py-1 rounded text-xs">
                                Chỉnh sửa
                            </a>


                            <form action="{{ route('congbo.destroy', $item->id) }}" method="POST" class="inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="bg-[#C65E40] text-white px-3 py-1 rounded text-xs">
                                    Xóa
                                </button>

                            </form>


                            <a href="{{ route('congbo.show', $item->id) }}"
                                class="bg-[#1D546D] text-white px-3 py-1 rounded text-xs">

                                Xem chi tiết

                            </a>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>


        <div class="mt-6 flex justify-center">

            {{ $congbo->links() }}

        </div>


    </div>

</body>

</html>