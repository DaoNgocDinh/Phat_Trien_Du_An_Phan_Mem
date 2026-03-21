@extends('layout.giangvien')

@section('title', 'Đề tài nghiên cứu')

@section('content')
<div class="p-6" style="margin-top: 60px; margin-left: 260px;">
    <a href="{{ route('giangvien.detai.sugget') }}">
        <button type="submit" 
            class="text-xl flex gap-2 text-white bg-[#2c5d6e] px-4 py-2 rounded-md hover:bg-[#3f7b8e] hover:shadow-xl hover:border-gray-600">
            Đề xuất đề tài
        </button>
    </a>
</div>