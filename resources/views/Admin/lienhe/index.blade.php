@extends('layout.admin')

@section('title', 'Danh sách liên hệ')

@section('content')

<div class="p-6" style="margin-top: 60px; margin-left: 260px;">
    <div class="mt-4 relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead
                class="bg-[#EBF4F6] text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Họ tên
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Chủ đề
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Nội dung
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Trạng thái
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Hành động
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach($lienhes as $lienhe)
                    <tr class="bg-neutral-primary border-b border-default">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{ $lienhe->HoTen }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $lienhe->Email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $lienhe->ChuDe }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Illuminate\Support\Str::limit($lienhe->NoiDung, 20) }}
                        </td>
                        <td class="px-6 py-4">
                            @if($lienhe->TrangThai == 'Chưa đọc')
                                <span class="px-3 py-1 text-xs font-semibold text-white bg-red-500 rounded-full">
                                    Chưa đọc
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-full">
                                    Đã đọc
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.lienhe.detail', $lienhe->MaLienHe) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-8 p-1 rounded-full hover:bg-gray-200 text-blue-500 cursor-pointer">
                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                        <path fill-rule="evenodd"
                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6 flex items-center justify-between w-full">

        <p class="text-sm text-[#7AB2B2]">Hiển thị 10 liên hệ</p>
        <div class="flex items-center gap-2">
            <a href="{{ $lienhes->previousPageUrl() }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor"
                    class="hover:bg-[#2c5d6e] hover:shadow-xl bg-[#7AB2B2] text-white size-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </a>

            <div class="bg-[#7AB2B2] text-white w-7 h-7 flex items-center justify-center border border-white border-2">
                {{ $lienhes->currentPage() }}
            </div>
            <a href="{{ $lienhes->nextPageUrl() }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor"
                    class="hover:bg-[#2c5d6e] hover:shadow-xl bg-[#7AB2B2] text-white size-6 cursor-pointer rotate-180">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        </div>
    </div>
</div>