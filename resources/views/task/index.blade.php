@extends('layout.main', [
    'title' => $project->name,
    'nav_active' => 'manage_tasks',
])

@section('nav')
  <li class="nav-item">
    <a class="btn plus-btn btn-primary mr-2" href="{{ url("/projects/$project->id/tasks/add") }}" title="Tambah Pekerjaan">
      <i class="fas fa-plus"></i>
    </a>
  </li>
@endsection

@section('content')
  <script>
    function confirm_delete() {
      return confirm('Hapus rekaman?');
    }
  </script>
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card mt-0">
              <div class="card-header">
                <h3 class="card-title">
                  <div class="btn-group">
                    <a href="{{ url("/projects/{$project->id}/task-categories") }}" class="btn btn-sm btn-default">Kelola Kategori</a>
                  </div>
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
                        <th>No</th>
                        <th>Uraian</th>
                        <th>Analisa</th>
                        <th>Volume</th>
                        <th>Satuan</th>
                        <th>Harga Satuan (Rp)</th>
                        <th>Jumlah Harga (Rp)</th>
                        <th>Bobot (%)</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $total = 0.0; ?>
                      @foreach ($categories as $category)
                        <?php $subtotal = 0.0; ?>
                        <tr>
                          <th class="text-right">{{ $parentLoopIteration = $loop->iteration }}</th>
                          <th colspan="7">{{ $category->name }}</th>
                          <th class="text-center">
                            <div class="btn-group">
                              <a href="#" class="btn btn-xs btn-default" title="Tambah Pekerjaan"><i
                                  class="fa fa-plus"></i></a>
                              <a href="#" class="btn btn-xs btn-default" title="Ubah Kategori"><i
                                  class="fa fa-edit"></i></a>
                              <a href="#" class="btn btn-xs btn-danger" title="Hapus Kategori"><i
                                  class="fa fa-trash"></i></a>
                            </div>
                          </th>
                        </tr>
                        @foreach ($category->tasks()->orderBy('priority')->orderBy('name')->get() as $task)
                          <?php $subtotal += $task->volume * $task->cost; ?>
                          <tr>
                            <td class="text-right">{{ $parentLoopIteration . '.' . $loop->iteration }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ '-' }}</td>
                            <td class="text-right">{{ format_decimal($task->volume, 4) }}</td>
                            <td>{{ $task->uom }}</td>
                            <td class="text-right">{{ format_decimal($task->cost, 2) }}</td>
                            <td class="text-right">{{ format_decimal($task->subtotal_cost, 2) }}</td>
                            <td class="text-right">{{ format_decimal(0, 2) }}</td>
                            <th class="text-center">
                              <div class="btn-group">
                                <a href="#" class="btn btn-xs btn-default" title="Ubah"><i
                                    class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-xs btn-danger" title="Hapus"><i
                                    class="fa fa-trash"></i></a>
                              </div>
                              </td>
                          </tr>
                        @endforeach
                        <tr>
                          <th colspan="6" class="text-right">Subtotal</th>
                          <th class="text-right">{{ format_decimal($subtotal, 2) }}</th>
                          <th class="text-right">{{ format_decimal(0, 2) }}</th>
                          <td></td>
                        </tr>
                        <?php $total += $subtotal; ?>
                        <tr>
                          <th colspan="9">&nbsp;</th>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <thead>
                        <tr>
                          <th colspan="9">&nbsp;</th>
                        </tr>
                        <tr>
                          <th colspan="5"></th>
                          <th class="text-right">Grand Total</th>
                          <th class="text-right">{{ format_decimal($total, 2) }}</th>
                          <th class="text-right">{{ format_decimal(100, 2) }}</th>
                          <th></th>
                        </tr>
                      </thead>
                    </tfoot>
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
