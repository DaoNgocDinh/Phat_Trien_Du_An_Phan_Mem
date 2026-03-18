<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Đề xuất thêm đề tài nghiên cứu khoa học</title>
</head>

<body>
    <div>
        @include('layout.navbar')
        @include('layout.sidebar')

        <div class="ml-64 p-6 flex">
            <button type="submit"
                class="text-xl flex gap-2 text-white bg-[#2c5d6e] px-4 py-2 rounded-md hover:bg-[#3f7b8e] hover:shadow-xl hover:border-gray-600">
                Đề xuất đề tài
            </button>
            <div class="w-12 h-12 bg-blue-500 rounded-full"></div>
        </div>

        
    </div>
</body>

</html>