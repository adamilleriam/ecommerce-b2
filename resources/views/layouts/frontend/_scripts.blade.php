<!-- Plugins JS File -->

<script src="{{ asset('vendors/jquery/dist/jquery.js') }}"></script>
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.js') }}"></script>

<script src="{{ asset('assets/frontend/js/plugins.min.js') }}"></script>
@stack('library-js')
<!-- Main JS File -->
<script src="{{ asset('assets/frontend/js/main.min.js') }}"></script>
@stack('custom-js')