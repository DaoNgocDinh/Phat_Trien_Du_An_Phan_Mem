<nav class="fixed top-0 left-0 right-0 z-50 bg-[#071E28] border-b border-[#2c5d6e] shadow-sm">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">

            <!-- Nút Đăng xuất -->
            <a href="{{ route('logout') }}"
                class="hidden sm:flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600/90 hover:bg-red-700 rounded-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500/50">
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

                    <button type="button" onclick="toggleThongBao()" class="btn btn-ghost btn-circle relative hover:bg-white/20 transition-colors">
                        <i class="fas fa-bell text-xl text-[#F9A826]"></i>
                        @if($soThongBaoMoi > 0)
                            <span id="notif-badge" class="absolute top-1 right-2 inline-flex items-center justify-center w-4 h-4 text-[10px] font-bold text-white bg-red-500 rounded-full border-2 border-[#1D546D] transition-all duration-300">
                                {{ $soThongBaoMoi }}
                            </span>
                        @endif
                    </button>

                    <div id="thongBaoMenu" class="hidden absolute right-0 mt-3 w-[400px] bg-white rounded-2xl shadow-2xl border border-gray-100 z-50 flex-col overflow-hidden transition-all origin-top-right">
                        
                        <div class="px-5 pt-5 pb-3 flex justify-between items-end" id="notif-header-main">
                            <h3 class="text-2xl font-extrabold text-gray-900 tracking-tight">Thông báo</h3>
                            <button onclick="markAllAsRead()" class="text-[13px] text-blue-600 font-medium hover:text-blue-800 transition">
                                Đánh dấu tất cả đã đọc
                            </button>
                        </div>

                        <div id="notif-list-view" class="block">
                            <div class="px-5 flex gap-6 border-b border-gray-200">
                                <button id="tab-all" onclick="switchNotifTab('all')" class="pb-3 text-[15px] text-blue-600 font-semibold border-b-2 border-blue-600 transition-all">
                                    Tất cả
                                </button>
                                <button id="tab-unread" onclick="switchNotifTab('unread')" class="pb-3 text-[15px] text-gray-500 font-medium hover:text-gray-800 border-b-2 border-transparent transition-all">
                                    Chưa đọc
                                </button>
                            </div>
                            
                            <div class="max-h-[60vh] overflow-y-auto bg-white" id="notif-list-container">
                                @forelse($danhSachThongBao as $tb)
                                    @php $isNew = $loop->iteration <= $soThongBaoMoi; @endphp
                                    
                                    <a href="javascript:void(0)" 
                                    data-title="{{ $tb->TieuDe }}"
                                    data-content="{{ $tb->NoiDung }}"
                                    data-time="{{ \Carbon\Carbon::parse($tb->NgayTao)->format('H:i - d/m/Y') }}"
                                    onclick="openNotifDetail(this)"
                                    class="notif-item {{ $isNew ? 'is-unread' : '' }} flex items-start gap-4 p-4 border-b border-gray-50 hover:bg-gray-50 transition relative group">
                                        
                                        <div class="w-12 h-12 rounded-full bg-blue-50 flex-shrink-0 flex items-center justify-center overflow-hidden border border-gray-100">
                                            <img src="https://ui-avatars.com/api/?name=HT&background=EBF4F6&color=1D546D" alt="Avatar" class="w-full h-full object-cover">
                                        </div>
                                        
                                        <div class="flex-1 min-w-0">
                                            <p class="text-[14px] text-gray-800 leading-snug">
                                                <span class="font-bold text-gray-900">Hệ thống</span> 
                                                đã gửi một thông báo: <span class="font-bold text-gray-900">{{ $tb->TieuDe }}</span>.
                                            </p>
                                            <p class="notif-time text-[13px] mt-1.5 font-semibold {{ $isNew ? 'text-blue-600' : 'text-gray-500' }} transition-colors">
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

                                <div id="empty-unread-msg" class="hidden text-center py-10 flex-col items-center">
                                    <i class="far fa-check-circle text-4xl text-green-400 mb-3"></i>
                                    <p class="text-gray-500 font-medium">Bạn đã đọc hết tất cả thông báo!</p>
                                </div>
                            </div>
                        </div>

                        <div id="notif-detail-view" class="hidden flex-col">
                            <div class="px-5 py-3 border-b border-gray-100 flex items-center gap-3 bg-gray-50/80">
                                <button onclick="backToNotifList()" class="btn btn-sm btn-circle btn-ghost text-gray-500 hover:text-[#1D546D] hover:bg-gray-200">
                                    <i class="fas fa-arrow-left"></i>
                                </button>
                                <span class="font-bold text-[#1D546D] text-[15px]">Chi tiết thông báo</span>
                            </div>
                            
                            <div class="p-6 max-h-[60vh] overflow-y-auto">
                                <h4 id="detail-title" class="text-lg font-bold text-gray-900 mb-2 leading-snug"></h4>
                                <p class="text-xs text-gray-500 font-medium mb-5 flex items-center gap-1.5">
                                    <i class="far fa-clock"></i> <span id="detail-time"></span>
                                </p>
                                <div id="detail-content" class="text-[14.5px] text-gray-700 whitespace-pre-wrap leading-relaxed">
                                </div>
                            </div>
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
</nav>
<script>
    // 1. Logic bật/tắt menu thông báo
    function toggleThongBao() {
        const menu = document.getElementById('thongBaoMenu');
        menu.classList.toggle('hidden');
    }

    document.addEventListener('click', function(event) {
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
            if(unreadCount === 0) {
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
    // (Giữ nguyên các hàm toggleThongBao(), switchNotifTab() và markAllAsRead() mà bạn đã có)

    // Hàm mở nội dung chi tiết thông báo
    function openNotifDetail(element) {
        // Lấy dữ liệu đã gài sẵn trong thẻ <a>
        const title = element.getAttribute('data-title');
        const content = element.getAttribute('data-content');
        const time = element.getAttribute('data-time');

        // Điền dữ liệu vào Màn hình chi tiết
        document.getElementById('detail-title').innerText = title;
        document.getElementById('detail-time').innerText = time;
        document.getElementById('detail-content').innerText = content;

        // Ẩn màn hình Danh sách, Hiện màn hình Chi tiết
        document.getElementById('notif-list-view').classList.add('hidden');
        document.getElementById('notif-header-main').classList.add('hidden');
        
        document.getElementById('notif-detail-view').classList.remove('hidden');
        document.getElementById('notif-detail-view').classList.add('flex');

        // NGHỆ THUẬT: Tự động đánh dấu "Đã đọc" khi click xem
        if (element.classList.contains('is-unread')) {
            element.classList.remove('is-unread'); // Xóa class chưa đọc
            
            // Chuyển màu thời gian từ Xanh sang Xám
            const timeText = element.querySelector('.notif-time');
            if (timeText) {
                timeText.classList.remove('text-blue-600');
                timeText.classList.add('text-gray-500');
            }
            
            // Xóa chấm xanh báo hiệu
            const dot = element.querySelector('.unread-dot');
            if (dot) {
                dot.style.opacity = '0';
                setTimeout(() => dot.style.display = 'none', 300);
            }

            // Tự động trừ đi 1 số trên Badge chuông đỏ
            const badge = document.getElementById('notif-badge');
            if (badge) {
                let currentCount = parseInt(badge.innerText);
                if (!isNaN(currentCount) && currentCount > 0) {
                    currentCount--;
                    if (currentCount === 0) {
                        badge.style.opacity = '0';
                        setTimeout(() => badge.style.display = 'none', 300);
                    } else {
                        badge.innerText = currentCount;
                    }
                }
            }
        }
    }

    // Hàm ấn nút mũi tên quay lại Danh sách
    function backToNotifList() {
        document.getElementById('notif-detail-view').classList.add('hidden');
        document.getElementById('notif-detail-view').classList.remove('flex');
        
        document.getElementById('notif-list-view').classList.remove('hidden');
        document.getElementById('notif-header-main').classList.remove('hidden');
        document.getElementById('notif-header-main').classList.add('flex');
    }
</script>