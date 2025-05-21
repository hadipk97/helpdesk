<script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{-- <!-- jQuery (required for Select2) -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script> --}}

<!-- Select2 JS -->
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script>
    // $(document).ready(function() {
    //     $('.select2').select2();
    // });

    document.addEventListener("DOMContentLoaded", function() {
        const sidebarToggle = document.getElementById("sidebarCollapse");
        const sidebar = document.getElementById("sidebar");

        // Hide by default on small screens
        if (window.innerWidth <= 768) {
            sidebar.classList.remove("active"); // ensure hidden initially
        }

        sidebarToggle.addEventListener("click", function() {
            sidebar.classList.toggle("active");
        });
    });
</script>
<script>
    @if(Session::has('toastr'))
    var toastrData = @json(Session::get('toastr'));
    toastr[toastrData.type](toastrData.message);
    @endif
</script>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId)

            // Validate that all variables exist
            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener('click', () => {
                    // show navbar
                    nav.classList.toggle('show')
                    // change icon
                    toggle.classList.toggle('bx-x')
                    // add padding to body
                    bodypd.classList.toggle('body-pd')
                    // add padding to header
                    headerpd.classList.toggle('body-pd')
                })
            }
        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
            if (linkColor) {
                linkColor.forEach(l => l.classList.remove('active'))
                this.classList.add('active')
            }
        }
        linkColor.forEach(l => l.addEventListener('click', colorLink))

        // Your code to run since DOM is loaded and ready
    });
</script>
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