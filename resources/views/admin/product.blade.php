@extends("admin.layouts_admin.layout_admin_")

@section('linkcss')
<style>
  .img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border: 1px solid slategray;
    border-radius: 4px;
  }

  .img-wapper {
    position: relative;
    display: inline-block;
    cursor: pointer;
  }

  .btn-close {
    position: absolute;
    top: 0%;
    right: 0%;
    width: 18px;
    height: 18px;
    border: none;
    background-color: red;
    color: white;
    font-size: 12px;
    font-weight: bold;
    line-height: 18px;
    text-align: center;
    display: none;
    cursor: pointer;
  }

  .img-wapper:hover .btn-close {
    display: block;
  }

  #container_inP {
    display: flex;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 8px;
  }

  #container_inP .form-control[type="file"] {
    width: 85%;
  }

  #container_inP .img-wapper {
    width: 80px;
    margin-left: auto;
  }
</style>
@endsection

@section('linkjs')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
  // ✅ Hàm tạo slug chuẩn tiếng Việt
  function generateSlug(str) {
    return str.normalize('NFD')
      .replace(/[\u0300-\u036f]/g, '')
      .replace(/đ/g, 'd').replace(/Đ/g, 'D')
      .replace(/[^a-zA-Z0-9\s-]/g, '')
      .trim()
      .replace(/\s+/g, '-')
      .toLowerCase();
  }

  document.addEventListener('DOMContentLoaded', function () {
    // Khởi tạo CKEditor
    CKEDITOR.replace('description');

    const productName = document.getElementById('productName');
    const slugName = document.getElementById('slug_name');
    const form = document.getElementById('productForm');
    const category = document.getElementById('category');
    const addBox = document.getElementById('addBox');

    // ✅ Tự động tạo slug từ tên sản phẩm
    productName.addEventListener('input', () => {
      slugName.value = generateSlug(productName.value);
    });

    // ✅ Cập nhật CKEditor khi submit
    form.addEventListener('submit', function (e) {
      for (let instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
      }

      const descHTML = CKEDITOR.instances.description.getData();
      const descText = descHTML.replace(/<[^>]+>/g, '').trim();
      if (!descText) {
        alert('Vui lòng nhập mô tả trước khi thêm sản phẩm!');
        e.preventDefault();
        return;
      }
      document.getElementById('slug_description').value = generateSlug(descText);
    });

    // ✅ Upload ảnh
    const btnAddFile = document.getElementById('btn_add_inpFile');
    const container = document.getElementById('container_inP');
    const hd = document.getElementById('hd_inpFile');

    // Ảnh đầu tiên
    document.getElementById('inpFile_1').onchange = function () {
      const [file] = this.files;
      if (file) {
        document.getElementById('img_inpFile_1').src = URL.createObjectURL(file);
      }
    };
    document.getElementById('img_inpFile_1').onclick = function () {
      document.getElementById('inpFile_1').click();
    };

    // Thêm ảnh mới
    btnAddFile.onclick = function () {
      const newIndex = parseInt(hd.value) + 1;
      const input = document.createElement('input');
      input.type = 'file';
      input.className = 'form-control';
      input.id = 'inpFile_' + newIndex;
      input.name = 'images[]';
      input.accept = 'image/*';
      input.required = true;

      const imgWrapper = document.createElement('div');
      imgWrapper.className = 'img-wapper';

      const img = document.createElement('img');
      img.className = 'img';
      img.id = 'img_inpFile_' + newIndex;
      img.src = "{{ asset('img/images.png') }}";

      const btnClose = document.createElement('div');
      btnClose.className = 'btn-close';
      btnClose.textContent = 'X';
      btnClose.onclick = () => {
        container.removeChild(input);
        container.removeChild(imgWrapper);
      };

      img.onclick = () => input.click();
      input.onchange = function () {
        const [file] = this.files;
        if (file) img.src = URL.createObjectURL(file);
      };

      imgWrapper.appendChild(img);
      imgWrapper.appendChild(btnClose);
      container.appendChild(input);
      container.appendChild(imgWrapper);
      hd.value = newIndex;
    };

    // ✅ Sự kiện chọn "Add category"
    category.addEventListener('change', () => {
      addBox.hidden = category.value !== 'add';
      if (category.value === 'add') initAddCategory();
    });

    // ✅ Hàm kiểm tra và thêm danh mục mới
    function initAddCategory() {
      const newInp = document.getElementById('new_category');
      const buttonAdd = document.getElementById('button_add');
      const errDiv = document.getElementById('err_cate');
      const token = document.getElementById('token').value;

      newInp.addEventListener('input', function () {
        const val = generateSlug(this.value.trim());
        const exists = Array.from(category.options).some(
          opt => generateSlug(opt.text) === val
        );
        errDiv.innerHTML = exists
          ? `<span id="span_warning" style="color:#9F6000;background:#FEEFB3;padding:5px 10px;border-radius:3px;">Danh mục đã tồn tại</span>`
          : '';
        buttonAdd.disabled = exists;
      });

      buttonAdd.onclick = async (e) => {
        e.preventDefault();
        const val = newInp.value.trim();
        if (!val) return alert('Không được để trống');

        const res = await postCate("{{ url('/api/category') }}", { name: val, token });
        if (res && res.name && res.id) {
          const opt = new Option(res.name, res.id);
          const addOpt = Array.from(category.options).find(o => o.value === 'add');
          category.insertBefore(opt, addOpt);
          category.value = res.id;
          addBox.hidden = true;
        } else {
          alert('Thêm danh mục thất bại!');
        }
      };
    }

    // ✅ API thêm danh mục
    async function postCate(url, data) {
      try {
        const res = await fetch(url, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data)
        });
        return await res.json();
      } catch (err) {
        console.error(err);
        return null;
      }
    }
  });
</script>
@endsection

@section('nav')
@include('admin.layouts_admin.nav_admin')
@endsection

@section("main")
<div id="page-wrapper" class="container my-5">
  {{-- Thông báo --}}
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  {{-- Form --}}
  <form id="productForm" action="{{ route('postProduct') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h2 class="bg-primary text-center text-white py-3 fw-bold">Add Product</h2>

    {{-- Name --}}
    <div class="form-group mb-3 row">
      <label class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="productName" name="name">
        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
      </div>
    </div>

    {{-- Description --}}
    <div class="form-group mb-3 row">
      <label class="col-sm-2 col-form-label">Description</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
        @error('description')<div class="text-danger">{{ $message }}</div>@enderror
      </div>
    </div>

    {{-- Price + Sale --}}
    <div class="form-group mb-3 row">
      <label class="col-sm-2 col-form-label">Price</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="price">
        @error('price')<div class="text-danger">{{ $message }}</div>@enderror
      </div>
    </div>

    <div class="form-group mb-3 row">
      <label class="col-sm-2 col-form-label">Sale</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="sale">
        @error('sale')<div class="text-danger">{{ $message }}</div>@enderror
      </div>
    </div>

    {{-- Images --}}
    <div class="form-group mb-3 row">
      <label class="col-sm-2 col-form-label">Images</label>
      <div class="col-sm-8" id="container_inP">
        <input type="hidden" id="hd_inpFile" value="1">
        <input type="file" class="form-control" id="inpFile_1" name="images[]" accept="image/*" required>
        <div class="img-wapper">
          <img class="img" id="img_inpFile_1" src="{{ asset('img/images.png') }}">
        </div>
        @error('images')<div class="text-danger">{{ $message }}</div>@enderror
      </div>
      <div class="col-sm-2">
        <button type="button" id="btn_add_inpFile" class="btn btn-primary">+</button>
      </div>
    </div>

    {{-- Category --}}
    <div class="form-group mb-3 row">
      <label class="col-sm-2 col-form-label">Category</label>
      <div class="col-sm-8">
        <select class="form-control" id="category" name="category">
          @foreach ($categories as $cate)
            <option value="{{ $cate['id_category'] }}">{{ $cate['name'] }}</option>
          @endforeach
          <option value="add">Add category</option>
        </select>
      </div>
    </div>

    {{-- Add Category Box --}}
    <div class="form-group mb-3 row" id="addBox" hidden>
      <label class="col-sm-2 col-form-label">Add Category</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="new_category" placeholder="Nhập loại mới">
      </div>
      <div class="col-sm-3">
        <button id="button_add" class="btn btn-primary w-100">Add</button>
      </div>
      <div id="err_cate"></div>
    </div>

    {{-- Brands --}}
    <div class="form-group mb-3 row">
      <label class="col-sm-2 col-form-label">Brand</label>
      <div class="col-sm-8">
        <select class="form-control" name="brand">
          @foreach ($brands as $brand)
            <option value="{{ $brand['id_brand'] }}">{{ $brand['name'] }}</option>
          @endforeach
        </select>
      </div>
    </div>

    {{-- Tags --}}
    <div class="form-group mb-3 row">
      <label class="col-sm-2 col-form-label">Tags</label>
      <div class="col-sm-8 d-flex flex-wrap gap-3">
        <label><input type="checkbox" name="tags[]" value="flagship"> Flagship</label>
        <label><input type="checkbox" name="tags[]" value="best"> Best</label>
        <label><input type="checkbox" name="tags[]" value="shoes"> Shoes</label>
      </div>
    </div>

    {{-- Status --}}
    <div class="form-group mb-3 row">
      <label class="col-sm-2 col-form-label">Status</label>
      <div class="col-sm-10">
        <select class="form-control" name="status">
          <option value="1">Active</option>
          <option value="0">Inactive</option>
        </select>
      </div>
    </div>

    {{-- Hidden --}}
    <input type="hidden" id="token" value="{{ env('API_TOKEN') }}">
    <input type="hidden" id="slug_name" name="slug_name">
    <input type="hidden" id="slug_description" name="slug_description">

    {{-- Submit --}}
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Add</button>
      <button type="reset" class="btn btn-secondary">Cancel</button>
    </div>
  </form>
</div>
@endsection
