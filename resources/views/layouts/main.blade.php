<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>

<body>
	@include('partials.navigation')
	@yield('content')
    @include('partials.footer-script')
</body>

</html>