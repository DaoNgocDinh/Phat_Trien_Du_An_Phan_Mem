<aside id="default-sidebar" class="bg-[#1D546D] fixed inset-y-0 left-0 z-40 w-64 transform -translate-x-full transition-transform duration-300 ease-in-out sm:translate-x-0" aria-label="Sidebar">
    <div class="flex h-full flex-col pt-16">  
        <div class="flex-1 overflow-y-auto px-3 py-4">
            <ul class="space-y-2 font-medium">
                <!-- Search bar -->
                <div class="bg-white/10 backdrop-blur-sm rounded-md flex items-center px-3 py-2 text-white focus-within:ring-2 focus-within:ring-white/30">
                    <input 
                        name="search" 
                        placeholder="Tìm kiếm..." 
                        aria-label="Search" 
                        class="w-full bg-transparent border-none outline-none placeholder:text-white/60 text-white"
                    />
                    <svg class="w-5 h-5 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <!-- Menu items -->
                <li>
                    <a {{-- href="{{ route('Admin.trangChu') }}" --}} class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200">
                        <i class="fas fa-home w-6 text-lg"></i>
                        <span class="ml-3">Trang chủ</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200">
                        <i class="fas fa-file-alt w-6 text-lg"></i>
                        <span class="ml-3">Đề tài nghiên cứu</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200">
                        <i class="fas fa-pen w-6 text-lg"></i>
                        <span class="ml-3">Quy chế khoa học</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200">
                        <i class="fas fa-book w-6 text-lg"></i>
                        <span class="ml-3">Công bố khoa học</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200">
                        <i class="fas fa-stream w-6 text-lg"></i>
                        <span class="ml-3">Hoạt động khoa học</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200">
                        <i class="fas fa-calendar-check w-6 text-lg"></i>
                        <span class="ml-3">Sự kiện</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200">
                        <i class="fas fa-envelope w-6 text-lg"></i>
                        <span class="ml-3">Liên hệ</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200">
                        <i class="fas fa-user-cog w-6 text-lg"></i>
                        <span class="ml-3">Đăng tải</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200">
                        <i class="fas fa-user-cog w-6 text-lg"></i>
                        <span class="ml-3">Báo cáo</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200">
                        <i class="fas fa-user-cog w-6 text-lg"></i>
                        <span class="ml-3">Quản lý người dùng</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200">
                        <i class="fas fa-user-cog w-6 text-lg"></i>
                        <span class="ml-3">Quản lý danh mục</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>