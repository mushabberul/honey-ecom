<!-- Vendor Scripts Start -->
{{--<script src="{{asset('assets/backend')}}/js/vendor/jquery-3.5.1.min.js"></script>--}}
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="{{asset('assets/backend')}}/js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/backend')}}/js/vendor/OverlayScrollbars.min.js"></script>
<!-- Vendor Scripts End -->

<!-- Template Base Scripts Start -->
<script src="{{asset('assets/backend')}}/font/CS-Line/csicons.min.js"></script>
<script src="{{asset('assets/backend')}}/js/base/helpers.js"></script>
<script src="{{asset('assets/backend')}}/js/base/globals.js"></script>
<script src="{{asset('assets/backend')}}/js/base/nav.js"></script>
<script src="{{asset('assets/backend')}}/js/base/search.js"></script>
<script src="{{asset('assets/backend')}}/js/base/settings.js"></script>
<script src="{{asset('assets/backend')}}/js/base/init.js"></script>
<!-- Template Base Scripts End -->
<!-- Toastr Start -->
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script>
    {!! Toastr::message() !!}
</script>
<!-- Toastr End -->
<!-- Page Specific Styles Start -->
@stack('admin_script')
<!-- Page Specific Styles end -->
