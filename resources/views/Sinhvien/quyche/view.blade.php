@extends('layout.sinhvien')

@section('title', 'Chi tiết quy chế')

@section('content')

<div class="p-6 mt-4">
    <div class="bg-[#1D546D] text-white text-xl font-semibold px-7 py-3 rounded-md w-96 mb-6">
        Quy chế > Chi tiết quy chế
    </div>

    <div class="w-full mx-auto bg-white p-8 rounded-2xl shadow-lg border border-gray-200">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">Thông tin quy chế</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Mã quy chế -->
            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Mã quy chế</label>
                <p class="w-full px-3 py-2 bg-gray-100 border border-gray-200 rounded-lg">
                    {{ $quyche->MaQuyChe }}
                </p>
            </div>

            <!-- Số hiệu -->
            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Số hiệu</label>
                <p class="w-full px-3 py-2 bg-gray-100 border border-gray-200 rounded-lg">
                    {{ $quyche->SoHieu }}
                </p>
            </div>

            <!-- Tên văn bản -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-600 mb-1">Tên văn bản</label>
                <p class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    {{ $quyche->TenVanBan }}
                </p>
            </div>

            <!-- Ngày ban hành -->
            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Ngày ban hành</label>
                <p class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    {{ \Carbon\Carbon::parse($quyche->NgayBanHanh)->format('d/m/Y') }}
                </p>
            </div>

            <!-- Cấp -->
            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Cấp</label>
                <p class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    {{ $quyche->LoaiVanBan }}
                </p>
            </div>
        </div>

        <!-- File PDF -->
        <div class="mt-8">
            <label class="block text-sm font-semibold text-gray-600 mb-2">File PDF</label>
            @if($quyche->FilePDF)
                <a href="{{ asset('uploads/pdf/' . $quyche->FilePDF) }}" target="_blank"
                    class="inline-block px-4 py-2 bg-[#1D546D] text-white rounded-lg shadow hover:bg-[#174454] transition">
                    Xem file PDF
                </a>
            @else
                <p class="text-gray-500">Chưa có file PDF</p>
            @endif
        </div>

        <!-- Button -->
        <div class="mt-8 flex justify-end">
            <button type="button" onclick="window.history.back()"
                class="text-gray-700 px-6 py-2 bg-gray-300 rounded-lg shadow hover:bg-gray-400 transition">
                Quay lại
            </button>
        </div>

    </div>
</div>

@endsection