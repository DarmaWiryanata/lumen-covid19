@extends('master')

@section('title')
  Dashboard
@endsection

@section('css')
  <link href="{{ url('assets/plugins/footable/css/footable.bootstrap.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('js')
  <script src="{{ url('assets/plugins/footable/js/footable.js') }}"></script>
  <script>
      $(function () {
        // $('#footable-3').footable();
        $( "#footable-3 tbody tr td button" ).on( "click", function() {
          var id = $(this).attr('data-value');
          $.get( "/kasus/" + id, function( data ) {
            console.log((data));
            var d = (data);
            $('#id').val(d.id);
            $('#nama').val(d.nama);
            $('#slug').val(d.slug);
            $('#status').val(d.status);
          });
        });
      });
  </script> 
@endsection

@section('content')
  <!-- Page Content-->
  <div class="page-content">

    <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row">
          <div class="col-sm-12">
              <div class="page-title-box">
                  <div class="float-right">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item active">Kasus</li>
                      </ol><!--end breadcrumb-->
                  </div><!--end /div-->
                  <h4 class="page-title">Dashboard</h4>
              </div><!--end page-title-box-->
          </div><!--end col-->
      </div><!--end row-->
      <!-- end page title end breadcrumb -->
      <div class="row">
          {{-- Tabel Kuesioner --}}
          <div class="col-lg-10">                                                        
              <div class="card">
                  <div class="card-body">
                      <h4 class="header-title mt-0">Kasus</h4>
                      <p class="text-muted mb-3">Daftar kasus</p>
                      <div class="table-responsive">
                        <table id="footable-3" class="table mb-0" data-paging="true" data-filtering="true" data-sorting="true">
                            <thead>
                                <tr>
                                    <th data-breakpoints="xs">ID</th>
                                    <th>Nama</th>
                                    <th data-breakpoints="xs sm">Tanggal Mulai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kasus as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <button class="btn btn-primary"data-toggle="modal" data-animation="bounce" data-target="#modal-edit" data-value="{{ $item->id }}"><i class="mdi mdi-pencil-box-outline"></i></button>
                                            <form action="{{ route('kasus.delete', ['id' => $item->id]) }}" method="post">
                                              <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--end table-->

                      <!--Modal Edit-->
                      <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="editor-title">
                      
                          <div class="modal-dialog" role="document">
                              <form class="modal-content form-horizontal" id="editor" method="POST" action="{{ route('kasus.update') }}">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="editor-title">Ubah Kuesioner</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>                                                            
                                  </div>
                                  <div class="modal-body">
                                      <div class="form-group required row">
                                        <input type="text" id="id" name="id" value="" hidden>
                                        <label for="nama" class="col-sm-3 control-label">Judul Kuesioner</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Judul"  required>
                                        </div>
                                      </div>
                                      <div class="form-group required row">
                                        <label for="slug" class="col-sm-3 control-label">Slug</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="slug" name="slug" placeholder="Masukkan Slug"  required>
                                        </div>
                                      </div>
                                      <div class="form-group required row">
                                        <label for="status" class="col-sm-3 control-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="status" name="status">
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak aktif</option>
                                            </select>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">Simpan</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                  </div>
                              </form>
                          </div>
                      </div><!--end modal-->

                      <!--Modal Tambah-->
                      <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="editor-title">
                      
                          <div class="modal-dialog" role="document">
                              <form class="modal-content form-horizontal" id="editor" method="POST" action="{{ route('kasus.store') }}">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="editor-title">Tambah Kuesioner</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>                                                            
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group required row">
                                      <input type="text" id="id" name="id" value="" hidden>
                                      <label for="nama" class="col-sm-3 control-label">Judul Kuesioner</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Judul"  required>
                                      </div>
                                    </div>
                                    <div class="form-group required row">
                                      <label for="slug" class="col-sm-3 control-label">Slug</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Masukkan Slug"  required>
                                      </div>
                                    </div>
                                    <div class="form-group required row">
                                      <label for="status" class="col-sm-3 control-label">Status</label>
                                      <div class="col-sm-9">
                                          <select class="form-control" id="status" name="status">
                                          <option value="1" selected>Aktif</option>
                                          <option value="0">Tidak aktif</option>
                                          </select>
                                      </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                </div>
                              </form>
                          </div>
                      </div><!--end modal-->
                  </div><!--end card-body-->
              </div><!--end card-->
          </div><!--end col-->
          <div class="col-lg-2">
              <div class="card">
                  <div class="card-body">
                      <h4 class="header-title mt-0">Total</h4>  
                      <h1 class="text-center">{{ $kasus->count() }}</h1>
                      <h5 class="text-center mb-1 text-muted text-truncate">Kasus</h5>
                      <button class="btn btn-success float-right mt-3" data-toggle="modal" data-animation="bounce" data-target="#modal-tambah"><i class="mdi mdi-plus"></i> Kuesioner</button>
                  </div><!--end card-body-->
              </div><!--end card-->
          </div><!--end col-->
      </div><!--end row-->

    </div><!-- container -->
  </div>
@endsection