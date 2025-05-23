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
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
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
    (function($) {

        "use strict";

        var fullHeight = function() {

            $('.js-fullheight').css('height', $(window).height());
            $(window).resize(function() {
                $('.js-fullheight').css('height', $(window).height());
            });

        };
        fullHeight();

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });

    })(jQuery);
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