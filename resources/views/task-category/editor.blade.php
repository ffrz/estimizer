@extends('layout.main', [
    'title' => $project->name,
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
                <h3 class="card-title">{{ isset($data) ? 'Edit' : 'Tambah' }} Kategori Pekerjaan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post"
                action="{{ isset($data->id) ? url("/projects/{$project->id}/task-categories/update/{$data->id}") : url("/projects/{$project->id}/task-categories/update") }}">
                @csrf
                @if (isset($data->id))
                  @method('PUT')
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="priority">No Urut</label>
                    <input type="number" min="0" max="99" class="form-control" id="priority"
                      name="priority" placeholder="Nomor Urut"
                      value="{{ isset($data) ? $data->priority : old('priority') }}">
                    @error('priority')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Nama Kategori Pekerjaan</label>
                    <input type="text" class="form-control" id="name" name="name"
                      placeholder="Nama Kategori Pekerjaan" value="{{ isset($data) ? $data->name : old('name') }}">
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
