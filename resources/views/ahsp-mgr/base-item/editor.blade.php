@extends('layout.main', [
    'title' => (isset($data) ? 'Edit' : 'Tambah') . ' Item',
])

@section('content')
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ isset($data) ? 'Edit' : 'Tambah' }} Item</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post"
                action="{{ isset($data->id) ? url("/ahsp-mgr/base-items/{$data->id}") : url('/ahsp-mgr/base-items') }}">
                @csrf
                @if (isset($data->id))
                  @method('PUT')
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="type">Jenis</label>
                    <select name="type" id="type" class="form-control">
                      <?php $selectedType = isset($data->type) ? $data->type : old('type'); ?>
                      <option value="0" {{ $selectedType == 0 ? 'selected' : '' }}>Bahan</option>
                      <option value="1" {{ $selectedType == 1 ? 'selected' : '' }}>Upah</option>
                      <option value="2" {{ $selectedType == 2 ? 'selected' : '' }}>Alat</option>
                    </select>
                    @error('type')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="group_id">Grup</label>
                    <select name="group_id" id="group_id" class="form-control select2">
                      <?php $selectedGroupId = isset($data->group_id) ? $data->group_id : old('group_id'); ?>
                      <option value="">-- Pilih Grup --</option>
                      @foreach ($groups as $group)
                        <option value="{{ $group->id }}" {{ $selectedGroupId == $group->id ? 'selected' : '' }}>
                          {{ $group->name }}</option>
                      @endforeach
                    </select>
                    @error('group_id')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control select2">
                      <?php $selectedCategoryId = isset($data->category_id) ? $data->category_id : old('category_id'); ?>
                      <option value="">-- Pilih Kategori --</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                          {{ $selectedCategoryId == $category->id ? 'selected' : '' }}>
                          {{ $category->name }}</option>
                      @endforeach
                    </select>
                    @error('category_id')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Nama Item</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Item"
                      value="{{ isset($data) ? $data->name : old('name') }}">
                    @error('name')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="uom">Satuan</label>
                    <input type="text" class="form-control" id="uom" name="uom" placeholder="Satuan"
                      value="{{ isset($data) ? $data->uom : old('uom') }}">
                    @error('uom')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="brand">Merk</label>
                    <input type="text" class="form-control" id="brand" name="brand" placeholder="Merk"
                      value="{{ isset($data) ? $data->brand : old('brand') }}">
                    @error('brand')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="specification">Spesifikasi</label>
                    <input type="text" class="form-control" id="specification" name="specification"
                      placeholder="Spesifikasi" value="{{ isset($data) ? $data->specification : old('specification') }}">
                    @error('specification')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="source">Sumber</label>
                    <input type="text" class="form-control" id="source" name="source"
                      placeholder="Sumber" value="{{ isset($data) ? $data->source : old('source') }}">
                    @error('source')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Harga"
                      value="{{ isset($data) ? $data->price : old('price') }}">
                    @error('price')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('footscript')
<script>
  $(document).ready(function() {
    $('#type').focus();
  });
</script>
@endsection

