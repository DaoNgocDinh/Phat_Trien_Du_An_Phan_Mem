<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Gửi yêu cầu liên hệ</title>
</head>

<body>
    <div>
        @include('layout.navbar')
        @include('layout.sidebar')


        <div class="ml-64">
            <lable class="text-2xl justify-center p-6 mx-auto flex">Gửi yêu cầu liên hệ</lable>
            <div class="px-2 py-4 ml-20">
                <lable class="block mb-1">Họ và tên</lable>
                <input type="text" name="name" id="name"
                    class="w-[800px] bg-white px-3 py-2 border border-black focus:outline-none focus:ring-2 focus:ring-black" />
            </div>
            <div class="px-2 py-4 ml-20">
                <lable class="block mb-1">Email</lable>
                <input type="text" name="email" id="email"
                    class="w-[800px] bg-white px-3 py-2 border border-black focus:outline-none focus:ring-2 focus:ring-black" />
            </div>
            <div class="px-2 py-4 ml-20">
                <lable class="block mb-1">Chủ đề</lable>
                <input type="text" name="subject" id="subject"
                    class="w-[800px] bg-white px-3 py-2 border border-black focus:outline-none focus:ring-2 focus:ring-black" />
            </div>
            <div class="px-2 py-4 ml-20">
                <lable class="block mb-1">Nội dung</lable>
                <textarea name="message" id="message"
                    class="w-[800px] bg-white px-3 py-2 border border-black focus:outline-none focus:ring-2 focus:ring-black"></textarea>
            </div>
            <form action="#" class="px-2 py-4 flex justify-center items-center gap-10">
                <button type="submit"
                    class="flex gap-2 text-black bg-gray-400 px-4 py-2 rounded hover:bg-gray-500 hover:shadow-xl hover:border-gray-600"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                    Hủy</button>
                <button type="submit"
                    class="flex gap-2 text-black bg-[#2c5d6e] px-4 py-2 rounded hover:bg-[#3f7b8e] hover:shadow-xl hover:border-gray-600"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                    Gửi
                </button>
            </form>
        </div>
    </div>
</body>

</html>