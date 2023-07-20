@extends('layout.main', [
    'title' => 'Rincian Analisa Harga Satuan Pekerjaan',
    'nav_active' => 'manage_task_categories',
])

@section('nav')
  <li class="nav-item">
    <a class="btn plus-btn btn-primary mr-2" href="{{ url("/ahsp-mgr/tasks/{$task->id}/details/create") }}"
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
                <div class="card-title">{{ $task->name }}</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                Grup : {{ $task->group->name }}<br>
                Kategori : {{ $task->category->name }}<br>
              </div>
              <div class="card-body table-responsive p-0">
                <div>
                  <table class="table table-hover text-nowrap table-sm">
                    <thead>
                      <tr>
                        <th style="width:5%">No</th>
                        <th>Uraian</th>
                        <th style="width:10%">Koefisien</th>
                        <th style="width:10%">Satuan</th>
                        <th style="width:5%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th></th>
                        <th colspan="4">Bahan</th>
                      </tr>
                      <?php $i = 0 ?>
                      @foreach ($items as $item)
                        @if ($item->item->type == 0)
                          <?php $i++ ?>
                          @include('ahsp-mgr.task-detail.row')
                        @endif
                      @endforeach
                      <tr>
                        <th></th>
                        <th colspan="4">Upah</th>
                      </tr>
                      <?php $i = 0 ?>
                      @foreach ($items as $item)
                        @if ($item->item->type == 1)
                          <?php $i++ ?>
                          @include('ahsp-mgr.task-detail.row')
                        @endif
                      @endforeach
                      <tr>
                        <th></th>
                        <th colspan="4">Alat</th>
                      </tr>
                      <?php $i = 0 ?>
                      @foreach ($items as $item)
                        @if ($item->item->type == 2)
                          <?php $i++ ?>
                          @include('ahsp-mgr.task-detail.row')
                        @endif
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
