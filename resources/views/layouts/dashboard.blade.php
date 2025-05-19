<html>

<head>
    <title>Support Ticketing System </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="https://adminlte.io/themes/v3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="https://adminlte.io/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- jquery-validation -->
    <script src="https://adminlte.io/themes/v3/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- DataTables -->
    <script src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://adminlte.io/themes/v3/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <!-- ChartJS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

    <!-- Toastr JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Select2 CSS -->
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />

</head>


<body id="body-pd" class="d-flex">
    {{-- Sidebar --}}
    <aside id="sidebar" class="sidebar">
        @yield('sidebar')
    </aside>

    <main role="main" class="main-content flex-grow-1">
        @include('template.navbar')
        @yield('content')
    </main>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const typeSelect = document.querySelector("#typeOfProduct");
        const productDiv = document.querySelector("#hardwareId");

        function toggleProductDiv() {
            if (typeSelect.value == 1 || typeSelect.value == 2) {
                productDiv.style.display = "block";
            } else {
                productDiv.style.display = "none";
            }
        }

        typeSelect.addEventListener("change", toggleProductDiv);

        toggleProductDiv()
    });

    document.addEventListener("DOMContentLoaded", function() {
        const tSelect = document.querySelector("#type");
        const pDiv = document.querySelector("#hId");

        function togglePDiv() {
            if (tSelect.value == 1 || tSelect.value == 2) {
                pDiv.style.display = "block";
            } else {
                pDiv.style.display = "none";
            }
        }

        tSelect.addEventListener("change", togglePDiv);

        togglePDiv()
    });

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#ticket_table').on('click', '[data-toggle="modal"]', function() {
            // Retrieve data from the clicked button
            var ticketId = $(this).data('id');
            var ticketNo = $(this).data('ticket_no');
            var requester = $(this).data('requester');
            var client = $(this).data('client');
            var subject = $(this).data('subject');
            var desc = $(this).data('desc');
            var product = $(this).data('product');
            var product_type = $(this).data('product_type');
            var service = $(this).data('service');
            var level = $(this).data('level');

            $('#ticketId').val(ticketId);
            $('#requester').val(requester);
            $('#clientId').val(client);
            $('#ticketSubject').val(subject);
            $('#type').val(product_type);
            $('#productId').val(product);
            $('#serviceId').val(service);
            $('#levelId').val(level);

            if (product_type == 1 || product_type == 2) {
                $('#hId').show();
            } else {
                $('#hId').hide();
            }
            // Optionally, you can modify the modal title or do other UI adjustments here
            $('#editModalLabel').text('Edit Ticket - ' +
                ticketNo); // Optional: Change title dynamically
        });

        $('#ticket_table').DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route('get_ticket') }}',
            columns: [{
                    data: 'ticket_no',
                    name: 'ticket_no'
                },
                {
                    data: 'requester',
                    name: 'requester'
                },
                {
                    data: 'ticket_subject',
                    name: 'ticket_subject'
                },
                {
                    data: 'service_id',
                    name: 'service_id'
                },
                {
                    data: 'level_id',
                    name: 'level_id'
                },
                {
                    data: 'ticket_status',
                    name: 'ticket_status'
                },
                {
                    data: 'created_date',
                    name: 'created_date'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                } // The action buttons
            ]
        });

    });
</script>

</html>