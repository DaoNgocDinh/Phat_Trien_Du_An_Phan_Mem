<nav class="fixed top-0 left-0 right-0 z-50 bg-[#071E28] border-b border-[#2c5d6e] shadow-sm">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Left: Tên hệ thống (tùy chọn, có thể bỏ nếu không cần) -->
             
            <!-- Nút Đăng xuất -->
            <a {{-- href="{{ route('logout') }}"  --}}
                class="hidden sm:flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600/90 hover:bg-red-700 rounded-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500/50">
                <i class="fas fa-sign-out-alt mr-2"></i>
                Đăng xuất
            </a>

            <!-- Right: Bell + Profile + Đăng xuất -->
            <div class="flex items-center space-x-5 sm:space-x-6">
                <!-- Chuông thông báo -->
                <button type="button" class="relative rounded-full p-1.5 text-gray-200 hover:text-white hover:bg-[#2c5d6e] focus:outline-none focus:ring-2 focus:ring-white/30 transition duration-150">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <!-- Nếu muốn badge thông báo -->
                    <!-- <span class="absolute -top-1 -right-1 h-4 w-4 rounded-full bg-red-500 text-[10px] text-white flex items-center justify-center">3</span> -->
                </button>

                <!-- Profile -->
                <div class="flex items-center space-x-3">
                    <img class="h-8 w-8 rounded-full object-cover border-2 border-[#3f7b8e]" 
                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                         alt="Nguyễn Thị B" />
                    <span class="text-white font-medium hidden md:block">Nguyễn Thị B</span>
                </div>


                <!-- Mobile: icon đăng xuất -->
                <a {{-- href="{{ route('logout') }}" --}} class="sm:hidden text-gray-200 hover:text-white transition">
                    <i class="fas fa-sign-out-alt text-xl"></i>
                </a>
            </div>
        </div>
    </div>
</nav>