@extends('layout.main', [
    'title' => 'Kategori Item Dasar',
    'nav_active' => 'manage_task_categories',
])

@section('nav')
  <li class="nav-item">
    <a class="btn plus-btn btn-primary mr-2" href="{{ url("/library/base-item-categories/create") }}"
      title="Buat Kategori Baru">
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
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category)
                        <tr>
                          <td class="text-right">{{ $loop->iteration }}</td>
                          <td>{{ $category->name }}</td>
                          <td>
                            <form class="inline" method="POST"
                              action="{{ url("/library/base-item-categories/$category->id") }}">
                              @csrf
                              @method('DELETE')
                              <div class="btn-group">
                                <a href="{{ url("/library/base-item-categories/$category->id") }}"
                                  class="btn btn-xs btn-default" title="Ubah Kategori"><i class="fa fa-edit"></i></a>
                                <button class="btn btn-xs btn-danger" name="do" value="delete" title="Hapus Kategori"
                                  type="submit"><i class="fa fa-trash"></i></button>
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
  <script>
    //define data array
    var tabledata = [{
        id: 1,
        name: "Oli Bob",
        progress: 12,
        gender: "male",
        rating: 1,
        col: "red",
        dob: "19/02/1984",
        car: 1
      },
      {
        id: 2,
        name: "Mary May",
        progress: 1,
        gender: "female",
        rating: 2,
        col: "blue",
        dob: "14/05/1982",
        car: true
      },
      {
        id: 3,
        name: "Christine Lobowski",
        progress: 42,
        gender: "female",
        rating: 0,
        col: "green",
        dob: "22/05/1982",
        car: "true"
      },
      {
        id: 4,
        name: "Brendon Philips",
        progress: 100,
        gender: "male",
        rating: 1,
        col: "orange",
        dob: "01/08/1980"
      },
      {
        id: 5,
        name: "Margret Marmajuke",
        progress: 16,
        gender: "female",
        rating: 5,
        col: "yellow",
        dob: "31/01/1999"
      },
      {
        id: 6,
        name: "Frank Harbours",
        progress: 38,
        gender: "male",
        rating: 4,
        col: "red",
        dob: "12/05/1966",
        car: 1
      },
    ];

    //initialize table
    var table = new Tabulator("#example-table", {
      data: tabledata, //assign data to table
      autoColumns: true, //create columns from data field names
    });
  </script>
@endsection
