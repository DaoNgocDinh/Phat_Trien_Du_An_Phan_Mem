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
                    <button type="button" onclick="toggleThongBao()" class="relative rounded-full p-1.5 text-gray-200 hover:text-white hover:bg-[#2c5d6e] transition duration-150">
                        
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>

                        <span id="notif-badge" style="display: none;" class="absolute top-1 right-2 items-center justify-center w-4 h-4 text-[10px] font-bold text-white bg-red-500 rounded-full border-2 border-[#071E28]">
                            0
                        </span>
                    </button>

                    <div id="thongBaoMenu" style="display: none;" class="absolute right-0 mt-3 w-[360px] sm:w-[400px] bg-white rounded-xl shadow-2xl border border-gray-200 z-50 flex-col overflow-hidden origin-top-right">
                        
                        <div id="notif-header-main" class="px-5 py-4 flex justify-between items-center border-b border-gray-100 bg-gray-50">
                            <h3 class="text-lg font-extrabold text-gray-900 tracking-tight">Thông báo</h3>
                            <button onclick="markAllAsRead()" class="text-xs text-blue-600 font-semibold hover:text-blue-800 transition">
                                Đánh dấu đã đọc
                            </button>
                        </div>

                        <div id="notif-list-view" style="display: block;">
                            <div class="px-5 flex gap-5 border-b border-gray-100 shadow-sm">
                                <button id="tab-all" onclick="switchNotifTab('all')" class="py-2.5 text-[14px] text-blue-600 font-bold border-b-2 border-blue-600">Tất cả</button>
                                <button id="tab-unread" onclick="switchNotifTab('unread')" class="py-2.5 text-[14px] text-gray-500 font-medium hover:text-gray-800 border-b-2 border-transparent">Chưa đọc</button>
                            </div>
                            
                            <div class="w-full max-h-[60vh] overflow-y-auto bg-white">
                                
                                <div id="notif-loading" style="display: none;" class="py-12 flex-col items-center justify-center">
                                    <i class="fas fa-spinner fa-spin text-3xl text-[#1D546D] mb-3"></i>
                                    <span class="text-sm text-gray-500 font-medium">Đang tải thông báo...</span>
                                </div>

                                <div id="notif-error" style="display: none;" class="py-12 flex-col items-center justify-center text-center px-4">
                                    <i class="fas fa-exclamation-triangle text-4xl text-red-500 mb-3"></i>
                                    <p class="text-gray-800 text-sm font-bold mb-1">Lỗi kết nối khi tải thông báo.</p>
                                    <p class="text-gray-500 text-xs mb-4">Hệ thống bị lỗi hoặc cơ sở dữ liệu gặp vấn đề.</p>
                                    <button onclick="fetchNotifications()" class="px-5 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 shadow-sm transition">
                                        <i class="fas fa-redo mr-1"></i> Thử lại
                                    </button>
                                </div>

                                <div id="notif-empty" style="display: none;" class="py-14 flex-col items-center justify-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                                        <i class="far fa-bell-slash text-3xl text-gray-400"></i>
                                    </div>
                                    <p class="text-gray-600 text-[15px] font-semibold">Bạn không có thông báo</p>
                                </div>

                                <div id="notif-content-wrapper" style="display: block;" class="w-full"></div>
                            </div>
                        </div>

                        <div id="notif-detail-view" style="display: none;" class="flex-col">
                            <div class="px-4 py-3 border-b border-gray-100 flex items-center gap-3 bg-gray-50 hover:bg-gray-100 cursor-pointer transition" onclick="backToNotifList()">
                                <i class="fas fa-arrow-left text-gray-500"></i>
                                <span class="font-bold text-[#1D546D] text-sm">Quay lại thông báo</span>
                            </div>
                            
                            <div class="p-6 max-h-[60vh] overflow-y-auto bg-white">
                                <h4 id="detail-title" class="text-lg font-bold text-gray-900 mb-2 leading-snug"></h4>
                                <p class="text-xs text-gray-500 font-medium mb-5 pb-4 border-b border-gray-100 flex items-center gap-1.5">
                                    <i class="far fa-clock"></i> <span id="detail-time"></span>
                                </p>
                                <div id="detail-content" class="text-[14.5px] text-gray-700 whitespace-pre-wrap leading-relaxed"></div>
                            </div>
                        </div>

                    </div>
                </div>
                
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
    let isNotifLoaded = false;
    let currentNotifs = [];
    let currentUnreadCount = 0;

    function timeSince(dateString) {
        const date = new Date(dateString);
        const seconds = Math.floor((new Date() - date) / 1000);
        let interval = seconds / 31536000;
        if (interval > 1) return Math.floor(interval) + " năm trước";
        interval = seconds / 2592000;
        if (interval > 1) return Math.floor(interval) + " tháng trước";
        interval = seconds / 86400;
        if (interval > 1) return Math.floor(interval) + " ngày trước";
        interval = seconds / 3600;
        if (interval > 1) return Math.floor(interval) + " giờ trước";
        interval = seconds / 60;
        if (interval > 1) return Math.floor(interval) + " phút trước";
        return "Vừa xong";
    }

    // Đóng/Mở an toàn bằng thẻ style
    function toggleThongBao() {
        const menu = document.getElementById('thongBaoMenu');
        if (menu.style.display === 'none' || menu.style.display === '') {
            menu.style.display = 'flex';
            if (!isNotifLoaded) fetchNotifications();
        } else {
            menu.style.display = 'none';
        }
    }

    function setNotifState(state) {
        document.getElementById('notif-loading').style.display = state === 'loading' ? 'flex' : 'none';
        document.getElementById('notif-error').style.display = state === 'error' ? 'flex' : 'none';
        document.getElementById('notif-empty').style.display = state === 'empty' ? 'flex' : 'none';
        document.getElementById('notif-content-wrapper').style.display = state === 'content' ? 'block' : 'none';
    }

    function fetchNotifications() {
        setNotifState('loading');
        document.getElementById('notif-content-wrapper').innerHTML = '';

        // Đảm bảo bạn đã có Route này trong file giangvien.php của backend
        fetch('/giangvien/api/thong-bao')
            .then(response => {
                if (!response.ok) throw new Error('Mất kết nối API');
                return response.json();
            })
            .then(res => {
                if (res.success) {
                    isNotifLoaded = true;
                    currentNotifs = res.data;
                    currentUnreadCount = res.soMoi;

                    const badge = document.getElementById('notif-badge');
                    if (currentUnreadCount > 0) {
                        badge.textContent = currentUnreadCount;
                        badge.style.display = 'inline-flex';
                    } else {
                        badge.style.display = 'none';
                    }

                    if (currentNotifs.length === 0) {
                        setNotifState('empty');
                    } else {
                        setNotifState('content');
                        renderNotifications();
                    }
                } else {
                    throw new Error(res.message);
                }
            })
            .catch(error => {
                console.error("Lỗi:", error);
                setNotifState('error'); // Trigger hiển thị "Lỗi hệ thống - Thử lại"
            });
    }

    function renderNotifications() {
        const wrapper = document.getElementById('notif-content-wrapper');
        wrapper.innerHTML = '';

        currentNotifs.forEach((tb, index) => {
            // Kiểm tra trạng thái trực tiếp từ DB (cột LoaiThongBao)
            const isUnread = tb.LoaiThongBao === 'chưa đọc'; 
            const timeAgo = timeSince(tb.NgayTao);

            const html = `
                <a href="javascript:void(0)" onclick="openNotifDetail(${index}, this)" class="notif-item ${isUnread ? 'is-unread' : ''} flex items-start gap-4 p-4 border-b border-gray-50 hover:bg-gray-50 transition relative group">
                    <div class="w-12 h-12 rounded-full bg-blue-50 flex-shrink-0 flex items-center justify-center overflow-hidden border border-blue-100">
                        <i class="fas fa-bell text-blue-500 text-lg"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-[14px] text-gray-800 leading-snug">
                            <span class="font-bold text-gray-900 block truncate">${tb.TieuDe}</span>
                            <span class="text-gray-600 line-clamp-2 mt-0.5">${tb.NoiDung}</span>
                        </p>
                        <p class="notif-time text-[12px] mt-1.5 font-semibold ${isUnread ? 'text-blue-600' : 'text-gray-500'}">
                            ${timeAgo}
                        </p>
                    </div>
                    ${isUnread ? `<div class="unread-dot flex-shrink-0 mt-2"><div class="w-2.5 h-2.5 bg-blue-600 rounded-full shadow-sm"></div></div>` : ''}
                </a>
            `;
            wrapper.insertAdjacentHTML('beforeend', html);
        });
    }

    function switchNotifTab(tabName) {
        const tabAll = document.getElementById('tab-all');
        const tabUnread = document.getElementById('tab-unread');
        const items = document.querySelectorAll('.notif-item');

        if (tabName === 'all') {
            tabAll.className = "py-2.5 text-[14px] text-blue-600 font-bold border-b-2 border-blue-600";
            tabUnread.className = "py-2.5 text-[14px] text-gray-500 font-medium hover:text-gray-800 border-b-2 border-transparent";
            
            items.forEach(item => item.style.display = 'flex');
            
            if(items.length === 0) setNotifState('empty');
            else setNotifState('content');

        } else {
            tabUnread.className = "py-2.5 text-[14px] text-blue-600 font-bold border-b-2 border-blue-600";
            tabAll.className = "py-2.5 text-[14px] text-gray-500 font-medium hover:text-gray-800 border-b-2 border-transparent";

            let unreadExist = false;
            items.forEach(item => {
                if (item.classList.contains('is-unread')) {
                    item.style.display = 'flex';
                    unreadExist = true;
                } else {
                    item.style.display = 'none';
                }
            });

            if (!unreadExist) setNotifState('empty');
            else setNotifState('content');
        }
    }

    function openNotifDetail(index, el) {
        const tb = currentNotifs[index];
        
        document.getElementById('detail-title').textContent = tb.TieuDe;
        document.getElementById('detail-time').textContent = timeSince(tb.NgayTao);
        document.getElementById('detail-content').textContent = tb.NoiDung;

        document.getElementById('notif-list-view').style.display = 'none';
        document.getElementById('notif-header-main').style.display = 'none';
        document.getElementById('notif-detail-view').style.display = 'flex';

        // Nếu thông báo chưa đọc -> Gọi API update Database và xóa UI đỏ
        if (el.classList.contains('is-unread')) {
            // GỌI API LƯU XUỐNG DATABASE
            fetch(`/giangvien/api/thong-bao/read/${tb.MaThongBao}`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
            
            // Cập nhật lại mảng hiện tại
            tb.LoaiThongBao = 'đã đọc'; 

            el.classList.remove('is-unread');
            const dot = el.querySelector('.unread-dot');
            if (dot) dot.remove();
            
            const timeText = el.querySelector('.notif-time');
            if (timeText) {
                timeText.classList.remove('text-blue-600');
                timeText.classList.add('text-gray-500');
            }

            const badge = document.getElementById('notif-badge');
            let count = parseInt(badge.textContent) || 0;
            if (count > 0) {
                count--;
                if (count === 0) badge.style.display = 'none';
                else badge.textContent = count;
            }
        }
    }

    function markAllAsRead() {
        // GỌI API UPDATE TOÀN BỘ XUỐNG DATABASE
        fetch('/giangvien/api/thong-bao/read-all', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        }).then(res => res.json()).then(data => {
            if(data.success) {
                const badge = document.getElementById('notif-badge');
                if (badge) badge.style.display = 'none';
                currentUnreadCount = 0;

                // Update lại trạng thái mảng
                currentNotifs.forEach(tb => tb.LoaiThongBao = 'đã đọc');

                const items = document.querySelectorAll('.notif-item');
                items.forEach(item => {
                    item.classList.remove('is-unread');
                    const dot = item.querySelector('.unread-dot');
                    if(dot) dot.remove();
                    
                    const timeText = item.querySelector('.notif-time');
                    if(timeText) {
                        timeText.classList.remove('text-blue-600');
                        timeText.classList.add('text-gray-500');
                    }
                });

                const tabUnread = document.getElementById('tab-unread');
                if (tabUnread.classList.contains('text-blue-600')) {
                    switchNotifTab('unread'); // Nếu đang ở tab Chưa đọc, load lại để hiện empty
                }
            }
        });
    }

    function backToNotifList() {
        document.getElementById('notif-detail-view').style.display = 'none';
        document.getElementById('notif-list-view').style.display = 'block';
        document.getElementById('notif-header-main').style.display = 'flex';
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