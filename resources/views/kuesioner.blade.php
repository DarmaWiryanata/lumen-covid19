<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $kasus->nama }}</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="{{ url('kuesioner/image/x-icon') }}">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('kuesioner/img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('kuesioner/img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('kuesioner/img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('kuesioner/img/apple-touch-icon-144x144-precomposed.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Caveat|Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ url('kuesioner/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('kuesioner/css/style.css') }}" rel="stylesheet">
	  <link href="{{ url('kuesioner/css/vendors.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
		<link href="{{ url('kuesioner/css/custom.css') }}" rel="stylesheet">
		
		<!-- PLUGIN CSS -->
		<link href="{{ url('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="style_2">
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->
	
	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div><!-- /loader_form -->

	<header>
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-5">
	                <a href="#"><img src="{{ url('kuesioner/img/logo.svg') }}" alt="" width="50" height="55"></a>
							</div>
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	</header>
	<!-- /header -->

	<div class="wrapper_centering">
	    <div class="container_centering">
	        <div class="container">
	            <div class="row justify-content-between">
	                <div class="col-xl-6 col-lg-6 d-flex align-items-center">
	                    <div class="main_title_1">
	                        <h3><img src="{{ url('kuesioner/img/main_icon_1.svg') }}" width="80" height="80" alt=""> Survey</h3>
	                        <h4 style="color: white">{{ $kasus->nama }}</h4>
	                        {{-- <p><em>- The Satisfyc Team</em></p> --}}
	                    </div>
	                </div>
	                <!-- /col -->
	                <div class="col-xl-5 col-lg-5">
	                    <div id="wizard_container">
	                        <div id="top-wizard">
	                            <div id="progressbar"></div>
	                        </div>
	                        <!-- /top-wizard -->
							<form id="wrapped" method="POST" autocomplete="off" action="{{ route('store') }}">
	                            <input id="website" name="website" type="text" value="">
	                            <!-- Leave for security protection, read docs for details -->
	                            <div id="middle-wizard">

									@foreach ($kuesioner as $item)
										@if ($item->kategori == 1)
											<div class="step">
												<h3 class="main_question mb-4"><strong>Kuis - {{ $loop->iteration }} dari 30</strong>{{ $item->pertanyaan }}</h3>
												<input type="text" id="kategori-{{ $loop->iteration }}" name="respons[{{ $loop->iteration }}][kategori]" value="1" hidden>
												<input type="text" id="pertanyaan-{{ $loop->iteration }}" name="respons[{{ $loop->iteration }}][kuesioner_id]" value="{{ $item->id }}" hidden>
												<div class="review_block">
													<ul>
														<li>
															<div class="checkbox_radio_container">
																<input type="radio" id="jawaban1-{{ $loop->iteration }}" name="respons[{{ $loop->iteration }}][jawaban]" class="required" value="1" autofocus>
																<label class="radio" for="jawaban1-{{ $loop->iteration }}"></label>
																<label for="jawaban-{{ $loop->iteration }}a" class="wrapper">Benar</label>
															</div>
														</li>
														<li>
															<div class="checkbox_radio_container">
																<input type="radio" id="jawaban2-{{ $loop->iteration }}" name="respons[{{ $loop->iteration }}][jawaban]" class="required" value="2">
																<label class="radio" for="jawaban2-{{ $loop->iteration }}"></label>
																<label for="jawaban-{{ $loop->iteration }}b" class="wrapper">Salah</label>
															</div>
														</li>
														<li>
															<div class="checkbox_radio_container">
																<input type="radio" id="jawaban3-{{ $loop->iteration }}" name="respons[{{ $loop->iteration }}][jawaban]" class="required" value="3">
																<label class="radio" for="jawaban3-{{ $loop->iteration }}"></label>
																<label for="jawaban-{{ $loop->iteration }}c" class="wrapper">Tidak tahu</label>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<!-- /kuis -->
										@elseif ($item->kategori == 2)
											<div class="step">
												<h3 class="main_question mb-4"><strong>Survey - {{ $loop->iteration }} dari 30</strong>{{ $item->pertanyaan }}</h3>
												<input type="text" id="kategori-{{ $loop->iteration }}" name="respons[{{ $loop->iteration }}][kategori]" value="2" hidden>
												<input type="text" id="pertanyaan-{{ $loop->iteration }}" name="respons[{{ $loop->iteration }}][kuesioner_id]" value="{{ $item->id }}" hidden>
												<div class="review_block_smiles">
													<ul class="clearfix">
														<li>
															<div class="container_numbers">
																<input type="radio" id="jawaban1-{{ $loop->iteration }}" name="respons[{{ $loop->iteration }}][jawaban]" class="required" value="1" autofocus>
																<label class="radio very_bad" for="jawaban1-{{ $loop->iteration }}">1</label>
															</div>
														</li>
														<li>
															<div class="container_numbers">
																<input type="radio" id="jawaban2-{{ $loop->iteration }}" name="respons[{{ $loop->iteration }}][jawaban]" class="required" value="2">
																<label class="radio bad" for="jawaban2-{{ $loop->iteration }}">2</label>
															</div>
														</li>
														<li>
															<div class="container_numbers">
																<input type="radio" id="jawaban3-{{ $loop->iteration }}" name="respons[{{ $loop->iteration }}][jawaban]" class="required" value="3">
																<label class="radio average" for="jawaban3-{{ $loop->iteration }}">3</label>
															</div>
														</li>
														<li>
															<div class="container_numbers">
																<input type="radio" id="jawaban4-{{ $loop->iteration }}" name="respons[{{ $loop->iteration }}][jawaban]" class="required" value="4">
																<label class="radio good" for="jawaban4-{{ $loop->iteration }}">4</label>
															</div>
														</li>
														<li>
															<div class="container_numbers">
																<input type="radio" id="jawaban5-{{ $loop->iteration }}" name="respons[{{ $loop->iteration }}][jawaban]" class="required" value="5">
																<label class="radio very_good" for="jawaban5-{{ $loop->iteration }}">5</label>
															</div>
														</li>
													</ul>
													<div class="row justify-content-between add_bottom_25">
														<div class="col-4">
															<em>Sangat Tidak Pernah</em>
														</div>
														<div class="col-4 text-right">
															<em>Sangat Sering</em>
														</div>
													</div>
												</div>
											</div>
											<!-- /survey -->
										@endif
									@endforeach
									<div class="form-group terms">
										<label class="container_check" style="padding-left: 0;"><a href="#" data-toggle="modal" data-target="#terms-txt" style="color:#fff; text-decoration: underline;">Panduan cara menjawab</a></label>
								</div>

							<div class="submit step">
									<h3 class="main_question"><strong>Responden</strong>Isi sesuai form</h3>
									<div class="form-group">
											<label for="pendidikan_terakhir">Pendidikan Terakhir</label>
											<select name="pendidikan_terakhir" id="pendidikan_terakhir" class="select2 form-control required" autofocus>
												<option value="" hidden>--Pilih pendidikan terakhir</option>
												<option value="Tidak sekolah">Tidak sekolah</option>
												<option value="SD/sederajat">SD/sederajat</option>
												<option value="SMP/sederajat">SMP/sederajat</option>
												<option value="SMA/sederajat">SMA/sederajat</option>
												<option value="D1">D1</option>
												<option value="D2">D2</option>
												<option value="D3">D3</option>
												<option value="D4">D4</option>
												<option value="S1">S1</option>
												<option value="S2">S2</option>
												<option value="S3">S3</option>
											</select>
										</div>
										<div class="form-group">
											<label for="pekerjaan">Pekerjaan</label>
											<select name="pekerjaan" id="pekerjaan" class="select2 form-control required">
												<option value="" hidden>--Pilih pekerjaan</option>
													@foreach ($pekerjaan as $item)
														<option value="{{ $item->id }}">{{ $item->nama }}</option>	
													@endforeach
											</select>
										</div>
										<div class="row">
											<div class="col-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="provinsi">Provinsi</label>
													<select name="provinsi" id="provinsi" class="select2 form-control required provinsi">
														<option value="" hidden>--Pilih Provinsi</option>
														@foreach ($provinsi as $item)
															<option value="{{ $item->id }}">{{ $item->nama_provinsi }}</option>	
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="kabupaten">Kabupaten/Kota</label>
													<select name="kabupaten" id="kabupaten" class="select2 form-control required kabupaten">
														<option value="" hidden>--Pilih Kabupaten/Kota</option>
													</select>
												</div>
											</div>
											<div class="col-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="kecamatan">Kecamatan</label>
													<select name="kecamatan" id="kecamatan" class="select2 form-control required kecamatan">
														<option value="" hidden>--Pilih Kecamatan</option>
													</select>
												</div>
											</div>
											<div class="col-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="desa">Desa/Kelurahan</label>
													<select name="desa" id="desa" class="select2 form-control required">
														<option value="" hidden>--Pilih Desa/Kelurahan</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
												<div class="col-lg-5 col-md-5">
														<div class="form-group">
																<label for="tahun_lahir">Tahun Lahir</label>
																<input type="text" name="tahun_lahir" id="tahun_lahir" class="form-control required" min="1900" max="2100">
														</div>
												</div>
												<div class="col-lg-7 col-md-7">
														<div class="form-group radio_input">
																<label class="container_radio">Laki-laki
																		<input type="radio" name="jenis_kelamin" value="1" class="required">
																		<span class="checkmark"></span>
																</label>
																<label class="container_radio">Perempuan
																		<input type="radio" name="jenis_kelamin" value="2" class="required">
																		<span class="checkmark"></span>
																</label>
														</div>
												</div>
										</div>
										<div class="form-group">
											<label for="informasi">Informasi</label>
												<ul>
													<li>
														<div class="checkbox_radio_container">
															<input type="checkbox" id="question_3_opt_1" name="informasi[]" class="required" value="Google and Search Engines">
															<label class="checkbox" for="question_3_opt_1"></label>
															<label for="question_3_opt_1" class="wrapper">Google and Search Engines</label>
														</div>
													</li>
													<li>
														<div class="checkbox_radio_container">
															<input type="checkbox" id="question_3_opt_2" name="informasi[]" class="required" value="Emails or Newsletter">
															<label class="checkbox" for="question_3_opt_2"></label>
															<label for="question_3_opt_2" class="wrapper">Emails or Newsletter</label>
														</div>
													</li>
													<li>
														<div class="checkbox_radio_container">
															<input type="checkbox" id="question_3_opt_3" name="informasi[]" class="required" value="Friends or other people">
															<label class="checkbox" for="question_3_opt_3"></label>
															<label for="question_3_opt_3" class="wrapper">Friends or other people</label>
														</div>
													</li>
													<li>
														<div class="checkbox_radio_container">
															<input type="checkbox" id="question_3_opt_4" name="informasi[]" class="required" value="Print Advertising">
															<label class="checkbox" for="question_3_opt_4"></label>
															<label for="question_3_opt_4" class="wrapper">Print Advertising</label>
														</div>
													</li>
													<li>
														<div class="checkbox_radio_container">
															<input type="checkbox" id="question_3_opt_5" name="informasi[]" class="required" value="Other">
															<label class="checkbox" for="question_3_opt_5"></label>
															<label for="question_3_opt_5" class="wrapper">Other</label>
														</div>
													</li>
												</ul>
												<small><em>Multiple selections *</em></small>
											</div>
	                                    <!-- /row -->
	                                </div>
	                                <!-- /responden -->

	                            </div>
	                            <!-- /middle-wizard -->

	                            <div id="bottom-wizard">
	                                <button type="button" name="backward" class="backward">Prev</button>
	                                <button type="button" name="forward" class="forward">Next</button>
	                                <button type="submit" name="process" class="submit">Submit</button>
	                            </div>
	                            <!-- /bottom-wizard -->

	                        </form>
	                    </div>
	                    <!-- /Wizard container -->
	                </div>
	                <!-- /col -->
	            </div>
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container_centering -->
	</div>
	<!-- /wrapper_centering -->

	<!-- Modal terms -->
	<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="termsLabel">Panduan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Pilihan Ganda terdiri atas 3 pilihan jawaban yaitu Benar, Salah dan Tidak Tahu. Para Pengisi Survey diharapkan menjawab pertanyaan sesuai dengan pilihan yang anda ketahui saat ini dan menjawab sejujur-jujurnya.</p>
					<p class="text-center">---------------------------------------</p>
					<p>Pada Pilihan Skala, tingkat persetujuan terdiri dari 5 pilihan skala yang mempunyai gradasi dari Tidak Pernah (1) hingga Selalu (5). 5 pilihan tersebut diantaranya adalah :</p>
					<p>1 : Tidak Pernah <br>2 : Jarang <br>3 : Kadang-kadang <br>4 : Sering <br>5 : Selalu<br></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_1" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	
	<!-- COMMON SCRIPTS -->
	<script src="{{ url('kuesioner/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ url('kuesioner/js/common_scripts.min.js') }}"></script>
	<script src="{{ url('kuesioner/js/functions.js') }}"></script>
	
	<!-- Wizard script -->
	<script src="{{ url('kuesioner/js/survey_func.js') }}"></script>
	
	<!-- PLUGIN SCRIPTS -->
	<script src="{{ url('assets/plugins/select2/select2.min.js') }}"></script>

	<script>
		$(function($){
				$('.select2').select2();
				$( "select.provinsi" ).change(function() {
					var id = $(this).children("option:selected").val();
					$.get( "/kabupaten/" + id, function( data ) {
						console.log(JSON.parse(data));
						var d = JSON.parse(data);
						$('#kabupaten').empty();
						$('#kecamatan').empty();
						$('#desa').empty();
						$('#kabupaten').append('<option value="" hidden>--Pilih Kabupaten/Kota</option>');
						$('#kecamatan').append('<option value="" hidden>--Pilih Kecamatan</option>');
						$('#desa').append('<option value="" hidden>--Pilih Desa/Kelurahan</option>');
						for (var i = 0; i <= d.length; i++) {
							$('#kabupaten').append('<option value="' + d[i].id + '">' + d[i].nama_kabkota + '</option>');
						}
					});
					console.log($(this).children("option:selected").val());
				});
				
				$( "select.kabupaten" ).change(function() {
					var id = $(this).children("option:selected").val();
					$.get( "/kecamatan/" + id, function( data ) {
						console.log(JSON.parse(data));
						var d = JSON.parse(data);
						$('#kecamatan').empty();
						$('#desa').empty();
						$('#kecamatan').append('<option value="" hidden>--Pilih Kecamatan</option>');
						$('#desa').append('<option value="" hidden>--Pilih Desa/Kelurahan</option>');
						for (var i = 0; i <= d.length; i++) {
							$('#kecamatan').append('<option value="' + d[i].id + '">' + d[i].nama_kecamatan + '</option>');
						}
					});
					console.log($(this).children("option:selected").val());
				});
				
				$( "select.kecamatan" ).change(function() {
					var id = $(this).children("option:selected").val();
					$.get( "/desa/" + id, function( data ) {
						console.log(JSON.parse(data));
						var d = JSON.parse(data);
						$('#desa').empty();
						$('#desa').append('<option value="" hidden>--Pilih Desa/Kelurahan</option>');
						for (var i = 0; i <= d.length; i++) {
							$('#desa').append('<option value="' + d[i].id + '">' + d[i].nama_kelurahan + '</option>');
						}
					});
					console.log($(this).children("option:selected").val());
				});
		});
	</script>

</body>
</html>