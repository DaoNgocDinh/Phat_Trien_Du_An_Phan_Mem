@extends('layout.giangvien')

@section('title', 'Tìm kiếm và lọc')

@section('content')
    <div class="p-6">
        <div>
            <div class="bg-[#1D546D] text-white text-xl font-semibold px-7 py-3 rounded-md w-96 mb-6">
                Kết quả tìm kiếm
            </div>
            <form method="GET" action="{{ route('giangvien.search') }}">

                <input type="hidden" name="search" value="{{ request('search') }}">
                <select name="filter" onchange="this.form.submit()"
                    class="bg-gray-200 text-black px-3 py-2 rounded-md backdrop-blur-sm focus:outline-none">
                    <option value="">Tất cả</option>
                    <option value="Quy chế" {{ request('filter') == 'Quy chế' ? 'selected' : '' }}>Quy chế</option>
                    <option value="Công bố" {{ request('filter') == 'Công bố' ? 'selected' : '' }}>Công bố</option>
                    <option value="Đề tài" {{ request('filter') == 'Đề tài' ? 'selected' : '' }}>Đề tài</option>
                    <option value="Sự kiện" {{ request('filter') == 'Sự kiện' ? 'selected' : '' }}>Sự kiện</option>
                </select>
            </form>
        </div>

        <div>
            <div class="w-full mx-auto mt-6 grid gap-4">
                @foreach ($results as $item)
                    <!-- Card -->
                    <div onclick="goToCard('{{ $item->Loai }}', '{{ $item->Ma }}')"
                        class="group cursor-pointer rounded-lg overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-1 hover:shadow-lg">

                        <!-- Phần trên -->
                        <div class="bg-[#98D3D3] p-2 transition-colors duration-300 group-hover:bg-[#76bcbc]">
                            <h3
                                class="text-black text-lg font-semibold transition-colors duration-300 group-hover:text-black/90">
                                {{ $item->Loai }}
                            </h3>
                        </div>

                        <!-- Phần dưới -->
                        <div class="bg-gray-100 p-1 transition-colors duration-300 group-hover:bg-gray-200">
                            <p class="text-gray-600 text-sm transition-colors duration-300 group-hover:text-gray-800">
                                {{ $item->Ten }}
                            </p>
                        </div>

                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $results->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
<script>
    function goToCard(type, id) {
        switch (type) {
            case 'Quy chế':
                window.location.href = '/giangvien/quyche/' + id;
                break;
            case 'Công bố':
                window.location.href = '/giangvien/cong-bo/';
                break;
            case 'Đề tài':
                window.location.href = '/giangvien/de-tai';
                break;
            case 'Sự kiện':
                window.location.href = '/giangvien/su-kien';
                break;
            default:
                break;
        }
    }
</script>