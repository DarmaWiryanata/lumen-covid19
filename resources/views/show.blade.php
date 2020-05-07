@extends('master')

@section('title')
  Corona
@endsection

@section('css')
  <link href="{{ url('assets/plugins/footable/css/footable.bootstrap.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('js')
  <script src="{{ url('assets/plugins/footable/js/footable.js') }}"></script>
  <script>
      $(function () {
          "use strict";
          
          /*Editing FooTable*/
          var $modal = $('#editor-modal'),
          $editor = $('#editor'),
          $editorTitle = $('#editor-title'),
          ft = FooTable.init('#footable-3', {
              editing: {
                  enabled: true,
                  addRow: function(){
                      $modal.removeData('row');
                      $editor[0].reset();
                      $editorTitle.text('Tambah Pertanyaan');
                      $modal.modal('show');
                  },
                  editRow: function(row){
                      var values = row.val();
                      $editor.find('#id').val(values.id);
                      $editor.find('#nama').val(values.nama);
                      $editor.find('#kategori').val(values.kategori);
                      $editor.find('#pilihan').val(values.pilihan);
                      $editor.find('#jawaban').val(values.jawaban);
      
                      $modal.data('row', row);
                      $editorTitle.text('Ubah Pertanyaan #' + values.id);
                      $modal.modal('show');
                  },
                  deleteRow: function(row){
                      if (confirm('Yakin hapus Pertanyaan?')){
                          row.delete();
                      }
                  }
              }
          }),
          uid = 10;
      
          $editor.on('submit', function(e){
              if (this.checkValidity && !this.checkValidity()) return;
              e.preventDefault();
              var row = $modal.data('row'),
                  values = {
                      id: $editor.find('#id').val(),
                      nama: $editor.find('#nama').val(),
                  };
          
              if (row instanceof FooTable.Row){
                  row.val(values);
              } else {
                  values.id = uid++;
                  ft.rows.add(values);
              };
              $modal.modal('hide');
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">"Nama Kuesioner"</li>
                      </ol><!--end breadcrumb-->
                  </div><!--end /div-->
                  <h4 class="page-title">"Nama Kuesioner"</h4>
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
                      <table id="footable-3" class="table mb-0" data-paging="true" data-filtering="true" data-sorting="true">
                          <thead>
                              <tr>
                                  <th data-name="id" data-breakpoints="xs" data-type="number">ID</th>
                                  <th data-name="kategori" data-breakpoints="xs" data-type="text">Kategori</th>
                                  <th data-name="nama" data-type="text">Nama</th>
                                  <th data-name="pilihan" data-breakpoints="xs sm md" data-type="text">Jenis Pilihan</th>
                                  <th data-name="jawaban" data-breakpoints="xs sm md" data-type="text">Jawaban</th>
                              </tr>
                          </thead>
                          <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Kuis</td>
                                    <td>Siapa nama anda??</td>
                                    <td>Pilihan Ganda</td>
                                    <td>Salah</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Survey</td>
                                    <td>Siapa nama anda??</a></td>
                                    <td>Skala</a></td>
                                    <td>-</a></td>
                                </tr>
                          </tbody>
                      </table><!--end table-->

                      <!--Editor-->
                      <div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-title">
                      
                          <div class="modal-dialog" role="document">
                              <form class="modal-content form-horizontal" id="editor">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="editor-title">Tambah Pertanyaan</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>                                                            
                                  </div>
                                  <div class="modal-body">
                                      
                                      <div class="form-group required row">
                                          <label for="nama" class="col-sm-3 control-label">Pertanyaan</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Judul" required>
                                          </div>
                                      </div>
                                      <div class="form-group required row">
                                          <label for="kategori" class="col-sm-3 control-label">Kategori</label>
                                          <div class="col-sm-9">
                                            <select class="form-control" id="kategori" name="kategori">
                                              <option value="" hidden>Pilih Kategori</option>
                                              <option value="Kuis">Kuis</option>
                                              <option value="Survey">Survey</option>
                                            </select>
                                          </div>
                                      </div>
                                      <div class="form-group required row">
                                          <label for="pilihan" class="col-sm-3 control-label">Pilihan</label>
                                          <div class="col-sm-9">
                                            <select class="form-control" id="pilihan" name="pilihan" required>
                                              <option value="" hidden>Pilih Pilihan Jawaban</option>
                                              <option value="Pilihan Ganda">Pilihan Ganda</option>
                                              <option value="Skala">Skala</option>
                                            </select>
                                          </div>
                                      </div>
                                      <div class="form-group required row">
                                          <label for="jawaban" class="col-sm-3 control-label">Jawaban</label>
                                          <div class="col-sm-9">
                                            <select class="form-control" id="jawaban" name="jawaban">
                                              <option value="">-</option>
                                              <option value="Benar">Benar</option>
                                              <option value="Salah">Salah</option>
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
                      <h1 class="text-center">2</h1>
                      <h5 class="text-center mb-1 text-muted text-truncate">Pertanyaan</h5>
                      <!-- <button class="btn btn-success float-right" data-toggle="modal" data-animation="bounce" data-target="#editor-modal"><i class="mdi mdi-plus"></i> Kuesioner</button> -->
                  </div><!--end card-body-->
              </div><!--end card-->
          </div><!--end col-->
      </div><!--end row-->

    </div><!-- container -->
  </div>
@endsection