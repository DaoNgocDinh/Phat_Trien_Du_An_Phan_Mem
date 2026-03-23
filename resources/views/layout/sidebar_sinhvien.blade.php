<aside id="default-sidebar-student"
    class="bg-[#1D546D] fixed inset-y-0 left-0 z-40 w-64 transform -translate-x-full transition-transform duration-300 ease-in-out sm:translate-x-0 shadow-lg"
    aria-label="Sidebar Sinh viên">
    <div class="flex h-full flex-col pt-16">
        <div class="flex-1 overflow-y-auto px-3 py-4">
            
            <ul class="space-y-2 font-medium">
                <div class="bg-white/10 backdrop-blur-sm rounded-md flex items-center px-3 py-2 text-white focus-within:ring-2 focus-within:ring-white/30 mb-6">
                    <input name="search" placeholder="Tìm kiếm..." id="search-input" value="{{ request('search') }}"
                        class="w-full bg-transparent border-none outline-none placeholder:text-white/60 text-white text-sm" />
                    <svg id="search-btn" class="w-5 h-5 text-white/70 cursor-pointer" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <li>
                    <a href="{{ route('guest.trangChu') ?? '#' }}"
                        class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200 
                       {{ request()->routeIs('guest.trangChu') ? 'bg-[#2c5d6e] shadow-md border-l-4 border-white font-semibold' : '' }}">
                        <i class="fas fa-home w-6 text-lg"></i>
                        <span class="ml-3">Trang chủ</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('guest.deTai') ?? '#' }}"
                        class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200">
                        <i class="fas fa-book-reader w-6 text-lg"></i>
                        <span class="ml-3">Đề tài nghiên cứu</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('guest.congBo') ?? '#' }}"
                        class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200 
                       {{ request()->routeIs('guest.congBo') ? 'bg-[#2c5d6e] shadow-md border-l-4 border-white font-semibold' : '' }}">
                        <i class="fas fa-file-contract w-6 text-lg"></i>
                        <span class="ml-3">Công bố khoa học</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('guest.quyChe.index') ?? '#' }}"
                        class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200">
                        <i class="fas fa-gavel w-6 text-lg"></i>
                        <span class="ml-3">Quy chế khoa học</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('guest.suKien') ?? '#' }}"
                        class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200">
                        <i class="fas fa-calendar-check w-6 text-lg"></i>
                        <span class="ml-3">Sự kiện</span>
                    </a>
                </li>
                <li class="pt-4 mt-4 border-t border-white/20">
                    <a href="{{ route('guest.lienhe') ?? '#' }}"
                        class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200">
                        <i class="fas fa-envelope w-6 text-lg"></i>
                        <span class="ml-3">Liên hệ với Admin</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</aside>