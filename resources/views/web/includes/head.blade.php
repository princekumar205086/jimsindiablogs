<meta charset="utf-8">
<title>@yield('title') - {{ $setting->website_title ?? config('app.name') }}</title>
<link rel="shortcut icon"  href="{{ asset('web/favicon/favicon.png') }}" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
<meta name="author" content="Prince" />
<meta name="keywords" content="@yield('keywords')" />
<meta name="description" content="@yield('description')" />
<!-- CSS Files -->
<link rel="stylesheet" href="{{ asset('web/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('web/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('web/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('web/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('web/css/normalize.css') }}">
<link rel="stylesheet" href="{{ asset('web/css/style.css') }}" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('web/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('web/css/responsive.css') }}" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('web/css/parsley.css') }}">
<script type="text/javascript" src="{{ asset('web/js/modernizr.min.js') }}"></script>