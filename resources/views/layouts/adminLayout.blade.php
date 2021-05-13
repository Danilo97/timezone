<!doctype html>
<html class="no-js" lang="zxx">
@include("fixed.head")
<body>
@if(\Illuminate\Support\Facades\Session::has('user') && \Illuminate\Support\Facades\Session::get('user')[0]->role_id != 1)
    <script>window.location.href = '/'</script>
@elseif(!\Illuminate\Support\Facades\Session::has('user'))
    <script>window.location.href = '/'</script>
@else
    @include("fixed.preloader")
    @include("fixed.adminNavigation")
    @yield("content")
    @include("fixed.scripts")
@endif

{{--@include("fixed.preloader")--}}
{{--@include("fixed.adminNavigation")--}}
{{--@yield("content")--}}
{{--@include("fixed.scripts")--}}
</body>
</html>

