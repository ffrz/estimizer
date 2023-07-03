@extends('layout.main', [
    'title' => 'Proyek',
    'nav_active' => 'project_list',
])

@section('nav')
  <li class="nav-item">
    <a class="btn plus-btn btn-primary mr-2" href="{{ url('/projects/create') }}" title="Proyek Baru">
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
                            <div class="btn-group mr-2">
                              <a href="{{ url('projects/open/' . $item->id) }}" class="btn btn-default btn-sm"><i class="fas fa-eye" title="Buka"></i></a>
                              <a href="{{ url('projects/edit/' . $item->id) }}" class="btn btn-default btn-sm"><i class="fas fa-edit" title="Edit"></i></a>
                              <button onclick="return confirm_delete()" type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                            </div>
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
