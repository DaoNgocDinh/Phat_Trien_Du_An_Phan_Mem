<?php
?>
<!DOCTYPE html>
<html lang="vi">

<head>
<meta charset="UTF-8">
<title>Quy chế khoa học</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<nav class="relative bg-black after:pointer-events-none after:absolute after:inset-x-0 after:bottom-0 after:h-px after:bg-white/10">
  <div class="mx-auto px-2">
    <div class="relativ flex h-16 items-center justify-between">
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <a href="#" aria-current="page" class="text-white underline active:text-blue-500 active:scale-95 hover:text-gray-400">Đăng xuất</a>
          </div>
        </div>
      </div>

      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <button type="button" class="relative rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
            <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>

        <!-- Profile dropdown -->
        <el-dropdown class="relative ml-3">
          <button class="relative flex rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-8 rounded-full bg-gray-800 outline -outline-offset-1 outline-white/10" />
            <a class = "text-white absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 active:text-blue-500 active:scale-95 hover:text-gray-400">Full name</a>
          </button>
      </div>
    </div>
  </div>
</nav>

<body>

<aside id="default-sidebar" class=" bg-[#1D546D] fixed top-18 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-neutral-primary-soft border-e border-default">
      <ul class="space-y-2 font-medium">
          <div class="bg-white rounded-md flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
            <input name="search" aria-label="Search" class="border-none outline-none bg-white adfp adfq adfw adgj adgx adhg adho adhs adhu adhv adib adie adig adii adin adiy adja adjc adjp">
            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="adfj adfp adfq adft adgb adgv adhz">
              <path d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z" clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>
          </div>
         <li>
            <a href="#" class="border rounded-md border-gray-600 p-2 shadow-lg flex items-center px-2 py-1.5 text-body rounded-base hover:bg-[#2c5d6e] hover:shadow-xl hover:scale-[1.03] hover:border-[#3f7b8e]">
               <i class="text-white fa fa-home"></i>
               <span class="text-white flex-1 ms-3 whitespace-nowrap">Trang chủ</span>
            </a>
         </li>
         <li>
            <a href="#" class="border rounded-md border-gray-600 p-2 shadow-lg flex items-center px-2 py-1.5 text-body rounded-base hover:bg-[#2c5d6e] hover:shadow-xl hover:scale-[1.03] hover:border-[#3f7b8e]">
               <i class="text-white fa fa-file"></i>
               <span class="text-white flex-1 ms-3 whitespace-nowrap">Đề tài nghiên cứu</span>
            </a>
         </li>
         <li>
            <a href="#" class="border rounded-md border-gray-600 p-2 shadow-lg flex items-center px-2 py-1.5 text-body rounded-base hover:bg-[#2c5d6e] hover:shadow-xl hover:scale-[1.03] hover:border-[#3f7b8e]">
               <i class="text-white fa fa-pen"></i>
               <span class="text-white flex-1 ms-3 whitespace-nowrap">Quy chế khoa học</span>
            </a>
         </li>
         <li>
            <a href="#" class="border rounded-md border-gray-600 p-2 shadow-lg flex items-center px-2 py-1.5 text-body rounded-base hover:bg-[#2c5d6e] hover:shadow-xl hover:scale-[1.03] hover:border-[#3f7b8e]">
               <i class="text-white fa fa-book"></i>
               <span class="text-white flex-1 ms-3 whitespace-nowrap">Công bố khoa học</span>
            </a>
         </li>
         <li>
            <a href="#" class="border rounded-md border-gray-600 p-2 shadow-lg flex items-center px-2 py-1.5 text-body rounded-base hover:bg-[#2c5d6e] hover:shadow-xl hover:scale-[1.03] hover:border-[#3f7b8e]">
               <i class="text-white fa fa-bars"></i>
                <span class="text-white flex-1 ms-3 whitespace-nowrap">Hoạt động khoa học</span>
            </a>
         </li>
         <li>
            <a href="#" class="border rounded-md border-gray-600 p-2 shadow-lg flex items-center px-2 py-1.5 text-body rounded-base hover:bg-[#2c5d6e] hover:shadow-xl hover:scale-[1.03] hover:border-[#3f7b8e]">
               <i class="text-white fa fa-calendar"></i>
                <span class="text-white flex-1 ms-3 whitespace-nowrap">Sự kiện</span>
            </a>
         </li>
         <li>
            <a href="#" class="border rounded-md border-gray-600 p-2 shadow-lg flex items-center px-2 py-1.5 text-body rounded-base hover:bg-[#2c5d6e] hover:shadow-xl hover:scale-[1.03] hover:border-[#3f7b8e]">
               <i class="text-white fa fa-envelope"></i>
                <span class="text-white flex-1 ms-3 whitespace-nowrap">Liện hệ</span>
            </a>
         </li>
         <li>
            <a href="#" class="border rounded-md border-gray-600 p-2 shadow-lg flex items-center px-2 py-1.5 text-body rounded-base hover:bg-[#2c5d6e] hover:shadow-xl hover:scale-[1.03] hover:border-[#3f7b8e]">
               <i class="text-white fa fa-user"></i>
                <span class="text-white flex-1 ms-3 whitespace-nowrap">Thông tin cá nhân</span>
            </a>
         </li>
      </ul>
   </div>
</aside>

</body>

</html>