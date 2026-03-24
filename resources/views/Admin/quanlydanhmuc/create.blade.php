<form action="{{ route('admin.danhmuc.store') }}" method="POST" onsubmit="return validateCreate()">
    @csrf

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
                name="ten_loai"
                type="text"
                value="{{ old('ten_loai') }}"
                placeholder="Nhập thông tin ..."
                class="bg-[#F3F4F4] w-full border rounded px-3 py-1 mb-2
                @error('ten_loai') border-red-500 @enderror">

            @error('ten_loai')
            <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
            @enderror

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
@if ($errors->any())
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