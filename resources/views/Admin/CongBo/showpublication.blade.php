@extends('layout.admin')

@section('title', 'Chi tiết công bố')

@section('content')

    <div class="mx-10 mt-10">

        <!-- Header -->

        <div class="bg-[#1D546D] text-white text-xl px-6 py-3 rounded w-fit mb-8">
            Chi tiết công bố
        </div>

        <!-- Thông tin cơ bản -->

        <div class="bg-white shadow rounded-lg p-8 grid grid-cols-2 gap-6">

            <div>
                <b>Tên công bố:</b>
                <div class="mt-1 text-gray-700">
                    {{ $congbo->TenCongBo }}
                </div>
            </div>

            <div>
                <b>Loại công bố:</b>
                <div class="mt-1 text-gray-700">
                    {{ $congbo->LoaiCongBo }}
                </div>
            </div>

            <div>
                <b>Tác giả:</b>
                <div class="mt-1 text-gray-700">
                    {{ $congbo->TacGia }}
                </div>
            </div>

            <div>
                <b>Năm xuất bản:</b>
                <div class="mt-1 text-gray-700">
                    {{ $congbo->NamXuatBan }}
                </div>
            </div>

            <div>
                <b>Nơi công bố:</b>
                <div class="mt-1 text-gray-700">
                    {{ $congbo->NoiCongBo }}
                </div>
            </div>

            <div>
                <b>DOI:</b>
                <div class="mt-1 text-gray-700">
                    {{ $congbo->DOI ?? 'Không có' }}
                </div>
            </div>

        </div>

        <!-- Nội dung tóm tắt -->

        <div class="bg-white shadow rounded-lg p-8 mt-6">

            <b>Tóm tắt nội dung:</b>

            <div class="mt-3 text-gray-700 leading-relaxed">
                {{ $congbo->NoiDungTomTat }}
            </div>

        </div>

        <!-- File PDF -->

        @if($congbo->FilePDF)

            <div class="bg-white shadow rounded-lg p-8 mt-6">


                <b>File PDF: {{ $congbo->FilePDF }}</b>

                <div class="mt-3">
                    <a href="{{ asset('storage/' . $congbo->FilePDF) }}" target="_blank" class="text-blue-600 hover:underline">
                        Xem file PDF
                    </a>
                </div>


            </div>
        @endif

        <div class="flex justify-end gap-4 mt-10">

            <form method="POST" action="{{ route('admin.congbo.trangthai', $congbo->MaCongBo) }}">
                @csrf
                <input type="hidden" name="TrangThai" value="Đã Duyệt">

                <button class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Phê duyệt
                </button>
            </form>

            <form method="POST" action="{{ route('admin.congbo.trangthai', $congbo->MaCongBo) }}">
                @csrf
                <input type="hidden" name="TrangThai" value="Từ chối">

                <button class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">
                    Từ chối
                </button>
            </form>

            <a href="{{ route('admin.congbo.pheduyet.danhsach') }}"
                class="bg-gray-400 text-white px-6 py-2 rounded hover:bg-gray-500">
                Quay lại
            </a>

        </div>

    </div>

@endsection