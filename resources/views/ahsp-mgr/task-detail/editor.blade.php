@extends('layout.main', [
    'title' => (isset($data) ? 'Edit' : 'Tambah') . ' Pekerjaan',
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
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post"
                action="{{ isset($data->id) ? url("/ahsp-mgr/tasks/{$task_id}/details/{$data->id}") : url("/ahsp-mgr/tasks/{$task_id}/details") }}">
                @csrf
                @if (isset($data->id))
                  @method('PUT')
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="item_id">Item</label>
                    <select name="item_id" id="item_id" class="form-control custom-select select2" style="width:100%">
                      <?php $selectedItemId = isset($data->item_id) ? $data->item_id : old('item_id'); ?>
                      <option value="">-- Pilih Item --</option>
                      @foreach ($items as $item)
                        <option value="{{ $item->id }}" {{ $selectedItemId == $item->id ? 'selected' : '' }}>
                          {{ $item->name }} ({{ $item->uom }})</option>
                      @endforeach
                    </select>
                    @error('item_id')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="coefficient">Koefisien</label>
                    <input type="text" class="form-control" id="coefficient" name="coefficient" placeholder="Koefisien"
                      value="{{ isset($data) ? $data->coefficient : old('coefficient') }}">
                    @error('coefficient')
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
