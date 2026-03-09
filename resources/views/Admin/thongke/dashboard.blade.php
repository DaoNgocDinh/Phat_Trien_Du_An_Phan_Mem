<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Báo cáo thống kê</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="bg-white">

    @include('layout.navbar')
    @include('layout.sidebar')
    @include('layout.popup_report')

    <div class="ml-64 p-8">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">

            <div class="bg-[#1D546D] text-white px-6 py-2 rounded font-semibold">
                Báo cáo - Thống kê
            </div>

            <button onclick="openModal()" class="bg-[#3498DB] text-white px-4 py-2 rounded flex items-center gap-2">
                <i class="fa-solid fa-file-export"></i>
                Xuất báo cáo
            </button>

        </div>


        <p class="text-sm text-black mb-4">
            Chọn các tiêu chí để lọc và xem báo cáo thống kê
        </p>


        <div class="bg-[#EBF4F6] p-6 rounded-lg">

            <div class="grid grid-cols-2 gap-3">

                <!-- FILTER -->
                <div class="space-y-4">

                    <h3 class="font-semibold">Bộ lọc báo cáo</h3>

                    <div>
                        <label class="text-sm block mb-1">Thời gian</label>

                        <div class="flex gap-5">
                            <input type="date" class="bg-[#F3F4F4] border p-2 rounded w-full">
                            <input type="date" class="bg-[#F3F4F4] border p-2 rounded w-full">
                        </div>
                    </div>

                    <div>
                        <label class="text-sm block mb-1">Loại dữ liệu</label>

                        <select class="bg-[#F3F4F4] border p-2 rounded w-full">
                            <option>Công bố khoa học</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm block mb-1">Khoa</label>

                        <select class="bg-[#F3F4F4] border p-2 rounded w-full">
                            <option>Công nghệ thông tin</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm block mb-1">Giảng viên</label>

                        <select class="bg-[#F3F4F4] border p-2 rounded w-full">
                            <option>Tất cả</option>
                        </select>
                    </div>

                    <button
                        class="bg-[#3498DB] text-white px-8 py-4 rounded-md mt-10 flex items-center justify-center gap-2 mx-auto hover:bg-[#2c80b4]">
                        Tạo báo cáo
                    </button>

                </div>


                <!-- CHART -->
                <div class="bg-white p-4 rounded-md shadow-sm ">

                    <div class="flex justify-between border-b pb-3 border-gray-300 mb-10">

                        <p class="text-2xl font-bold">
                            Tổng số công bố khoa học
                        </p>

                        <div class="flex items-center gap-2">
                            <i class="fa fa-chart-bar"></i>
                            <span class="font-bold">120</span>
                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-8 items-start">
                        <div>
                            <p class="text-sm mb-2">Số lượng công bố khoa học theo năm</p>
                            <div class="h-[330px]">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>

                        <div class="flex flex-col items-center">
                            <p class="text-sm mb-3">Tỷ lệ công bố khoa học</p>
                            <div class="max-w-[390px] max-h-[390px]">
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>

                    </div>

                </div>

            </div>


            <!-- TABLE -->
            <div class="">

                <h3 class="font-bold mb-5">
                    Bảng dữ liệu thống kê
                </h3>

                <table class="w-full border border-gray-400 text-sm">

                    <thead class="bg-gray-300">
                        <tr>
                            <th class="border border-black p-2 text-left">Khoa</th>
                            <th class="border border-black p-2 text-left">Loại công bố</th>
                            <th class="border border-black p-2 text-left">Số lượng</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">

                        <tr>
                            <td class="border border-black p-2" rowspan="3">Công nghệ thông tin</td>
                            <td class="border border-black p-2">ISI</td>
                            <td class="border border-black p-2">12</td>
                        </tr>

                        <tr>
                            <td class="border border-black p-2">Bài báo</td>
                            <td class="border border-black p-2">20</td>
                        </tr>

                        <tr>
                            <td class="border border-black p-2">Hội thảo</td>
                            <td class="border border-black p-2">88</td>
                        </tr>

                        <tr class="font-semibold bg-gray-200">
                            <td class="border border-black p-2 font-bold" colspan="2">Tổng</td>
                            <td class="border border-black p-2 font-bold">120</td>
                        </tr>

                    </tbody>
                </table>

            </div>

        </div>

    </div>


    <script>
            // Hiển thị biểu đồ
        new Chart(document.getElementById('barChart'), {

            type: 'bar',

            data: {
                labels: ['2021', '2022', '2023', '2024'],
                datasets: [{
                    label: 'Công bố',
                    data: [24, 30, 36, 45],
                    backgroundColor: '#4C7EBB'
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false
            }

        })


        new Chart(document.getElementById('pieChart'), {

            type: 'pie',

            data: {
                labels: ['ISI', 'Bài báo', 'Hội thảo'],
                datasets: [{
                    data: [15, 10, 75],
                    backgroundColor: ['#4A90E2', '#5DA5DA', '#E29B32']
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false
            }

        })



            // popup báo cáo
        function openModal() {
            document.getElementById("reportModal").classList.remove("hidden")
        }

        function closeModal() {
            document.getElementById("reportModal").classList.add("hidden")
        }



    </script>


</body>

</html>