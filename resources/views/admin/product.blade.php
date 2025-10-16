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
  </div>

  <div class="form-group row mb-3">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="description" name="description" rows="4"></textarea>
    </div>
  </div>

  <div class="form-group row mb-3">
    <label for="price" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
      <input type="number"  pattern="\d*" class="form-control" id="price" name="price">
    </div>
  </div>

  <div class="form-group row mb-3">
    <label for="sale" class="col-sm-2 col-form-label">Sale</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="sale" name="sale">
    </div>
  </div>

  <div class="form-group row mb-3 align-items-center">
    <label for="image1" class="col-sm-2 col-form-label">Image 1</label>
    <div class="col-sm-10">
      <input class="form-control" type="file" id="image1" name="image1">
    </div>
  </div>

  <div class="form-group row mb-3 align-items-center">
    <label for="image2" class="col-sm-2 col-form-label">Image 2</label>
    <div class="col-sm-10">
      <input class="form-control" type="file" id="image2" name="image2">
    </div>
  </div>

  <div class="form-group row mb-3 align-items-center">
    <label for="image3" class="col-sm-2 col-form-label">Image 3</label>
    <div class="col-sm-10">
      <input class="form-control" type="file" id="image3" name="image3">
    </div>
  </div>

  <div class="form-group row mb-3 align-items-center">
    <label for="category" class="col-sm-2 col-form-label mb-0">Category</label>
    <div class="col-sm-8">
      <select class="form-control" id="category" name="category_id">
        <option value="1">Category 1</option>
        <option value="0">Category 2</option>
        <option value="add">Add category</option>
      </select>
    </div>
  </div>

  <div class="form-group row mb-3 align-items-center" id="addBox" hidden>
    <label for="addCategory" class="col-sm-2 col-form-label mb-0">Add Category</label>
    <div class="col-sm-7">
      <input class="form-control" type="text" placeholder="Nhập loại mới" name="new_category">
    </div>
    <div class="col-sm-3">
      <button type="button" class="btn btn-primary w-100">Add Category</button>
    </div>
  </div>

  <div class="form-group row mb-3">
    <label for="tag" class="col-sm-2 col-form-label">Tag</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tag" name="tag">
    </div>
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
  </div>

  <div class="form-group row mb-3">
    <label for="status" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
      <select class="form-control" id="status" name="status">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
      </select>
    </div>
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