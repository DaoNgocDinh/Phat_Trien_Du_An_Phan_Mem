<nav class="fixed top-0 left-0 right-0 z-50 bg-[#071E28] border-b border-[#2c5d6e] shadow-sm">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">

            <!-- Nút Đăng xuất -->
            <a href="javascript:void(0)" onclick="openLogoutModal()"
                class="hidden sm:flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600/90 hover:bg-red-700 rounded-md">
                <i class="fas fa-sign-out-alt mr-2"></i>
                Đăng xuất
            </a>

            <!-- Right: Bell + Profile + Đăng xuất -->
            <div class="flex items-center space-x-5 sm:space-x-6">
                <!-- Chuông thông báo -->
                <div class="relative">
                    <button type="button"
                        class="relative rounded-full p-1.5 text-gray-200 hover:text-white hover:bg-[#2c5d6e] focus:outline-none focus:ring-2 focus:ring-white/30 transition duration-150">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <!-- Nếu muốn badge thông báo -->
                        <!-- <span class="absolute -top-1 -right-1 h-4 w-4 rounded-full bg-red-500 text-[10px] text-white flex items-center justify-center">3</span> -->
                    </button>
                </div>
                <!-- Profile -->
                <!-- Profile -->
                <div class="relative">
                    <button id="profileBtn" class="flex items-center space-x-3 focus:outline-none">

                        <img class="h-8 w-8 rounded-full object-cover border-2 border-[#3f7b8e]"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80">

                        <span class="text-white font-medium hidden md:block">
                            {{ session('HoTen') }}
                        </span>
                    </button>

                    <!-- DROPDOWN -->
                    <div id="profileMenu"
                        class="hidden absolute right-0 mt-2 w-52 bg-white rounded-xl shadow-xl border border-gray-200 z-50 overflow-hidden">

                        <div class="px-4 py-2 text-sm text-gray-600 border-b bg-gray-50">
                            {{ session('HoTen') }}
                        </div>

                        <a href="{{ route('admin.changePassword') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            🔒 Đổi mật khẩu
                        </a>


                    </div>
                </div>


                <!-- Mobile: icon đăng xuất -->
                <a {{-- href="{{ route('logout') }}" --}} class="sm:hidden text-gray-200 hover:text-white transition">
                    <i class="fas fa-sign-out-alt text-xl"></i>
                </a>
            </div>
        </div>
    </div>
    <div id="logoutModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">

        <div class="bg-white w-[350px] rounded-lg shadow-lg">

            <!-- Header -->
            <div class="flex justify-between items-center px-4 py-2 border-b bg-gray-100">
                <span class="font-semibold">Xác nhận</span>
                <button onclick="closeLogoutModal()">✖</button>
            </div>

            <!-- Content -->
            <div class="p-6 text-center">
                <p class="text-gray-700 mb-6">
                    Bạn có chắc chắn muốn đăng xuất không ?
                </p>

                <div class="flex justify-center gap-4">
                    <button onclick="closeLogoutModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                        Không
                    </button>

                    <a href="{{ route('logout') }}"
                        class="px-4 py-2 bg-[#6b9080] text-white rounded hover:bg-[#5a7c6f]">
                        Có
                    </a>
                </div>
            </div>

        </div>

    </div>
    <!-- MODAL -->
    <div id="changePasswordModal"
        class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">

        <div class="bg-white w-[420px] rounded-lg shadow-lg">

            <!-- HEADER -->
            <div class="flex items-center gap-2 px-4 py-3 border-b">
                <i class="fa-solid fa-lock text-black"></i>
                <span class="font-bold text-lg bg-yellow-300 px-2 rounded">
                    Đổi mật khẩu
                </span>
            </div>

            <!-- CONTENT -->
            <form method="POST" action="{{ route('admin.changePassword.post') }}" class="p-5">
                @csrf

                <!-- Mật khẩu hiện tại -->
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700">Mật khẩu hiện tại</label>
                    <div class="relative">
                        <input type="password" name="old_password"
                            class="w-full bg-gray-100 px-3 py-2 rounded border outline-none">
                        <i class="fa-solid fa-eye-slash absolute right-3 top-3 text-gray-500"></i>
                    </div>
                </div>

                <!-- Mật khẩu mới -->
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700">Mật khẩu mới</label>
                    <div class="relative">
                        <input type="password" name="new_password"
                            class="w-full bg-gray-100 px-3 py-2 rounded border outline-none">
                        <i class="fa-solid fa-eye-slash absolute right-3 top-3 text-gray-500"></i>
                    </div>
                </div>

                <!-- Xác nhận -->
                <div class="mb-5">
                    <label class="block mb-1 text-gray-700">Xác nhận mật khẩu</label>
                    <div class="relative">
                        <input type="password" name="new_password_confirmation"
                            class="w-full bg-gray-100 px-3 py-2 rounded border outline-none">
                        <i class="fa-solid fa-eye-slash absolute right-3 top-3 text-gray-500"></i>
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="flex justify-center gap-3">
                    <button type="submit" class="bg-[#5f9ea0] hover:bg-[#4f888a] text-white px-6 py-2 rounded">
                        Cập nhật
                    </button>

                    <button type="button" onclick="closeChangePasswordModal()"
                        class="bg-gray-300 hover:bg-gray-400 px-6 py-2 rounded">
                        Hủy
                    </button>
                </div>
            </form>

        </div>
    </div>
</nav>
<script>
    function openLogoutModal() {
        document.getElementById('logoutModal').classList.remove('hidden');
    }

    function closeLogoutModal() {
        document.getElementById('logoutModal').classList.add('hidden');
    }

    const profileBtn = document.getElementById("profileBtn");
    const profileMenu = document.getElementById("profileMenu");

    profileBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        profileMenu.classList.toggle("hidden");
    });

    // click ngoài thì đóng
    document.addEventListener("click", function (e) {
        if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
            profileMenu.classList.add("hidden");
        }
    });

    function openChangePasswordModal() {
        document.getElementById('changePasswordModal').classList.remove('hidden');
    }

    function closeChangePasswordModal() {
        document.getElementById('changePasswordModal').classList.add('hidden');
    }

</script>