@extends('layout.admin')

@section('title', 'Chi tiết liên hệ')

@section('content')
<div class="p-6">

    <div class="w-full mx-auto bg-white rounded-xl shadow-lg p-8">

        <!-- Title -->
        <h2 class="text-2xl font-semibold text-center mb-6 text-gray-700">
            Chi tiết liên hệ
        </h2>

        <!-- Họ tên -->
        <div class="mb-4">
            <label class="block mb-1 font-medium text-gray-600">Họ và tên</label>
            <div class="w-full px-4 py-2 border rounded-lg bg-gray-100">
                {{ $lienhe->HoTen }}
            </div>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block mb-1 font-medium text-gray-600">Email</label>
            <div class="w-full px-4 py-2 border rounded-lg bg-gray-100">
                {{ $lienhe->Email }}
            </div>
        </div>

        <!-- Chủ đề -->
        <div class="mb-4">
            <label class="block mb-1 font-medium text-gray-600">Chủ đề</label>
            <div class="w-full px-4 py-2 border rounded-lg bg-gray-100">
                {{ $lienhe->ChuDe }}
            </div>
        </div>

        <!-- Nội dung -->
        <div class="mb-6">
            <label class="block mb-1 font-medium text-gray-600">Nội dung</label>
            <div class="w-full px-4 py-3 border rounded-lg bg-gray-100 whitespace-pre-line">
                {{ $lienhe->NoiDung }}
            </div>
        </div>

        <!-- Button -->
        <div class="flex justify-center">
            <a href="{{ url()->previous() }}"
               class="px-6 py-2 bg-[#2c5d6e] text-white rounded-lg hover:bg-[#3f7b8e] transition shadow">
                ← Quay lại
            </a>
        </div>

    </div>
</div>
@endsection