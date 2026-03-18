@extends('layout.admin')

@section('title', 'Đăng tải quy chế mới')

@section('content')


<div class="p-6" style="margin-top: 60px; margin-left: 260px;">

    <form method="POST" action="{{ route('admin.quyChe.store') }}" enctype="multipart/form-data" class="max-w-md">
        @csrf

        <div class="mb-4">
            <label for="SoHieu" class="block text-gray-700 font-medium mb-2">Số hiệu</label>
            <input type="text" name="SoHieu" id="SoHieu" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="TenVanBan" class="block text-gray-700 font-medium mb-2">Tên văn bản</label>
            <input type="text" name="TenVanBan" id="TenVanBan" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="NgayBanHanh" class="block text-gray-700 font-medium mb-2">Ngày ban hành</label>
            <input type="date" name="NgayBanHanh" id="NgayBanHanh" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="LoaiVanBan" class="block text-gray-700 font-medium mb-2">Cấp văn bản</label>
            <select name="LoaiVanBan" id="LoaiVanBan" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Chọn cấp văn bản --</option>
                <option value="Trường">Trường</option>
                <option value="Khoa">Khoa</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="file_path" class="block text-gray-700 font