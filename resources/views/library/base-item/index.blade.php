@extends('layout.main', [
    'title' => 'Item Dasar',
    'nav_active' => 'manage_task_categories',
])

@section('nav')
  <li class="nav-item">
    <a class="btn plus-btn btn-primary mr-2" href="{{ url("/library/base-items/create") }}"
      title="Buat Item Baru">
      <i class="fas fa-plus"></i>
    </a>
  </li>
@endsection

@section('content')
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card mt-0">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <div>
                  <table class="table table-hover text-nowrap table-sm">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Uraian</th>
                        <th>Satuan</th>
                        <th>Merk</th>
                        <th>Spesifikasi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($items as $item)
                        <tr>
                          <td class="text-right">{{ $loop->iteration }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->uom }}</td>
                          <td>{{ $item->brand }}</td>
                          <td>{{ $item->specification }}</td>
                          <td>
                            <form class="inline" method="POST"
                              action="{{ url("/library/base-items/$item->id") }}">
                              @csrf
                              @method('DELETE')
                              <div class="btn-group">
                                <a href="{{ url("/library/base-items/$item->id") }}"
                                  class="btn btn-xs btn-default" title="Ubah Item"><i class="fa fa-edit"></i></a>
                                <button class="btn btn-xs btn-danger" name="do" value="delete" title="Hapus Item"
                                  type="submit" onclick="return confirm_delete()"><i class="fa fa-trash"></i></button>
                              </div>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('footscript')
  <script>
    function confirm_delete() {
      return confirm('Hapus rekaman?');
    }
  </script>
@endsection

@section('footscript')
@endsection
