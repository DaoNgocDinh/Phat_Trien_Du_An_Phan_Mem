@extends('layout.sinhVien')

@section('title', 'Liên hệ với Ban Quản trị')

@section('content')
    <div class="p-4 md:p-6 lg:p-8 bg-gray-50 min-h-screen">
        <div class="max-w-[1400px] mx-auto">
            
            <div class="mb-8 flex flex-col items-center text-center">
                <h2 class="text-3xl font-bold text-[#1D546D] mb-3">
                    Gửi yêu cầu liên hệ
                </h2>
                <p class="text-gray-600 max-w-xl">
                    Nếu bạn có bất kỳ thắc mắc, góp ý hoặc cần hỗ trợ về các hoạt động nghiên cứu khoa học, vui lòng để lại lời nhắn cho hệ thống.
                </p>
            </div>

            <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg border border-gray-100 p-6 md:p-10">
                
                @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-4 rounded-r-lg mb-8 flex items-center gap-3 shadow-sm">
                        <i class="fas fa-check-circle text-xl"></i>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('guest.lienhe.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">Họ và tên <span class="text-red-500">*</span></label>
                            <input type="text" name="name" required placeholder="Nhập họ và tên..."
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#1D546D] focus:border-[#1D546D] transition outline-none shadow-sm" />
                            @error('name') <p class="text-red-500 text-sm mt-1.5 font-medium"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">Địa chỉ Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" required placeholder="Nhập email của bạn..."
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#1D546D] focus:border-[#1D546D] transition outline-none shadow-sm" />
                            @error('email') <p class="text-red-500 text-sm mt-1.5 font-medium"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block mb-2 font-semibold text-gray-700">Chủ đề <span class="text-red-500">*</span></label>
                        <input type="text" name="subject" required placeholder="Nhập chủ đề bạn cần hỗ trợ..."
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#1D546D] focus:border-[#1D546D] transition outline-none shadow-sm" />
                        @error('subject') <p class="text-red-500 text-sm mt-1.5 font-medium"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-semibold text-gray-700">Nội dung chi tiết <span class="text-red-500">*</span></label>
                        <textarea name="message" rows="5" required placeholder="Trình bày chi tiết nội dung cần liên hệ..."
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#1D546D] focus:border-[#1D546D] transition outline-none shadow-sm resize-none"></textarea>
                        @error('message') <p class="text-red-500 text-sm mt-1.5 font-medium"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
                    </div>

                    <div class="flex flex-col sm:flex-row justify-end gap-4 pt-6 border-t border-gray-100">
                        <a href="{{ route('guest.trangChu') }}"
                            class="px-8 py-3 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition text-center">
                            Hủy bỏ
                        </a>
                        <button type="submit"
                            class="px-8 py-3 bg-[#1D546D] text-white font-bold rounded-xl hover:bg-[#154053] transition shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                            <i class="fas fa-paper-plane"></i> Gửi yêu cầu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection