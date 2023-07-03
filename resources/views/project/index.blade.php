@extends('layout.main', [
    'title' => 'Proyek',
])

@section('nav')
  <li class="nav-item">
    <a class="btn btn-sm btn-primary" href="{{ url('/projects/create') }}">
      <i class="fas fa-plus"></i> Proyek Baru
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
                <h3 class="card-title">Daftar Proyek</h3>
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
                <table class="table table-hover text-nowrap table-sm">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Proyek</th>
                      <th>Owner</th>
                      <th>Tahun</th>
                      <th>Biaya</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                      <tr>
                        <td>{{ $item->code }}</td>
                        <td>
                          {{ $item->name }}<br>
                          {{ $item->address }}
                        </td>
                        <td>{{ $item->owner }}</td>
                        <td>{{ $item->year }}</td>
                        <td>{{ $item->cost }}</td>
                        <td>
                          <form method="POST" action="{{ url('projects/delete/' . $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ url('projects/edit/' . $item->id) }}" class="btn btn-primary btn-xs"><i
                                class="fas fa-pen"></i> Edit</a>
                            <button onclick="return confirm_delete()" type="submit" class="btn btn-danger btn-xs"><i
                                class="fas fa-trash-alt"></i> Hapus</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
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
