@extends('layout.admin')

@section('title', 'Chỉnh sửa công bố khoa học')

@section('content')

    <form action="{{ route('admin.congbo.update', $congbo->MaCongBo) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="bg-[#1D546D] text-white font-semibold px-6 py-2 rounded w-fit mb-8 ml-20 mt-10">
        Công bố khoa học > Chỉnh sửa công bố
        </div>

        <div class="grid grid-cols-2 gap-12 mx-20">

            <!-- LEFT -->
            <div class="space-y-5">

                <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                    <label>Tên công bố</label>

                    <input type="text" name="TenCongBo" value="{{ old('TenCongBo', $congbo->TenCongBo) }}"
                        class="bg-gray-200 p-2 rounded w-full">

                </div>


                <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                    <label>Tác giả</label>

                    <input type="text" name="TacGia" value="{{ old('TacGia', $congbo->TacGia) }}"
                        class="bg-gray-200 p-2 rounded w-full">

                </div>


                <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                    <label>Loại</label>

                    <select name="LoaiCongBo" class="bg-gray-200 p-2 rounded w-full">

                        <option value="Bài báo" {{ $congbo->LoaiCongBo == 'Bài báo' ? 'selected' : '' }}>
                            Bài báo
                        </option>

                        <option value="Tạp chí" {{ $congbo->LoaiCongBo == 'Tạp chí' ? 'selected' : '' }}>
                            Tạp chí
                        </option>

                        <option value="Hội nghị" {{ $congbo->LoaiCongBo == 'Hội nghị' ? 'selected' : '' }}>
                            Hội nghị
                        </option>

                    </select>

                </div>


                <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                    <label>Năm xuất bản</label>

                    <input type="number" name="NamXuatBan" value="{{ old('NamXuatBan', $congbo->NamXuatBan) }}"
                        class="bg-gray-200 p-2 rounded w-full">

                </div>


                <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                    <label>Nơi công bố</label>

                    <input type="text" name="NoiCongBo" value="{{ old('NoiCongBo', $congbo->NoiCongBo) }}"
                        class="bg-gray-200 p-2 rounded w-full">

                </div>


                <div class="grid grid-cols-[160px_1fr] items-center gap-3">
                    <label>DOI / Link</label>

                    <input type="text" name="DOI" value="{{ old('DOI', $congbo->DOI) }}"
                        class="bg-gray-200 p-2 rounded w-full">

                </div>

            </div>

            <!-- RIGHT -->

            <div class="space-y-6">

                <div>
                    <label class="block mb-2">
                        Nội dung tóm tắt
                    </label>

                    <textarea name="NoiDungTomTat"
                        class="w-full bg-gray-200 p-3 rounded h-32 text-sm">{{ old('NoiDungTomTat', $congbo->NoiDungTomTat) }}</textarea>

                </div>


                <div>
                    <label class="block mb-2">
                        File PDF
                    </label>

                    <input type="file" name="FilePDF" class="w-full bg-gray-200 p-2 rounded">

                    @if($congbo->FilePDF)

                        <a href="{{ asset('storage/' . $congbo->FilePDF) }}" class="text-blue-600 text-sm mt-2 inline-block">

                            Xem file hiện tại

                        </a>

                    @endif

                </div>

            </div>

        </div>


        <div class="flex gap-4 mt-12 justify-end mx-20">

            <button type="submit" class="bg-[#1D8E8E] text-white px-5 py-2 rounded">

                <i class="fa fa-check"></i>
                Cập nhật

            </button>


            <a href="{{ route('admin.congbo.index') }}" class="bg-gray-400 text-black px-5 py-2 rounded">

                <i class="fa fa-xmark"></i>
                Hủy

            </a>

        </div>

    </form>

@endsection