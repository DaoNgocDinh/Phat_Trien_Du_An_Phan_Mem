<nav class="fixed top-0 left-0 right-0 z-50 bg-[#071E28] border-b border-[#2c5d6e] shadow-sm">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            
            <div class="flex items-center gap-4">
                <button id="sidebarToggle" class="text-gray-200 hover:text-white md:hidden transition">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <a href="{{ route('guest.trangChu') ?? '#' }}" class="text-xl font-bold text-white tracking-wide hidden sm:block hover:text-gray-200 transition">
                    HỆ THỐNG QUẢN LÝ NGHIÊN CỨU KHOA HỌC
                </a>
            </div>

            <div class="flex items-center space-x-5 sm:space-x-6">
                <a href="{{ route('login') ?? '#' }}" class="inline-flex items-center px-5 py-2 text-sm font-medium text-white bg-[#1D546D] border border-white/20 rounded-md hover:bg-[#154053] transition-all duration-200 shadow focus:outline-none focus:ring-2 focus:ring-[#2c5d6e]">
                    <i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập
                </a>
            </div>

        </div>
    </div>
</nav>

<script>
    // Toggle Sidebar trên Mobile
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        const sidebar = document.getElementById('default-sidebar-student');
        sidebar.classList.toggle('-translate-x-full');
    });
</script>