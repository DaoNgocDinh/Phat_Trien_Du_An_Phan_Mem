@extends('layout.giangVien')

@section('title', 'Quy chế khoa học')

@section('content')

<div class="p-6" style="margin-top: 60px; margin-left: 260px;">

    <form method="GET" action="{{ request()->url() }}" class="max-w-md flex items-center">

        <label for="search" class="sr-only">Search</label>

        <div class="relative w-full">

            <input type="search" name="search" id="search" value="{{ request('search') }}" placeholder="Tìm tên quy chế"
                class="w-full bg-gray-200 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black" />

        </div>

    </form>
    <div class="mt-4 relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead
                class="bg-[#EBF4F6] text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        STT
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Tên quy chế
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Ngày ban hành
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Cấp
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Hành động
                    </th>
                </tr>
            </thead>
            <tbody id="quycheTableBody" class="divide-y">
                @foreach($quyches as $quyche)
                    <tr class="bg-neutral-primary border-b border-default">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{ $quyche->SoHieu }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $quyche->TenVanBan }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $quyche->NgayBanHanh }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $quyche->LoaiVanBan }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('giangvien.quyChe.view', $quyche->MaQuyChe) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-8 p-1 rounded-full hover:bg-gray-200 text-blue-500 cursor-pointer">
                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                        <path fill-rule="evenodd"
                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="{{ route('download.pdf', $quyche->FilePDF) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="size-8 p-1 rounded-full hover:bg-gray-200 text-green-500 cursor-pointer">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
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

        <p class="text-sm text-[#7AB2B2]">Hiển thị 10 quy chế</p>
        <div class="flex items-center gap-2">
            <a href="{{ $quyches->previousPageUrl() }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor"
                    class="hover:bg-[#2c5d6e] hover:shadow-xl bg-[#7AB2B2] text-white size-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </a>

            <div class="bg-[#7AB2B2] text-white w-7 h-7 flex items-center justify-center border border-white border-2">
                {{ $quyches->currentPage() }}
            </div>
            <a href="{{ $quyches->nextPageUrl() }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor"
                    class="hover:bg-[#2c5d6e] hover:shadow-xl bg-[#7AB2B2] text-white size-6 cursor-pointer rotate-180">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        </div>
    </div>
</div>

<script>
    let timeout;

    document.getElementById('search').addEventListener('input', function (e) {
        clearTimeout(timeout);

        const keyword = e.target.value.toLowerCase();

        timeout = setTimeout(() => {
            document.querySelectorAll('#quycheTableBody tr').forEach(row => {

                const nameCell = row.querySelector('td:nth-child(2)');
                if (!nameCell) return;

                const text = nameCell.textContent.toLowerCase();

                row.style.display = text.includes(keyword) ? '' : 'none';
            });
        }, 200);
    });
</script>