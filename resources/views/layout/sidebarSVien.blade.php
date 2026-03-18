<aside id="default-sidebar-student" class="bg-[#1D546D] fixed inset-y-0 left-0 z-40 w-64 transform -translate-x-full transition-transform duration-300 ease-in-out sm:translate-x-0" aria-label="Sidebar Sinh viên">
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

                <!-- Menu items dành cho sinh viên, với active state -->
                <li>
                    <a href="{{ route('sinhVien.trangChu') }}"
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200 
                       {{ request()->routeIs('sinhVien.trangChu') ? 'bg-[#2c5d6e] shadow-md border-l-4 border-white text-white font-semibold' : '' }}">
                        <i class="fas fa-home w-6 text-lg"></i>
                        <span class="ml-3">Trang chủ</span>
                    </a>
                </li>
                <li>
                    <a {{-- href="{{ route('student.de-tai.index') }}" --}}
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200 
                       {{ request()->routeIs('student.de-tai.*') ? 'bg-[#2c5d6e] shadow-md border-l-4 border-white text-white font-semibold' : '' }}">
                        <i class="fas fa-flask w-6 text-lg"></i>
                        <span class="ml-3">Đề tài nghiên cứu</span>
                    </a>
                </li>
                <li>
                    <a {{-- href="{{ route('student.quy-che.index') }}" --}}
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200 
                       {{ request()->routeIs('student.quy-che.*') ? 'bg-[#2c5d6e] shadow-md border-l-4 border-white text-white font-semibold' : '' }}">
                        <i class="fas fa-file-alt w-6 text-lg"></i>
                        <span class="ml-3">Quy chế khoa học</span>
                    </a>
                </li>
                <li>
                    <a {{-- href="{{ route('student.cong-bo.index') }}" --}}
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200 
                       {{ request()->routeIs('student.cong-bo.*') ? 'bg-[#2c5d6e] shadow-md border-l-4 border-white text-white font-semibold' : '' }}">
                        <i class="fas fa-book w-6 text-lg"></i>
                        <span class="ml-3">Công bố khoa học</span>
                    </a>
                </li>
                <li>
                    <a {{-- href="{{ route('student.hoat-dong.index') }}" --}}
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200 
                       {{ request()->routeIs('student.hoat-dong.*') ? 'bg-[#2c5d6e] shadow-md border-l-4 border-white text-white font-semibold' : '' }}">
                        <i class="fas fa-calendar-alt w-6 text-lg"></i>
                        <span class="ml-3">Hoạt động khoa học</span>
                    </a>
                </li>
                <li>
                    <a {{-- href="{{ route('student.su-kien.index') }}" --}}
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200 
                       {{ request()->routeIs('student.su-kien.*') ? 'bg-[#2c5d6e] shadow-md border-l-4 border-white text-white font-semibold' : '' }}">
                        <i class="fas fa-calendar-check w-6 text-lg"></i>
                        <span class="ml-3">Sự kiện</span>
                    </a>
                </li>
                <li>
                    <a {{-- href="{{ route('student.lien-he') }}" --}}
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200 
                       {{ request()->routeIs('student.lien-he') ? 'bg-[#2c5d6e] shadow-md border-l-4 border-white text-white font-semibold' : '' }}">
                        <i class="fas fa-envelope w-6 text-lg"></i>
                        <span class="ml-3">Liên hệ</span>
                    </a>
                </li>
                <li>
                    <a {{-- href="{{ route('student.ho-so.index') }}" --}}
                       class="flex items-center px-3 py-2.5 text-white rounded-md hover:bg-[#2c5d6e] hover:shadow-md transition-all duration-200 
                       {{ request()->routeIs('student.ho-so.*') ? 'bg-[#2c5d6e] shadow-md border-l-4 border-white text-white font-semibold' : '' }}">
                        <i class="fas fa-user w-6 text-lg"></i>
                        <span class="ml-3">Hồ sơ cá nhân</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>