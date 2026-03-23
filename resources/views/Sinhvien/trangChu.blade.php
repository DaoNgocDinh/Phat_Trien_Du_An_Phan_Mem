@extends('layout.sinhVien') 

@section('title', 'Trang chủ')

@section('content')
    <div class="bg-gray-50 min-h-screen">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 md:gap-6">
            
            <a href="{{ route('guest.deTai') }}" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4 group-hover:text-[#1D546D] transition-colors">
                    <i class="fas fa-book-reader"></i>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D] transition-colors">Đề tài nghiên cứu</h3>
            </a>

            <a href="{{ route('guest.quyChe.index') }}" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4 group-hover:text-[#1D546D] transition-colors">
                    <i class="fas fa-gavel"></i>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D] transition-colors">Quy chế khoa học</h3>
            </a>

            <a href="{{ route('guest.congBo') ?? '#' }}" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4 group-hover:text-[#1D546D] transition-colors">
                    <i class="fas fa-file-contract"></i>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D] transition-colors">Công bố khoa học</h3>
            </a>

            <a href="{{ route('guest.suKien') }}" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4 group-hover:text-[#1D546D] transition-colors">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D] transition-colors">Sự kiện</h3>
            </a>

            <a href="{{ route('guest.lienhe') }}" class="group bg-white rounded-xl shadow hover:shadow-2xl hover:scale-105 transition-all duration-300 flex flex-col items-center justify-center aspect-square p-6 text-center border border-gray-200">
                <div class="text-7xl md:text-8xl text-gray-700 mb-4 group-hover:text-[#1D546D] transition-colors">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 group-hover:text-[#1D546D] transition-colors">Liên hệ</h3>
            </a>

        </div>
    </div>
@endsection