@extends('layout.admin')
@section('title', 'Báo cáo - Thống kê')
    <div class="ml-64 p-8">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <div class="bg-[#1D546D] text-white px-6 py-2 rounded font-semibold">
                Báo cáo - Thống kê
            </div>
        </div>

        <!-- FILTER -->
        <form method="GET" action="{{ route('admin.congbo.baocao') }}" class="bg-white p-6 rounded shadow mb-6">

            <h3 class="font-semibold mb-4">Bộ lọc</h3>

            <div class="grid grid-cols-4 gap-4">

                <div>
                    <label class="text-sm block mb-1">Từ năm</label>
                    <input type="number" name="from" value="{{ request('from') }}"
                        class="w-full border p-2 rounded">
                </div>

                <div>
                    <label class="text-sm block mb-1">Đến năm</label>
                    <input type="number" name="to" value="{{ request('to') }}"
                        class="w-full border p-2 rounded">
                </div>

                <div class="flex items-end">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded w-full">
                        Lọc dữ liệu
                    </button>
                </div>

            </div>
        </form>

        <!-- TỔNG -->
        <div class="bg-white p-4 rounded shadow mb-6">
            <p class="text-xl font-bold">
                Tổng số công bố: {{ $byYear->sum('total') }}
            </p>
        </div>

        <!-- CHART -->
        <div class="grid grid-cols-2 gap-6">

            <!-- BAR -->
            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-semibold mb-4">Công bố theo năm</h3>
                <div class="h-[300px]">
                    <canvas id="barChart"></canvas>
                </div>
            </div>

            <!-- PIE -->
            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-semibold mb-4">Theo loại công bố</h3>
                <div class="h-[300px]">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>

        </div>

        <!-- TABLE -->
        <div class="bg-white p-6 rounded shadow mt-6">

            <h3 class="font-semibold mb-4">Bảng thống kê</h3>

            <table class="w-full border text-sm text-center">

                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2 border">Năm</th>
                        <th class="p-2 border">Số lượng</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($byYear as $item)
                        <tr>
                            <td class="border p-2">{{ $item->NamCongBo }}</td>
                            <td class="border p-2">{{ $item->total }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>

    <!-- CHART SCRIPT -->
    <script>
        // BAR CHART
        const yearLabels = @json($byYear->pluck('NamCongBo'));
        const yearData = @json($byYear->pluck('total'));

        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: yearLabels,
                datasets: [{
                    label: 'Số công bố',
                    data: yearData
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });


        // PIE CHART
        const typeLabels = @json($byType->pluck('LoaiCongBo'));
        const typeData = @json($byType->pluck('total'));

        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: typeLabels,
                datasets: [{
                    data: typeData
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
