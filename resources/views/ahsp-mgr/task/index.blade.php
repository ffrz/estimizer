@extends('layout.main', [
    'title' => 'AHSP',
    'nav_active' => 'manage_task_categories',
])

@section('nav')
  <li class="nav-item">
    <a class="btn plus-btn btn-primary mr-2" href="{{ url("/ahsp-mgr/tasks/create") }}"
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
                <h3 class="card-title">
                  <ul class="nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link {{ !$group_id ? 'active' : '' }}" href="?group_id=0">Semua</a>
                    </li>
                    @foreach ($groups as $group)
                    <li class="nav-item">
                      <a class="nav-link {{ $group_id == $group->id ? 'active' : '' }}" href="?group_id={{$group->id}}">{{ $group->name }}</a>
                    </li>
                    @endforeach
                  </ul>
                </h3>
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
                        <th style="width:5%">No</th>
                        <th>Uraian</th>
                        <th style="width:10%">Satuan</th>
                        <th style="width:5%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tasks as $item)
                        <tr>
                          <td class="text-right">{{ $loop->iteration }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->uom }}</td>
                          <td>
                            <form class="inline" method="POST"
                              action="{{ url("/ahsp-mgr/tasks/$item->id") }}">
                              @csrf
                              @method('DELETE')
                              <div class="btn-group">
                                <a href="{{ url("/ahsp-mgr/task-details/$item->id") }}"
                                  class="btn btn-xs btn-default" title="Ubah Rincian"><i class="fa fa-eye"></i></a>
                                <a href="{{ url("/ahsp-mgr/tasks/$item->id") }}"
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
