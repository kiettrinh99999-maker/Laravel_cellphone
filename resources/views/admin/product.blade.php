@extends("admin.layoutsad.layout")
@section('linkjs')
  <!-- CKEditor CDN -->
  <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace('description');
      extraPlugins: 'base64image'
  </script>
  <script>
    const category = document.getElementById('category');
    const addBox = document.getElementById('addBox');
    category.addEventListener('change', () => {
      addBox.hidden = category.value !== 'add';
    });
  </script>
@endsection

@section("content")
<div id="page-wrapper">
  <div class="container">
    <div class="">

      {{-- Form input --}}
     <form class="" action="{{route('post.product')}}" method="POST" enctype="multipart/form-data">
  @csrf

  <h2 class="bg-primary text-center fs-3 fw-bold text-white py-3">Add Product</h2>

  <div class="form-group row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name">
    </div>
    @error('name')
    <div class="text-danger">
      {{$message}}
    </div>
    @enderror
  </div>

  <div class="form-group row mb-3">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="description" name="description" rows="4"></textarea>
    </div>
    @error('description')
    <div class="text-danger">
      {{$message}}
    </div>
    @enderror
  </div>

  <div class="form-group row mb-3">
    <label for="price" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
      <input type="number"  pattern="\d*" class="form-control" id="price" name="price">
    </div>
    @error('price')
    <div class="text-danger">
      {{$message}}
    </div>
    @enderror
  </div>

  <div class="form-group row mb-3">
    <label for="sale" class="col-sm-2 col-form-label">Sale</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="sale" name="sale">
    </div>
    @error('sale')
    <div class="text-danger">
      {{$message}}
    </div>
    @enderror
  </div>

  <div class="form-group row mb-3 align-items-center">
    <label for="image1" class="col-sm-2 col-form-label">Image 1</label>
    <div class="col-sm-10">
      <input class="form-control" type="file" id="inpFile_1" name="inpFile_1">
      <div class="img-wapper" >
        <img class="img" id="img_inpFile_1" src="{{asset('img/images.png')}}" alt="" style="object-fit: cover; "/>
      </div>

    </div>
          <button  type="button" id="btn_add_inpFile" class="btn btn-primary ">
            +
          </button>
    @error('inpFile_1')
    <div class="text-danger">
      {{$message}}
    </div>
    @enderror
  </div>

  <div class="col-auto">
          <input type="hidden" class="form-control" id="hd_inpFile" value="1" />
          <input type="file" class="form-control" id="inpFile_1" />
              <div class="img-wapper" >
                <img
                class="img"
                id="img_inpFile_1"
                src="./img/images.png"
                alt=""
                style="object-fit: cover; "
              />
          </div>
        </div>
        <div class="col-auto align-self-end">
          <button type="button" id="btn_add_inpFile" class="btn btn-primary">
            +
          </button>
        </div>

  <div class="form-group row mb-3 align-items-center">
    <label for="category" class="col-sm-2 col-form-label mb-0">Category</label>
    <div class="col-sm-8">
      <select class="form-control" id="category" name="category">
        <option value="1">Category 1</option>
        <option value="0">Category 2</option>
        <option value="add">Add category</option>
      </select>
    </div>
    @error('category')
    <div class="text-danger">
      {{$message}}
    </div>
    @enderror
  </div>

  <div class="form-group row mb-3 align-items-center" id="addBox" hidden>
    <label for="addCategory" class="col-sm-2 col-form-label mb-0">Add Category</label>
    <div class="col-sm-7">
      <input class="form-control" type="text" placeholder="Nhập loại mới" name="new_category">
    </div>
    <div class="col-sm-3">
      <button type="button" class="btn btn-primary w-100">Add Category</button>
    </div>
    @error('new_category')
    <div class="text-danger">
      {{$message}}
    </div>
    @enderror
    </div>
     

  <div class="form-group row mb-3">
    <label for="tag" class="col-sm-2 col-form-label">Tag</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tag" name="tag">
    </div>
    @error('tag')
    <div class="text-danger">
      {{$message}}
    </div>
    @enderror
  </div>

  <div class="form-group row mb-3">
    <label class="col-sm-2 control-label">Latest</label>
    <div class="col-sm-10">
      <label class="radio-inline">
        <input type="radio" name="latest" value="1" checked> True
      </label>
      <label class="radio-inline">
        <input type="radio" name="latest" value="0"> False
      </label>
    </div>
    @error('latest')
    <div class="text-danger">
      {{$message}}
    </div>
    @enderror
  </div>

  <div class="form-group row mb-3">
    <label for="status" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
      <select class="form-control" id="status" name="status">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
      </select>
    </div>
    @error('status')
    <div class="text-danger">
      {{$message}}
    </div>
    @enderror
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-primary">Add</button>
    <button type="reset" class="btn btn-secondary">Cancel</button>
  </div>
</form>


    </div>
  </div>
</div>
@endsection