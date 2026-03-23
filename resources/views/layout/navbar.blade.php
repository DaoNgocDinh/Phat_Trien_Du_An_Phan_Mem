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
                <div class="relative">

                    <!-- Chuông -->
                    <button id="bellBtn" type="button"
                        class="relative rounded-full p-1.5 text-gray-200 hover:text-white hover:bg-[#2c5d6e] transition duration-150">

                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>

                        <!-- Badge -->
                        <span id="badge"
                            class="hidden absolute -top-1 -right-1 h-4 w-4 rounded-full bg-red-500 text-[10px] text-white flex items-center justify-center">
                        </span>
                    </button>

                    <!-- Dropdown -->
                    <div id="dropdown"
                        class="hidden absolute right-0 mt-2 w-64 bg-white rounded-xl shadow-xl border border-gray-200 z-50 overflow-hidden">

                        <!-- Header -->
                        <div class="px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-100">
                            Thông báo
                        </div>

                        <!-- List -->
                        <div id="dropdownContent" class="max-h-60 overflow-y-auto divide-y">
                        </div>

                        <!-- Footer -->
                        <div class="text-center py-2 bg-gray-50">
                            <a href="{{ route('admin.lienhe.index') }}" class="text-sm text-blue-500 hover:underline">
                                Xem tất cả
                            </a>
                        </div>

                    </div>
                </div>

                <!-- Profile -->
                <div class="flex items-center space-x-3">
                    <img class="h-8 w-8 rounded-full object-cover border-2 border-[#3f7b8e]"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="Nguyễn Thị B" />
                    <span class="text-white font-medium hidden md:block"> {{ session('HoTen') }}</span>
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
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const bell = document.getElementById("bellBtn");
        const dropdown = document.getElementById("dropdown");
        const content = document.getElementById("dropdownContent");
        const badge = document.getElementById("badge");

        function loadCount() {
            fetch("{{ route('lienhe.count') }}")
                .then(res => res.json())
                .then(data => {
                    if (data.soLuong > 0) {
                        badge.classList.remove("hidden");
                        badge.innerText = data.soLuong > 9 ? '9+' : data.soLuong;
                    } else {
                        badge.classList.add("hidden");
                    }
                });
        }

        function loadList() {
            fetch("{{ route('lienhe.list') }}")
                .then(res => res.json())
                .then(data => {

                    content.innerHTML = "";

                    if (data.length === 0) {
                        content.innerHTML = `
                        <div class="p-3 text-gray-500 text-sm text-center">
                            Không có thông báo
                        </div>`;
                        return;
                    }

                    data.forEach(item => {
                        content.innerHTML += `
                        <div class="px-4 py-2 hover:bg-gray-100 transition cursor-pointer">
                            <p class="text-blue-600 hover:underline text-sm"
                               onclick="goToDetail(${item.MaLienHe})">
                                Liên hệ từ: ${item.HoTen}
                            </p>
                        </div>
                    `;
                    });
                });
        }

        bell.addEventListener("click", function () {
            dropdown.classList.toggle("hidden");
            loadList();
        });

        document.addEventListener("click", function (e) {
            if (!bell.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add("hidden");
            }
        });

        window.goToDetail = function (id) {
            window.location.href = "lienhe/" + id;
        }

        loadCount();
    });

    function openLogoutModal() {
        document.getElementById('logoutModal').classList.remove('hidden');
    }

    function closeLogoutModal() {
        document.getElementById('logoutModal').classList.add('hidden');
    }
</script>