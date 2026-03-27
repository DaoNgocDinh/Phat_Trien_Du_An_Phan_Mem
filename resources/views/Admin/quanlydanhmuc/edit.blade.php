<div id="formEdit"
    class="hidden bg-[#EBF4F6] border border-black rounded-xl shadow-md w-full max-w-md mx-auto">

    <!-- Header -->
    <div class="border-b border-gray-200 px-6 py-4 font-semibold text-gray-700">
        Chỉnh sửa danh mục
    </div>

    <!-- Body -->
    <div class="px-6 py-6">

        <label class="block text-sm font-medium text-gray-600 mb-2">
            Loại đề tài
        </label>

        <form method="POST" id="formUpdate" onsubmit="return validateEdit()">
            @csrf
            @method('PUT')
            <input type="hidden" name="type" value="{{ $type }}">

            <input type="hidden" id="editId" name="id">
            <input type="hidden" name="form_type" value="edit">

            <input
                id="editInput"
                name="{{ $type == 'loai' ? 'ten_loai' : 'ten_don_vi' }}"
                type="text"
                value="{{ old($type == 'loai' ? 'ten_loai' : 'ten_don_vi') }}"
                class="w-full border rounded-lg px-4 py-2 mb-2 
   @if(session('form_type') == 'edit' && $errors->has($type == 'loai' ? 'ten_loai' : 'ten_don_vi'))
    border-red-500
@endif">

            @if(session('form_type') == 'edit')
            @error($type == 'loai' ? 'ten_loai' : 'ten_don_vi')
            <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
            @enderror
            @endif

            <!-- Buttons -->
            <div class="flex justify-end gap-3">
                <button type="button"
                    onclick="huyEdit()"
                    class="px-5 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm">
                    Hủy
                </button>

                <button type="submit"
                    class="px-5 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-sm">
                    Cập nhật
                </button>
            </div>

        </form>

    </div>
</div>

@if (session('form_type') == 'edit' && $errors->any())
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formEdit").classList.remove("hidden");

        let id = "{{ old('id') }}";
        if (id) {
            document.getElementById("formUpdate").action = "/admin/danhmuc/update/" + id;
            document.getElementById("editId").value = id;
        }
    });
</script>
@endif

<script>
    function validateEdit() {
        let input = document.getElementById("editInput");
        let value = input.value.trim();

        if (value === "") {
            alert("Không được để trống!");
            input.focus();
            return false;
        }

        if (value.length > 255) {
            alert("Tên quá dài!");
            return false;
        }

        return true;
    }
</script>