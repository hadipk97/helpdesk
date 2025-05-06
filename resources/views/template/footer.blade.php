<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{-- <!-- jQuery (required for Select2) -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script> --}}

<!-- Select2 JS -->
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

</body>
<script>
    @if (Session::has('toastr'))
        var toastrData = @json(Session::get('toastr'));
        toastr[toastrData.type](toastrData.message);
    @endif
</script>

</html>
