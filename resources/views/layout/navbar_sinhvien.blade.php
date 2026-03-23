<nav class="fixed top-0 left-0 right-0 z-50 bg-[#071E28] border-b border-[#2c5d6e] shadow-sm">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">

            <!-- Nút Đăng xuất -->
            <a href="{{ route('login') }}"
                class="hidden sm:flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600/90 hover:bg-red-700 rounded-md">
                <i class="fas fa-sign-in-alt mr-2"></i>
                Đăng nhập
            </a>
                <div class="relative">
                    <button class="flex items-center space-x-3 focus:outline-none">
                        <span class="text-white font-medium hidden md:block">
                            Guest
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>