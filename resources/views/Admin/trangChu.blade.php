@extends('layout.admin')

@section('title', 'Trang chủ Quản trị')

@section('content')
    <div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
        <!-- Lưới thẻ chức năng - giống thiết kế: 4 cột desktop, icon placeholder lớn -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 md:gap-6">
            
            <!-- Thẻ 1: Đề tài nghiên cứu -->
            <a href="#" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="60" height="60" rx="8" stroke="currentColor" stroke-width="6"/>
                        <path d="M30 50 Q40 30 50 50 T70 50" stroke="currentColor" stroke-width="6" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Đề tài nghiên cứu</h3>
            </a>

            <!-- Thẻ 2: Quy chế khoa học -->
            <a href="#" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="60" height="60" rx="8" stroke="currentColor" stroke-width="6"/>
                        <path d="M30 40 H70 M30 50 H70 M30 60 H70" stroke="currentColor" stroke-width="6" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Quy chế khoa học</h3>
            </a>

            <!-- Thẻ 3: Công bố khoa học -->
            <a href="#" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="60" height="60" rx="8" stroke="currentColor" stroke-width="6"/>
                        <path d="M30 30 Q50 70 70 30" stroke="currentColor" stroke-width="6" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Công bố khoa học</h3>
            </a>

            <!-- Thẻ 4: Hoạt động khoa học -->
            <a href="#" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="60" height="60" rx="8" stroke="currentColor" stroke-width="6"/>
                        <path d="M30 50 L50 30 L70 50 L50 70 Z" stroke="currentColor" stroke-width="6" fill="none"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Hoạt động khoa học</h3>
            </a>

            <!-- Sự kiện -->
            <a href="#" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="60" height="60" rx="8" stroke="currentColor" stroke-width="6"/>
                        <circle cx="50" cy="50" r="15" stroke="currentColor" stroke-width="6"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Sự kiện</h3>
            </a>

            <!-- Liên hệ -->
            <a href="#" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="60" height="60" rx="8" stroke="currentColor" stroke-width="6"/>
                        <path d="M30 40 L50 60 L70 40" stroke="currentColor" stroke-width="6" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Liên hệ</h3>
            </a>

            <!-- Công bố -->
            <a href="#" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-20 h-20 md:w-24 md:h-24 mx-auto text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path d="M18.458 3.11A1 1 0 0 1 19 4v16a1 1 0 0 1-1.581.814L12 16.944V7.056l5.419-3.87a1 1 0 0 1 1.039-.076ZM22 12c0 1.48-.804 2.773-2 3.465v-6.93c1.196.692 2 1.984 2 3.465ZM10 8H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6V8Zm0 9H5v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3Z" />
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Công bố</h3>
            </a>

            <!-- Phê duyệt đề xuất -->
            <a href="#" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="60" height="60" rx="8" stroke="currentColor" stroke-width="6"/>
                        <path d="M40 50 L50 60 L70 40" stroke="currentColor" stroke-width="6" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Phê duyệt đề xuất</h3>
            </a>

            <!-- Quản lý người dùng -->
            <a href="#" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="60" height="60" rx="8" stroke="currentColor" stroke-width="6"/>
                        <circle cx="50" cy="40" r="12" stroke="currentColor" stroke-width="6"/>
                        <path d="M35 65 Q50 80 65 65" stroke="currentColor" stroke-width="6"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Quản lý người dùng</h3>
            </a>
        </div>
    </div>
@endsection