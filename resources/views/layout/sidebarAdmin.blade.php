<aside id="default-sidebar" class="bg-[#1D546D] fixed inset-y-0 left-0 z-40 w-64 transform -translate-x-full transition-transform duration-300 ease-in-out sm:translate-x-0" aria-label="Sidebar">
    <div class="flex h-full flex-col pt-16">  
        <div class="flex-1 overflow-y-auto px-3 py-4">
            <ul class="space-y-2 font-medium">
                
                <div class="bg-white/10 backdrop-blur-sm rounded-md flex items-center px-3 py-2 text-white focus-within:ring-2 focus-within:ring-white/30">
                    <input 
                        name="search" 
                        placeholder="Tìm kiếm..." 
                        class="w-full bg-transparent border-none outline-none placeholder:text-white/60 text-white"
                    />
                    <svg class="w-5 h-5 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>

                <!-- Trang chủ -->
                <li>
                    <a href="{{ route('admin.trangChu') }}"
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] transition
                       {{ request()->routeIs('admin.trangChu') ? 'bg-[#2c5d6e] border-l-4 border-white font-semibold' : '' }}">
                        <i class="fas fa-home w-6"></i>
                        <span class="ml-3">Trang chủ</span>
                    </a>
                </li>

                <!-- Đề tài -->
                <li>
                    <a href="{{ route('admin.congbo.index') }}"
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] transition
                       {{ request()->routeIs('admin.congbo.index') ? 'bg-[#2c5d6e] border-l-4 border-white font-semibold' : '' }}">
                        <i class="fas fa-file-alt w-6"></i>
                        <span class="ml-3">Đề tài nghiên cứu</span>
                    </a>
                </li>

                <!-- Quy chế -->
                <li>
                    <a href="#"
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] transition">
                        <i class="fas fa-pen w-6"></i>
                        <span class="ml-3">Quy chế khoa học</span>
                    </a>
                </li>

                <!-- Công bố -->
                <li>
                    <a href="{{ route('admin.congbo.index') }}"
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] transition
                       {{ request()->routeIs('admin.congbo.*') ? 'bg-[#2c5d6e] border-l-4 border-white font-semibold' : '' }}">
                        <i class="fas fa-book w-6"></i>
                        <span class="ml-3">Công bố khoa học</span>
                    </a>
                </li>

                <!-- Hoạt động -->
                <li>
                    <a href="#"
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] transition">
                        <i class="fas fa-stream w-6"></i>
                        <span class="ml-3">Hoạt động khoa học</span>
                    </a>
                </li>

                <!-- Sự kiện -->
                <li>
                    <a href="#"
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] transition">
                        <i class="fas fa-calendar-check w-6"></i>
                        <span class="ml-3">Sự kiện</span>
                    </a>
                </li>

                <!-- Liên hệ -->
                <li>
                    <a href="#"
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] transition">
                        <i class="fas fa-envelope w-6"></i>
                        <span class="ml-3">Liên hệ</span>
                    </a>
                </li>

                <!-- Đăng tải -->
                <li>
                    <a href="#"
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] transition">
                        <i class="fas fa-upload w-6"></i>
                        <span class="ml-3">Đăng tải</span>
                    </a>
                </li>

                <!-- Báo cáo -->
                <li>
                    <a href="#"
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] transition">
                        <i class="fas fa-chart-bar w-6"></i>
                        <span class="ml-3">Báo cáo</span>
                    </a>
                </li>

                <!-- Người dùng -->
                <li>
                    <a href="{{ route('admin.users.index') }}"
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] transition
                       {{ request()->routeIs('admin.users.*') ? 'bg-[#2c5d6e] border-l-4 border-white font-semibold' : '' }}">
                        <i class="fas fa-users-cog w-6"></i>
                        <span class="ml-3">Quản lý người dùng</span>
                    </a>
                </li>

                <!-- Danh mục -->
                <li>
                    <a href="#"
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] transition">
                        <i class="fas fa-tags w-6"></i>
                        <span class="ml-3">Quản lý danh mục</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</aside>