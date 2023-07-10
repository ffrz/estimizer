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
                action="{{ isset($data->id) ? url("/library/base-items/{$data->id}") : url('/library/base-items') }}">
                @csrf
                @if (isset($data->id))
                  @method('PUT')
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control">
                      <?php $selectedCategoryId = isset($data->category_id) ? $data->category_id : old('category_id'); ?>
                      <option value="">-- Pilih Kategori --</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $selectedCategoryId == $category->id ? 'selected' : '' }}>
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
