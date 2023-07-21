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
                action="{{ isset($data->id) ? url("/ahsp-mgr/tasks/{$data->id}") : url('/ahsp-mgr/tasks') }}">
                @csrf
                @if (isset($data->id))
                  @method('PUT')
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="group_id">Grup</label>
                    <select name="group_id" id="group_id" class="form-control">
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
                    <select name="category_id" id="category_id" class="form-control">
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
                    <label for="name">Nama Pekerjaan</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pekerjaan"
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
                    <label for="source">Sumber</label>
                    <input type="text" class="form-control" id="source" name="source" placeholder="Sumber"
                      value="{{ isset($data) ? $data->source : old('source') }}">
                    @error('source')
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
