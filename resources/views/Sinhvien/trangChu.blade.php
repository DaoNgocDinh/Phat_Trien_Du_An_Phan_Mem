@extends('layout.sinhVien') 

@section('title', 'Trang chủ Sinh viên')

@section('content')
    <div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 md:gap-6">
            
            <!-- 1. Đề tài nghiên cứu -->
            <a {{-- href="{{ route('student.de-tai') }}" --}} class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="60" height="60" rx="8" stroke="currentColor" stroke-width="6"/>
                        <path d="M30 50 Q40 30 50 50 T70 50" stroke="currentColor" stroke-width="6" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Đề tài nghiên cứu</h3>
            </a>

            <!-- 2. Quy chế khoa học -->
            <a href="#" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="60" height="60" rx="8" stroke="currentColor" stroke-width="6"/>
                        <path d="M30 40 H70 M30 50 H70 M30 60 H70" stroke="currentColor" stroke-width="6" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Quy chế khoa học</h3>
            </a>

            <!-- 3. Công bố khoa học -->
            <a href="#" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="60" height="60" rx="8" stroke="currentColor" stroke-width="6"/>
                        <path d="M30 30 Q50 70 70 30" stroke="currentColor" stroke-width="6" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Công bố khoa học</h3>
            </a>

            <!-- 4. Hoạt động khoa học -->
            <a href="#" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="60" height="60" rx="8" stroke="currentColor" stroke-width="6"/>
                        <path d="M30 50 L50 30 L70 50 L50 70 Z" stroke="currentColor" stroke-width="6" fill="none"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Hoạt động khoa học</h3>
            </a>

            <!-- 5. Sự kiện -->
            <a href="#" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="60" height="60" rx="8" stroke="currentColor" stroke-width="6"/>
                        <circle cx="50" cy="50" r="15" stroke="currentColor" stroke-width="6"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Sự kiện</h3>
            </a>

            <!-- 6. Liên hệ -->
            <a href="#" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="60" height="60" rx="8" stroke="currentColor" stroke-width="6"/>
                        <path d="M30 40 L50 60 L70 40" stroke="currentColor" stroke-width="6" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Liên hệ</h3>
            </a>

            <!-- 7. Thông tin cá nhân -->
            <a href="#" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4">
                    <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="20" width="60" height="60" rx="8" stroke="currentColor" stroke-width="6"/>
                        <circle cx="50" cy="35" r="15" stroke="currentColor" stroke-width="6"/>
                        <path d="M30 65 Q50 80 70 65" stroke="currentColor" stroke-width="6"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D]">Thông tin cá nhân</h3>
            </a>

        </div>
    </div>
@endsection