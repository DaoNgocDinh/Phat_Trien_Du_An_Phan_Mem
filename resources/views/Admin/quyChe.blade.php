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


<bodydiv>
   @include('layout.navbar')
   @include('layout.sidebar')
   <div class="ml-64 p-6">

      <form class="max-w-md flex items-center">

         <label for="search" class="sr-only">Search</label>

         <div class="relative w-full">

            <input type="search" id="search" placeholder="Tìm tên quy chế"
               class="w-full bg-gray-200 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black" />

         </div>

      </form>
      <a href="#"
         class="mt-6 border bg-[#2c5d6e] py-1 shadow-lg w-48 flex items-center text-body rounded-base hover:bg-[#2c5d6e] hover:shadow-xl hover:border-[#3f7b8e]">
         <span class="text-white flex-1 ms-3 whitespace-nowrap">Đăng tải quy chế mới</span>
      </a>



      <div class="mt-4 relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
         <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead
               class="bg-[#EBF4F6] text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
               <tr>
                  <th scope="col" class="px-6 py-3 font-medium">
                     STT
                  </th>
                  <th scope="col" class="px-6 py-3 font-medium">
                     Tên quy chế
                  </th>
                  <th scope="col" class="px-6 py-3 font-medium">
                     Ngày ban hành
                  </th>
                  <th scope="col" class="px-6 py-3 font-medium">
                     Cấp
                  </th>
                  <th scope="col" class="px-6 py-3 font-medium">
                     Hành động
                  </th>
               </tr>
            </thead>
            <tbody class="divide-y">
               <tr class="bg-neutral-primary border-b border-default">
                  <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                     Apple MacBook Pro 17"
                  </th>
                  <td class="px-6 py-4">
                     Silver
                  </td>
                  <td class="px-6 py-4">
                     Laptop
                  </td>
                  <td class="px-6 py-4">
                     $2999
                  </td>
                  <td class="px-6 py-4">
                     <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                           class="size-8 p-1 rounded-full hover:bg-gray-200 text-blue-500 cursor-pointer">
                           <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                           <path fill-rule="evenodd"
                              d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                              clip-rule="evenodd" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                           class="size-8 p-1 rounded-full hover:bg-gray-200 text-yellow-500 cursor-pointer">
                           <path
                              d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                           stroke="currentColor"
                           class="size-8 p-1 rounded-full hover:bg-gray-200 text-red-500 cursor-pointer">
                           <path stroke-linecap="round" stroke-linejoin="round"
                              d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                     </div>
                  </td>
               </tr>
               <tr class="bg-neutral-primary border-b border-default">
                  <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                     Microsoft Surface Pro
                  </th>
                  <td class="px-6 py-4">
                     White
                  </td>
                  <td class="px-6 py-4">
                     Laptop PC
                  </td>
                  <td class="px-6 py-4">
                     $1999
                  </td>
                  <td class="px-6 py-4">
                     <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                           class="size-8 p-1 rounded-full hover:bg-gray-200 text-blue-500 cursor-pointer">
                           <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                           <path fill-rule="evenodd"
                              d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                              clip-rule="evenodd" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                           class="size-8 p-1 rounded-full hover:bg-gray-200 text-yellow-500 cursor-pointer">
                           <path
                              d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                           stroke="currentColor"
                           class="size-8 p-1 rounded-full hover:bg-gray-200 text-red-500 cursor-pointer">
                           <path stroke-linecap="round" stroke-linejoin="round"
                              d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                     </div>
                  </td>
               </tr>
               <tr class="bg-neutral-primary">
                  <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                     Magic Mouse 2
                  </th>
                  <td class="px-6 py-4">
                     Black
                  </td>
                  <td class="px-6 py-4">
                     Accessories
                  </td>
                  <td class="px-6 py-4">
                     $99
                  </td>
                  <td class="px-6 py-4">
                     <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                           class="size-8 p-1 rounded-full hover:bg-gray-200 text-blue-500 cursor-pointer">
                           <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                           <path fill-rule="evenodd"
                              d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                              clip-rule="evenodd" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                           class="size-8 p-1 rounded-full hover:bg-gray-200 text-yellow-500 cursor-pointer">
                           <path
                              d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                           stroke="currentColor"
                           class="size-8 p-1 rounded-full hover:bg-gray-200 text-red-500 cursor-pointer">
                           <path stroke-linecap="round" stroke-linejoin="round"
                              d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                     </div>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
      <div class="mt-6 flex items-center justify-between w-full">

         <p class="text-sm text-[#7AB2B2]">Hiển thị 10 quy chế</p>
         <div class="flex items-center gap-2">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="hover:bg-[#2c5d6e] hover:shadow-xl bg-[#7AB2B2] text-white size-6 cursor-pointer">
               <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>

            <div class="bg-[#7AB2B2] text-white w-7 h-7 flex items-center justify-center border border-white border-2">
               1
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="hover:bg-[#2c5d6e] hover:shadow-xl bg-[#7AB2B2] text-white size-6 cursor-pointer rotate-180">
               <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
         </div>
      </div>
   </div>
   </body>

</html>