@extends('layout.main', [
    'title' => (isset($data) ? 'Edit' : 'Tambah') . ' Proyek',
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
                <h3 class="card-title">Info Proyek</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ isset($data->id) ? url('/projects/update', ['id' => $data->id]) : url('/projects/store') }}">
                @csrf
                @if (isset($data->id))
                  @method('PUT')
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="code">Kode Proyek</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="Kode Proyek"
                      value="{{ isset($data) ? $data->code : old('code') }}">
                    @error('code')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Nama Proyek</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Proyek"
                      value="{{ isset($data) ? $data->name : old('name') }}">
                    @error('name')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="address" class="form-control" id="address" name="address" placeholder="address"
                      value="{{ isset($data) ? $data->address : old('address') }}">
                    @error('address')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="owner">Pemilik</label>
                    <input type="owner" class="form-control" id="owner" name="owner" placeholder="owner"
                      value="{{ isset($data) ? $data->owner : old('owner') }}">
                    @error('owner')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="year">Tahun</label>
                    <input type="number" class="form-control" id="year" min="2000" max="2100" name="year" placeholder="Tahun"
                      value="{{ isset($data) ? $data->year : old('year') }}">
                    @error('year')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="fee">Fee (%)</label>
                    <input type="decimal" class="form-control" id="fee" name="fee" placeholder="Fee" min="0.00" max="100.00"
                      value="{{ isset($data) ? $data->fee : old('fee') }}">
                    @error('fee')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="tax">Pajak (%)</label>
                    <input type="decimal" class="form-control" id="tax" name="tax" placeholder="tax" min="0.00" max="100.00"
                      value="{{ isset($data) ? $data->tax : old('tax') }}">
                    @error('tax')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="notes">Catatan</label>
                    <textarea class="form-control" id="notes" name="notes">{{ isset($data) ? $data->notes : old('notes') }}</textarea>
                    @error('notes')
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
