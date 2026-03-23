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
                <div class="relative inline-block text-left" id="notifDropdown">
                    @php
                        $danhSachThongBao = \App\Models\Thongbao::orderBy('NgayTao', 'desc')->take(6)->get();
                        $soThongBaoMoi = \App\Models\Thongbao::where('NgayTao', '>=', \Carbon\Carbon::now()->subDays(7))->count();
                    @endphp

                    <button type="button" onclick="toggleThongBao()"
                        class="btn btn-ghost btn-circle relative hover:bg-white/20 transition-colors">
                        <i class="fas fa-bell text-xl text-[#F9A826]"></i>
                        @if($soThongBaoMoi > 0)
                            <span id="notif-badge"
                                class="absolute top-1 right-2 inline-flex items-center justify-center w-4 h-4 text-[10px] font-bold text-white bg-red-500 rounded-full border-2 border-[#1D546D] transition-all duration-300">
                                {{ $soThongBaoMoi }}
                            </span>
                        @endif
                    </button>

                    <div id="thongBaoMenu"
                        class="hidden absolute right-0 mt-3 w-[400px] bg-white rounded-2xl shadow-2xl border border-gray-100 z-50 flex flex-col overflow-hidden transition-all origin-top-right">

                        <div class="px-5 pt-5 pb-3 flex justify-between items-end">
                            <h3 class="text-2xl font-extrabold text-gray-900 tracking-tight">Thông báo</h3>
                            <button onclick="markAllAsRead()"
                                class="text-[13px] text-blue-600 font-medium hover:text-blue-800 transition">
                                Đánh dấu tất cả đã đọc
                            </button>
                        </div>

                        <div class="px-5 flex gap-6 border-b border-gray-200">
                            <button id="tab-all" onclick="switchNotifTab('all')"
                                class="pb-3 text-[15px] text-blue-600 font-semibold border-b-2 border-blue-600 transition-all">
                                Tất cả
                            </button>
                            <button id="tab-unread" onclick="switchNotifTab('unread')"
                                class="pb-3 text-[15px] text-gray-500 font-medium hover:text-gray-800 border-b-2 border-transparent transition-all">
                                Chưa đọc
                            </button>
                        </div>

                        <div class="max-h-[60vh] overflow-y-auto bg-white" id="notif-list-container">
                            @forelse($danhSachThongBao as $tb)
                                @php $isNew = $loop->iteration <= $soThongBaoMoi; @endphp

                                <a href="#"
                                    class="notif-item {{ $isNew ? 'is-unread' : '' }} flex items-start gap-4 p-4 border-b border-gray-50 hover:bg-gray-50 transition relative group">

                                    <div
                                        class="w-12 h-12 rounded-full bg-blue-50 flex-shrink-0 flex items-center justify-center overflow-hidden border border-gray-100">
                                        <img src="https://ui-avatars.com/api/?name=HT&background=EBF4F6&color=1D546D"
                                            alt="Avatar" class="w-full h-full object-cover">
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <p class="text-[14px] text-gray-800 leading-snug">
                                            <span class="font-bold text-gray-900">Hệ thống QLNVKH</span>
                                            đã gửi một thông báo mới: <span
                                                class="font-bold text-gray-900">{{ $tb->TieuDe }}</span>.
                                        </p>
                                        <p
                                            class="notif-time text-[13px] mt-1.5 font-semibold {{ $isNew ? 'text-blue-600' : 'text-gray-500' }} transition-colors">
                                            {{ \Carbon\Carbon::parse($tb->NgayTao)->diffForHumans() }}
                                        </p>
                                    </div>

                                    @if($isNew)
                                        <div class="unread-dot flex-shrink-0 mt-2 transition-opacity duration-300">
                                            <div class="w-2.5 h-2.5 bg-blue-600 rounded-full shadow-sm"></div>
                                        </div>
                                    @endif
                                </a>
                            @empty
                                <div class="text-center py-10 flex flex-col items-center">
                                    <i class="far fa-bell-slash text-4xl text-gray-300 mb-3"></i>
                                    <p class="text-gray-500 font-medium">Bạn không có thông báo nào</p>
                                </div>
                            @endforelse

                            <div id="empty-unread-msg" class="hidden text-center py-10 flex flex-col items-center">
                                <i class="far fa-check-circle text-4xl text-green-400 mb-3"></i>
                                <p class="text-gray-500 font-medium">Bạn đã đọc hết tất cả thông báo!</p>
                            </div>
                        </div>
                    </div>
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
</nav>
<script>
    // 1. Logic bật/tắt menu thông báo
    function toggleThongBao() {
        const menu = document.getElementById('thongBaoMenu');
        menu.classList.toggle('hidden');
    }

    document.addEventListener('click', function (event) {
        const dropdown = document.getElementById('notifDropdown');
        const menu = document.getElementById('thongBaoMenu');
        if (dropdown && !dropdown.contains(event.target)) {
            menu.classList.add('hidden');
        }
    });

    // 2. Logic chuyển Tab (Tất cả / Chưa đọc)
    function switchNotifTab(tabName) {
        const tabAll = document.getElementById('tab-all');
        const tabUnread = document.getElementById('tab-unread');
        const items = document.querySelectorAll('.notif-item');
        const emptyMsg = document.getElementById('empty-unread-msg');
        let unreadCount = 0;

        if (tabName === 'all') {
            // Đổi style Tab "Tất cả" thành màu xanh
            tabAll.className = "pb-3 text-[15px] text-blue-600 font-semibold border-b-2 border-blue-600 transition-all";
            tabUnread.className = "pb-3 text-[15px] text-gray-500 font-medium hover:text-gray-800 border-b-2 border-transparent transition-all";

            // Hiện toàn bộ item
            items.forEach(item => item.style.display = 'flex');
            emptyMsg.classList.add('hidden');
        } else {
            // Đổi style Tab "Chưa đọc" thành màu xanh
            tabUnread.className = "pb-3 text-[15px] text-blue-600 font-semibold border-b-2 border-blue-600 transition-all";
            tabAll.className = "pb-3 text-[15px] text-gray-500 font-medium hover:text-gray-800 border-b-2 border-transparent transition-all";

            // Lọc item: Chỉ hiện những item có class 'is-unread'
            items.forEach(item => {
                if (item.classList.contains('is-unread')) {
                    item.style.display = 'flex';
                    unreadCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Nếu không có thông báo chưa đọc nào, hiện thông báo trống
            if (unreadCount === 0) {
                emptyMsg.classList.remove('hidden');
                emptyMsg.classList.add('flex');
            }
        }
    }

    // 3. Logic Đánh dấu tất cả đã đọc
    function markAllAsRead() {
        // Ẩn badge đỏ ở cái chuông
        const badge = document.getElementById('notif-badge');
        if (badge) {
            badge.style.opacity = '0';
            setTimeout(() => badge.style.display = 'none', 300);
        }

        // Loại bỏ class 'is-unread' khỏi tất cả các item
        const items = document.querySelectorAll('.notif-item');
        items.forEach(item => {
            item.classList.remove('is-unread');
        });

        // Ẩn toàn bộ chấm xanh
        const dots = document.querySelectorAll('.unread-dot');
        dots.forEach(dot => {
            dot.style.opacity = '0';
            setTimeout(() => dot.style.display = 'none', 300);
        });

        // Đổi màu thời gian từ Xanh sang Xám
        const timeTexts = document.querySelectorAll('.notif-time');
        timeTexts.forEach(text => {
            text.classList.remove('text-blue-600');
            text.classList.add('text-gray-500');
        });

        // Nếu người dùng đang ở tab "Chưa đọc", tự động update giao diện cho mượt
        const tabUnread = document.getElementById('tab-unread');
        if (tabUnread.classList.contains('text-blue-600')) {
            switchNotifTab('unread'); // Cập nhật lại list (sẽ hiện thông báo trống vì không còn mục is-unread)
        }
    }
</script>
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

                <a href="{{ route('logout') }}" class="px-4 py-2 bg-[#6b9080] text-white rounded hover:bg-[#5a7c6f]">
                    Có
                </a>
            </div>
        </div>

    </div>

</div>
<!-- MODAL -->
<div id="changePasswordModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">

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