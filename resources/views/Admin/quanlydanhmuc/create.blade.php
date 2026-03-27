<form action="{{ route('admin.danhmuc.store') }}" method="POST" onsubmit="return validateCreate()">
    @csrf
    <input type="hidden" name="type" value="{{ $type }}">
    <input type="hidden" name="form_type" value="create">

    <div id="popupForm" class="hidden bg-[#EBF4F6] border border-black rounded-lg w-full h-full">

        <div class="border-b border-black px-4 py-2 font-semibold text-black">
            Thêm danh mục mới
        </div>

        <div class="p-4">

            <label class="block text-sm text-black mb-2">
                Loại đề tài
            </label>

            <input
                id="tenDanhMuc"
                name="{{ $type == 'loai' ? 'ten_loai' : 'ten_don_vi' }}"
                type="text"
                value="{{ old('ten_loai') ?? old('ten_don_vi') }}"
                placeholder="Nhập thông tin ..."
                class="bg-[#F3F4F4] w-full border rounded px-3 py-1 mb-2
@if(session('form_type') == 'create' && $errors->has($type == 'loai' ? 'ten_loai' : 'ten_don_vi')) border-red-500 @endif">
            @if(session('form_type') == 'create')
            @error($type == 'loai' ? 'ten_loai' : 'ten_don_vi')
            <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
            @enderror
            @endif
            <div class="flex justify-center gap-4">

                <button type="submit"
                    class="bg-[#1D546D] text-white px-6 py-1 rounded">
                    Lưu
                </button>

                <button type="button" onclick="huyForm()"
                    class="bg-gray-300 px-6 py-1 rounded">
                    Hủy
                </button>

            </div>

        </div>

    </div>
</form>
@if (session('form_type') == 'create' && $errors->any())
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("popupForm").classList.remove("hidden");
    });
</script>
@endif

<script>
    function validateCreate() {
        let input = document.getElementById("tenDanhMuc");
        let value = input.value.trim();

        if (value === "") {
            alert("Không được để trống!");
            return false;
        }

        if (value.length > 255) {
            alert("Tên quá dài!");
            return false;
        }

        return true;
    }
</script>