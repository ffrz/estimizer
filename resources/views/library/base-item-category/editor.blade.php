@extends('layout.main', [
    'title' => (isset($data) ? 'Edit' : 'Tambah') . ' Kategori',
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
                <h3 class="card-title">{{ isset($data) ? 'Edit' : 'Tambah' }} Kategori</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post"
                action="{{ isset($data->id) ? url("/library/base-item-categories/{$data->id}") : url("/library/base-item-categories") }}">
                @csrf
                @if (isset($data->id))
                  @method('PUT')
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama Kategori</label>
                    <input type="text" class="form-control" id="name" name="name"
                      placeholder="Nama Kategori" value="{{ isset($data) ? $data->name : old('name') }}">
                    @error('name')
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
