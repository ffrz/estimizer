<?php $title = 'Dashboard' ?>
@extends('layout.main', [
  'title' => $title
])

@section('content')
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card mt-0">
              <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>

                <div class="card-tools">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                
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
