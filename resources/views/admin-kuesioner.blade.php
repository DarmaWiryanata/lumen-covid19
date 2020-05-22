@extends('master')

@section('title')
  Kuesioner | {{ $kasus->nama }}
@endsection

@section('css')
  <link href="{{ url('assets/plugins/footable/css/footable.bootstrap.css') }}" rel="stylesheet" type="text/css">

  {{-- jsGrid --}}
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
@endsection

@section('js')
  <script src="{{ url('assets/plugins/footable/js/footable.js') }}"></script>
  <script>
      $(function($){
            // $('#footable-3').footable();
            $( "#footable-3 tbody tr td button" ).on( "click", function() {
              var id = $(this).attr('data-value');
              $.get( "/kuesione/show/" + id, function( data ) {
                console.log(JSON.parse(data));
                var d = JSON.parse(data);
                $('#id').val(d[0].id);
                $('#kasus_id').val(d[0].kasus_id);
                $('.cek-pertanyaan').val(d[0].pertanyaan);
                $('.cek-kategori option[value="'+d[0].kategori+'"]').attr('selected', 'selected');
                $('.cek-jawaban option[value="'+d[0].jawaban+'"]').attr('selected', 'selected');
                $('.cek-status option[value="'+d[0].status+'"]').attr('selected', 'selected');
              });
              console.log($(this).attr('data-value'));
            });
        });
  </script>

  {{-- jsGrid --}}
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
  <script>
      var clients = [
          { "Name": "Lingkungan Sekitar" },
          { "Name": "Facebook/Instagram/Twitter" },
          { "Name": "Televisi/Radio" },
          { "Name": "Aplikasi Chat (Whatsapp/Facebook Messenger/Telegram" },
          { "Name": "Baliho/Spanduk" },
          { "Name": "Media Cetak/Digital" }
      ];
  
      $("#jsGrid").jsGrid({
          width: "100%",
          height: "400px",
  
          inserting: true,
          editing: true,
          sorting: true,
          paging: true,
  
          data: clients,
  
          fields: [
              { name: "Name", type: "text", validate: "required" },
              { type: "control" }
          ]
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
                        <li class="breadcrumb-item"><a href="{{ route('kasus.index') }}">Kasus</a></li>
                        <li class="breadcrumb-item active">{{ $kasus->nama }}</li>
                      </ol><!--end breadcrumb-->
                  </div><!--end /div-->
                  <h4 class="page-title">{{ $kasus->nama }}</h4>
              </div><!--end page-title-box-->
          </div><!--end col-->
      </div><!--end row-->
      <!-- end page title end breadcrumb -->
      <div class="row">
          {{-- Tabel Kuesioner --}}
          <div class="col-lg-10">                                                        
              <div class="card">
                  <div class="card-body">
                      <h4 class="header-title mt-0">Pertanyaan</h4>
                      <p class="text-muted mb-3">Daftar Pertanyaan</p>
                      <div class="table-responsive">
                        <table id="footable-3" class="table mb-0 cek-tabel" data-paging="true" data-filtering="true" data-sorting="true">
                            <thead>
                                <tr class="text-center">
                                    <th data-breakpoints="xs">ID</th>
                                    <th>Pertanyaan</th>
                                    <th data-breakpoints="xs">Kategori</th>
                                    <th data-breakpoints="xs sm md">Jawaban</th>
                                    <th data-breakpoints="xs" style="min-width: 120px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="user-list">
                                @foreach ($kuesioner as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->pertanyaan }}</td>
                                        <td class="text-center">{{ $item->kategori }}</td>
                                        <td class="text-center">{{ $item->jawaban }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('kuesioner.delete', ['id' => $item->id]) }}" method="post">
                                                <button class="btn btn-primary ml-2" data-toggle="modal" data-target="#modal-edit" data-value="{{ $item->id }}"><i class="mdi mdi-pencil-box-outline"></i></button>
                                                <button type="submit" class="btn btn-danger" name="kasus_id" value="{{ $item->kasus_id }}"><i class="mdi mdi-delete"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--end table-->

                      {{-- tabel Tambah --}}
                      <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="editor-title">
                      
                          <div class="modal-dialog" role="document">
                              <form class="modal-content form-horizontal" id="editor" method="POST" action="{{ route('kuesioner.store') }}">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editor-title">Tambah Pertanyaan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>                                                            
                                </div>
                                <div class="modal-body">
                                    <div class="form-group required row">
                                        <label for="pertanyaan" class="col-sm-3 control-label">Pertanyaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kasus_id" value="{{ $kasus->id }}" hidden required>
                                            <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Masukkan Judul" required>
                                        </div>
                                    </div>
                                    <div class="form-group required row">
                                        <label for="kategori" class="col-sm-3 control-label">Kategori</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="kategori" name="kategori">
                                            <option value="" hidden>Pilih Kategori</option>
                                            <option value="1">Kuis</option>
                                            <option value="2">Survey</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group required row">
                                        <label for="jawaban" class="col-sm-3 control-label">Jawaban</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="jawaban" name="jawaban">
                                            <option value="">-</option>
                                            <option value="1">Benar</option>
                                            <option value="2">Salah</option>
                                            </select>
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

                      {{-- Tabel Edit --}}
                      <div class="modal fade" id="modal-edit">
                          <div class="modal-dialog">
                              <form class="modal-content form-horizontal" method="POST" action="{{ route('kuesioner.update') }}">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ubah Pertanyaan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>                                                            
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="form-control" id="id" name="id" hidden required>
                                    <input type="text" class="form-control" id="kasus_id" name="kasus_id" hidden required>
                                    <div class="form-group row">
                                        <label for="pertanyaan" class="col-sm-3 control-label">Pertanyaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control cek-pertanyaan" name="pertanyaan" placeholder="Masukkan Judul" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kategori" class="col-sm-3 control-label">Kategori</label>
                                        <div class="col-sm-9 cek-kategori">
                                            <select class="form-control" name="kategori">
                                                <option value="" hidden>Pilih Kategori</option>
                                                <option value="1">Kuis</option>
                                                <option value="2">Survey</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jawaban" class="col-sm-3 control-label">Jawaban</label>
                                        <div class="col-sm-9 cek-jawaban">
                                            <select class="form-control" name="jawaban">
                                            <option value=null>-</option>
                                            <option value="1">Benar</option>
                                            <option value="2">Salah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-3 control-label">Status</label>
                                        <div class="col-sm-9 cek-status">
                                            <select class="form-control" name="status">
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
                  </div><!--end card-body-->
              </div><!--end card-->
          </div><!--end col-->
          <div class="col-lg-2">
              <div class="card">
                  <div class="card-body">
                      <h4 class="header-title mt-0">Total</h4>  
                      <h1 class="text-center">{{$kuesioner->count()}}</h1>
                      <h5 class="text-center mb-1 text-muted text-truncate">Pertanyaan</h5>
                      <button class="btn btn-success float-right mt-3" data-toggle="modal" data-animation="bounce" data-target="#modal-tambah"><i class="mdi mdi-plus"></i> Pertanyaan</button>
                  </div><!--end card-body-->
              </div><!--end card-->
              <div class="card">
                  <div class="card-body">
                      <h4 class="header-title mt-0">Sumber Informasi</h4>  
                      <h1 class="text-center">5</h1>
                      <h5 class="text-center mb-1 text-muted text-truncate">Sumber</h5>
                      <button class="btn btn-primary float-right mt-3" data-toggle="modal" data-animation="bounce" data-target="#modal-sumber">Lihat Sumber</button>
                  </div><!--end card-body-->
              </div><!--end card-->

              {{-- Modal Informasi --}}
              <div class="modal fade" id="modal-sumber" tabindex="-1" role="dialog" aria-labelledby="editor-title">
                      
                  <div class="modal-dialog" role="document">
                      <form class="modal-content form-horizontal" id="editor">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editor-title">Sumber Informasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>                                                            
                        </div>
                        <div class="modal-body">
                            <div id="jsGrid"></div>
                            {{-- <div class="form-group required row">
                                <label for="pertanyaan" class="col-sm-3 control-label">Pertanyaan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Masukkan Judul" required>
                                </div>
                            </div> --}}
                        </div>
                      </form>
                  </div>
              </div><!--end modal-->
          </div><!--end col-->
      </div><!--end row-->

    </div><!-- container -->
  </div>
@endsection