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
							{{-- Fitur sebar kuesioner di media sosial --}}
	            {{-- <div class="col-7">
	                <div id="social">
	                    <ul>
	                        <li><a href="#0"><i class="social_facebook"></i></a></li>
	                        <li><a href="#0"><i class="social_twitter"></i></a></li>
	                        <li><a href="#0"><i class="social_instagram"></i></a></li>
	                        <li><a href="#0"><i class="social_linkedin"></i></a></li>
	                    </ul>
	                </div>
	            </div> --}}
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
	                        <p>{{ $kasus->nama }}</p>
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
												<input type="text" id="kategori-{{ $loop->iteration }}" name="kategori[]" value="1" hidden>
												<input type="text" id="kategori-{{ $loop->iteration }}" name="kategori[]" value="1" hidden>
												<div class="review_block">
													<ul>
														<li>
															<div class="checkbox_radio_container">
																<input type="radio" id="jawaban-{{ $loop->iteration }}a" name="jawaban[]" class="required" value="1" onchange="getVals(this, 'jawaban[]');" autofocus>
																<label class="radio" for="jawaban-{{ $loop->iteration }}a"></label>
																<label for="jawaban-{{ $loop->iteration }}a" class="wrapper">Benar</label>
															</div>
														</li>
														<li>
															<div class="checkbox_radio_container">
																<input type="radio" id="jawaban-{{ $loop->iteration }}b" name="jawaban[]" class="required" value="2" onchange="getVals(this, 'jawaban[]');">
																<label class="radio" for="jawaban-{{ $loop->iteration }}b"></label>
																<label for="jawaban-{{ $loop->iteration }}b" class="wrapper">Salah</label>
															</div>
														</li>
														<li>
															<div class="checkbox_radio_container">
																<input type="radio" id="jawaban-{{ $loop->iteration }}c" name="jawaban[]" class="required" value="3" onchange="getVals(this, 'jawaban[]');">
																<label class="radio" for="jawaban-{{ $loop->iteration }}c"></label>
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
												<input type="text" id="kategori-{{ $loop->iteration }}" name="kategori[]" value="2" hidden>
												<div class="review_block_smiles">
													<ul class="clearfix">
														<li>
															<div class="container_numbers">
																<input type="radio" id="jawaban-{{ $loop->iteration }}a" name="jawaban[]" class="required" value="1" autofocus>
																<label class="radio very_bad" for="jawaban-{{ $loop->iteration }}a">1</label>
															</div>
														</li>
														<li>
															<div class="container_numbers">
																<input type="radio" id="jawaban-{{ $loop->iteration }}b" name="jawaban[]" class="required" value="2">
																<label class="radio bad" for="jawaban-{{ $loop->iteration }}b">2</label>
															</div>
														</li>
														<li>
															<div class="container_numbers">
																<input type="radio" id="jawaban-{{ $loop->iteration }}c" name="jawaban[]" class="required" value="3">
																<label class="radio average" for="jawaban-{{ $loop->iteration }}c">3</label>
															</div>
														</li>
														<li>
															<div class="container_numbers">
																<input type="radio" id="jawaban-{{ $loop->iteration }}d" name="jawaban[]" class="required" value="4">
																<label class="radio good" for="jawaban-{{ $loop->iteration }}d">4</label>
															</div>
														</li>
														<li>
															<div class="container_numbers">
																<input type="radio" id="jawaban-{{ $loop->iteration }}e" name="jawaban[]" class="required" value="5">
																<label class="radio very_good" for="jawaban-{{ $loop->iteration }}e">5</label>
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

	                                <div class="submit step">
	                                    <h3 class="main_question"><strong>Responden</strong>Isi sesuai form</h3>
	                                    <div class="form-group">
	                                        <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
											<select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control required" autofocus>
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
											<select name="pekerjaan" id="pekerjaan" class="form-control required">
												<option value="" hidden>--Pilih pekerjaan</option>
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
										<div class="row">
											<div class="col-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="provinsi">Provinsi</label>
													<select name="provinsi" id="provinsi" class="form-control required">
														<option value="" hidden>--Pilih provinsi</option>
														<option value="Tidak sekolah">Tidak sekolah</option>
														<option value="SD/sederajat">SD/sederajat</option>
														<option value="SMP/sederajat">SMP/sederajat</option>
														<option value="SMA/sederajat">SMA/sederajat</option>
													</select>
												</div>
											</div>
											<div class="col-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="kabupaten">Kabupaten/kota</label>
													<select name="kabupaten" id="kabupaten" class="form-control required">
														<option value="" hidden>--Pilih kabupaten/kota</option>
														<option value="Tidak sekolah">Tidak sekolah</option>
														<option value="SD/sederajat">SD/sederajat</option>
														<option value="SMP/sederajat">SMP/sederajat</option>
														<option value="SMA/sederajat">SMA/sederajat</option>
													</select>
												</div>
											</div>
											<div class="col-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="kecamatan">Kecamatan</label>
													<select name="kecamatan" id="kecamatan" class="form-control required">
														<option value="" hidden>--Pilih kecamatan</option>
														<option value="Tidak sekolah">Tidak sekolah</option>
														<option value="SD/sederajat">SD/sederajat</option>
														<option value="SMP/sederajat">SMP/sederajat</option>
														<option value="SMA/sederajat">SMA/sederajat</option>
													</select>
												</div>
											</div>
											<div class="col-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="desa">Desa/kelurahan</label>
													<select name="desa" id="desa" class="form-control required">
														<option value="" hidden>--Pilih desa/kelurahan</option>
														<option value="Tidak sekolah">Tidak sekolah</option>
														<option value="SD/sederajat">SD/sederajat</option>
														<option value="SMP/sederajat">SMP/sederajat</option>
														<option value="SMA/sederajat">SMA/sederajat</option>
													</select>
												</div>
											</div>
										</div>
	                                    <div class="row">
	                                        <div class="col-lg-3 col-md-3 col-3">
	                                            <div class="form-group">
	                                                <label for="tahun_lahir">Tahun Lahir</label>
	                                                <input type="text" name="tahun_lahir" id="tahun_lahir" class="form-control required" min="1900" max="2100">
	                                            </div>
	                                        </div>
	                                        <div class="col-9">
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
	    <footer>
	        <div class="container-fluid">
	            <div class="row">
	                <div class="col-md-3">
	                    ©2020 Satisfyc
	                </div>
	                {{-- <div class="col-md-9">
	                    <ul class="clearfix">
	                        <li><a href="#0" class="animated_link">Purchase this template</a></li>
	                        <li><a href="index.html" class="animated_link">Demo 1</a></li>
	                        <li><a href="index-2.html" class="animated_link">Demo 2</a></li>
	                        <li><a href="index-3.html" class="animated_link">Demo 3</a></li>
	                    </ul>
	                </div> --}}
	            </div>
	            <!-- /row -->
	        </div>
	        <!-- /container-fluid -->
	    </footer>
	    <!-- /footer -->
	</div>
	<!-- /wrapper_centering -->

	<!-- Modal terms -->
	<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
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

</body>
</html>