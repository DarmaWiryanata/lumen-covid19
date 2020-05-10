<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Survey Berhasil</title>

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
<body onLoad="setTimeout('delayedRedirect()', 8000)" style="background:#fff;">

<div id="success">
    <div class="icon icon--order-success svg">
         <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
          <g fill="none" stroke="#8EC343" stroke-width="2">
             <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
             <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
          </g>
         </svg>
     </div>
    <h4><span>Pengisian Berhasil</span>Terima kasih telah mengisi</h4>
	<small>Sumber: @foreach ($sumber as $item)<a href="{{ $item->url }}" style="color: black">{{ $item->nama }} @if ($loop->last)@else, @endif</a>@endforeach</small>
    <br>
    <a href="{{ route('index') }}" class="btn btn-sm btn-success mt-3">Kembali mengisi kuesioner</a>
</div>

</body>
</html>