@extends('layout.admin')
@section('title', 'Báo cáo - Thống kê')

@section('content')
    @include('layout.popup_report')

    <div class="ml-64 p-8 pt-20 sm:ml-0">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">

            <div class="bg-[#1D546D] text-white px-6 py-2 rounded font-semibold">
                Báo cáo - Thống kê
            </div>

            <a href="{{ route('admin.congbo.baocao.show') }}"
                class="bg-[#3498DB] text-white px-4 py-2 rounded flex items-center gap-2">
                <i class="fa-solid fa-file-export"></i>
                Tạo báo cáo
            </a>

        </div>

        <p class="text-sm text-black mb-4">
            Chọn các tiêu chí để lọc và xem báo cáo thống kê
        </p>

        <div class="bg-[#EBF4F6] p-6 rounded-lg">

            <div class="grid grid-cols-2 gap-6 items-start">

                <!-- FILTER -->
                <div class="space-y-4 bg-white p-4 rounded-md shadow-sm">
                    <h3 class="font-semibold">Bộ lọc báo cáo</h3>

                    <form method="GET" action="{{ route('admin.congbo.baocao') }}" class="space-y-4 flex flex-col">

                        <div>
                            <label class="text-sm block mb-1">Thời gian</label>
                            <div class="flex gap-2">
                                <input type="date" name="from" value="{{ request('from') }}"
                                    class="bg-[#F3F4F4] border p-2 rounded w-full">

                                <input type="date" name="to" value="{{ request('to') }}"
                                    class="bg-[#F3F4F4] border p-2 rounded w-full">
                            </div>
                        </div>

                        <div>
                            <label class="text-sm block mb-1">Loại dữ liệu</label>
                            <select name="loai" class="bg-[#F3F4F4] border p-2 rounded w-full">
                                <option value="">Tất cả</option>
                                @if(isset($loaiOptions))
                                    @foreach($loaiOptions as $option)
                                        <option value="{{ $option }}" {{ request('loai') == $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div>
                            <label class="text-sm block mb-1">Khoa</label>
                            <select name="khoa" class="bg-[#F3F4F4] border p-2 rounded w-full">
                                <option value="">Tất cả</option>
                                @if(isset($khoas))
                                    @foreach($khoas as $k)
                                        <option value="{{ $k->MaKhoa }}" {{ request('khoa') == $k->MaKhoa ? 'selected' : '' }}>
                                            {{ $k->TenKhoa }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div>
                            <label class="text-sm block mb-1">Giảng viên</label>
                            <select name="giangvien" class="bg-[#F3F4F4] border p-2 rounded w-full">
                                <option value="">Tất cả</option>
                                @if(isset($giangviens))
                                    @foreach($giangviens as $gv)
                                        <option value="{{ $gv->MaGiangVien }}" {{ request('giangvien') == $gv->MaGiangVien ? 'selected' : '' }}>
                                            {{ $gv->HoTen }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <!-- NÚT CĂN GIỮA -->
                        <button type="submit"
                            class="bg-[#3498DB] text-white px-6 py-2 rounded-md mt-4 mx-auto block hover:bg-[#2c80b4] transition">
                            Xem báo cáo
                        </button>

                    </form>
                </div>

                <!-- CHART -->
                <div class="bg-white p-4 rounded-md shadow-sm py-7">

                    <div class="flex justify-between border-b pb-3 border-gray-300 mb-6">

                        <p class="text-xl font-bold">
                            Tổng số công bố khoa học
                        </p>

                        <div class="flex items-center gap-2">
                            <i class="fa fa-chart-bar"></i>
                            <span class="font-bold">{{ $total ?? 0 }}</span>
                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-6 items-start">

                        <!-- BAR -->
                        <div>
                            <p class="text-sm mb-2">Số lượng công bố khoa học theo năm</p>
                            <div class="h-[280px]">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>

                        <!-- PIE -->
                        <div class="flex flex-col items-center justify-center">
                            <p class="text-sm mb-3">Tỷ lệ công bố khoa học</p>
                            <div class="max-w-[300px] max-h-[300px]">
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- TABLE -->
            <div class="mt-6">
                <div class="bg-white p-4 rounded-md shadow-sm">
                    <h3 class="font-bold mb-5">Bảng dữ liệu thống kê</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-400 text-sm table-auto">
                            <thead class="bg-gray-300">
                                <tr>
                                    <th class="border border-black p-3 text-left font-semibold">Khoa</th>
                                    <th class="border border-black p-3 text-left font-semibold">Loại công bố</th>
                                    <th class="border border-black p-3 text-left font-semibold">Số lượng</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @if(isset($byKhoaLoai) && $byKhoaLoai->count() > 0)
                                    @php
                                        $groupedData = collect($byKhoaLoai)->groupBy('TenKhoa');
                                    @endphp
                                    @foreach($groupedData as $khoaName => $items)
                                        @foreach($items as $index => $row)
                                            <tr class="hover:bg-gray-50">
                                                @if($index === 0)
                                                    <td class="border border-black p-3 font-medium" rowspan="{{ count($items) }}">
                                                        {{ $khoaName ?? 'Chưa xác định' }}
                                                    </td>
                                                @endif
                                                <td class="border border-black p-3">
                                                    {{ $row->LoaiCongBo ?? 'N/A' }}
                                                </td>
                                                <td class="border border-black p-3 text-center">
                                                    {{ $row->total ?? 0 }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="border border-black p-3 text-center text-gray-500">
                                            Không có dữ liệu thống kê
                                        </td>
                                    </tr>
                                @endif
                                <tr class="font-semibold bg-gray-200">
                                    <td class="border border-black p-3 font-bold" colspan="2">Tổng cộng</td>
                                    <td class="border border-black p-3 font-bold text-center">{{ $total ?? 0 }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- CHART -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // Dữ liệu biểu đồ từ PHP
            const yearData = @json($byYear ?? []);
            const typeData = @json($byType ?? []);

            // Chuẩn bị dữ liệu cho biểu đồ cột (theo năm)
            const barLabels = yearData.map(item => item.NamXuatBan);
            const barData = yearData.map(item => item.total);

            // Chuẩn bị dữ liệu cho biểu đồ tròn (theo loại)
            const pieLabels = typeData.map(item => item.LoaiCongBo);
            const pieData = typeData.map(item => item.total);

            new Chart(document.getElementById('barChart'), {
                type: 'bar',
                data: {
                    labels: barLabels,
                    datasets: [{
                        label: 'Công bố',
                        data: barData,
                        backgroundColor: '#4C7EBB'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            new Chart(document.getElementById('pieChart'), {
                type: 'pie',
                data: {
                    labels: pieLabels,
                    datasets: [{
                        data: pieData,
                        backgroundColor: ['#4A90E2', '#5DA5DA', '#E29B32', '#F5A623', '#7ED321']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            function openModal() {
                // Lấy giá trị từ form lọc
                const from = document.querySelector('input[name="from"]').value;
                const to = document.querySelector('input[name="to"]').value;

                // Set hidden inputs
                document.getElementById('exportFrom').value = from;
                document.getElementById('exportTo').value = to;

                document.getElementById("reportModal").classList.remove("hidden")
            }

            function closeModal() {
                document.getElementById("reportModal").classList.add("hidden")
            }
        </script>


@endsection