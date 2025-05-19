@extends('layouts.dashboard')
@section('sidebar')
@include('sidebar.sidebar')
@endsection
@section('content')
<div class="content">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex flex-row justify-content-between align-items-center px-4">
                    <div>

                        <span class="h6 fw-bold">Dashboard</span>

                    </div>
                    <div>
                        <div class="breadcrumb bg-white py-3">
                            <div class="d-flex flex-row bg-white">
                                <span class="breadcrumb-item fw-normal"><a href="#">Home</a></span>
                                <span class="breadcrumb-separator mx-2">/</span>
                                <span class="breadcrumb-item active fw-normal">Ticketing</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <div class="card bg-light">
        <div class="card-body">
            <div class="row mx-2">
                <div class="col-sm-6 px-2 ">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Ticket</h5>
                            <p class="card-text">
                            <div class="list-group">
                                <a href="/index.php/Ticketing/list?filter=New"
                                    class="border-start-primary border-2 rounded-2 list-group-item list-group-item-action mb-2">
                                    <div class="row ml-4">
                                        <div class="col-lg-3"><i class="h3 fas fa-exclamation-circle text-primary"></i></div>
                                        <div class="col-lg-6"><span class="fw-semibold">New</span></div>
                                        <div class="col-lg-3"><span class="h5 fw-bold">{{ $counts['New'] }}</span></div>
                                    </div>

                                </a>
                                <a href="/index.php/Ticketing/list?filter=InProgress"
                                    class="border-start-warning border-2 rounded-2 list-group-item list-group-item-action mb-2">
                                    <div class="row ml-4">
                                        <div class="col-lg-3"><i class="h3 fas fa-clock text-warning"></i></div>
                                        <div class="col-lg-6"><span class="fw-semibold">In Progress</span></div>
                                        <div class="col-lg-3"><span class="h5 fw-bold">{{ $counts['In Progress'] }}</span></div>
                                    </div>
                                </a>
                                <a href="/index.php/Ticketing/list?filter=Completed"
                                    class="border-start-success border-2 rounded-2 list-group-item list-group-item-action mb-2">
                                    <div class="row ml-4">
                                        <div class="col-lg-3"><i class="h3 fas fa-check-circle text-success"></i></div>
                                        <div class="col-lg-6"><span class="fw-semibold">Completed</span></div>
                                        <div class="col-lg-3"><span class="h5 fw-bold">{{ $counts['Completed'] }}</span></div>
                                    </div>

                                </a>
                                <a href="/index.php/Ticketing/list?filter=Close"
                                    class="border-start-danger border-2 rounded-2 list-group-item list-group-item-action">
                                    <div class="row ml-4">
                                        <div class="col-lg-3"><i class="h3 fas fa-times-circle text-danger"></i></div>
                                        <div class="col-lg-6"><span class="fw-semibold">Close</span></div>
                                        <div class="col-lg-3"><span class="h5 fw-bold">{{ $counts['Close'] }}</span></div>
                                    </div>

                                </a>
                            </div>
                            </p>
                        </div>
                    </div><br />
                </div>
                <div class="col-sm-6 px-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Service Type</h5>
                            <div class="row mt-2 pt-2">
                                <div class="col-lg-6 p-2">
                                    <a href="/index.php/Ticketing/list?filter=Software" class="text-decoration-none text-dark">
                                        <div class="card card-software rounded-8 p-4 text-decoration-none">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6 d-flex flex-column align-items-center">
                                                    <div class="mb-2 fw-semibold">Software</div>
                                                    <div class="h5 fw-bold">{{ $countsService['Software'] }}</div>
                                                </div>
                                                <div class="col-lg-5 d-flex justify-content-end align-items-end">
                                                    <div class="rounded-circle p-3 bg-white">
                                                        <i class="h3 fas fa-laptop" style="color:#1618AA;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <div class="col-lg-6 p-2">
                                    <a href="/index.php/Ticketing/list?filter=Hardware" class="text-decoration-none text-dark">
                                        <div class="card card-hardware rounded-8 py-4 px-4">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6 d-flex flex-column align-items-center">
                                                    <div class="mb-2 fw-semibold">Hardware</div>
                                                    <div class="h5 fw-bold">{{ $countsService['Hardware'] }}</div>
                                                </div>
                                                <div class="col-lg-5 d-flex justify-content-end align-items-end">
                                                    <div class="rounded-circle p-3 bg-white">
                                                        <i class="h3 fas fa-server" style="color:#AE4011;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-lg-6 p-2">
                                    <a href="/index.php/Ticketing/list?filter=License" class="text-decoration-none text-dark">
                                        <div class="card card-license rounded-8 py-4 px-4">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6 d-flex flex-column align-items-center">
                                                    <div class="mb-2 fw-semibold">License</div>
                                                    <div class="h5 fw-bold">{{ $countsService['License'] }}</div>
                                                </div>
                                                <div class="col-lg-5 d-flex justify-content-end align-items-end">
                                                    <div class="rounded-circle p-3 bg-white">
                                                        <i class="h2 fas fa-medal" style="color:#1B8E1B;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <div class="col-lg-6 p-2">
                                    <a href="/index.php/Ticketing/list?filter=Other" class="text-decoration-none text-dark">
                                        <div class="card card-other rounded-8 py-4 px-4">
                                            <div class="row align-items-center">
                                                <div class="col-lg-6 d-flex flex-column align-items-center">
                                                    <div class="mb-2 fw-semibold">Other</div>
                                                    <div class="h5 fw-bold">{{ $countsService['Other'] }}</div>
                                                </div>
                                                <div class="col-lg-5 d-flex justify-content-end align-items-end">
                                                    <div class="rounded-circle p-3 bg-white">
                                                        <i class="h3 fas fa-ellipsis-h" style="color:#151515;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="mt-3 mx-4">
                            <div class="d-flex flex-row justify-content-between mt-2">
                                <div>
                                    <h5 class="card-title fw-bold">List of Tickets</h5>
                                </div>
                                <div class="d-flex flex-row gap-2">

                                    <button type="button" class="btn btn-primary btn-md" data-toggle="modal"
                                        data-target="#add-modal" title="Add">
                                        <i class="fa fa-plus"></i> New Ticket
                                    </button>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="ticket_table" class="table">
                                <thead>
                                    <tr>

                                        <th>Ticket No.</th>
                                        <th>Requester</th>
                                        <!-- <th>Client Name</th> -->
                                        <th>Ticket subject</th>
                                        <!-- <th>Product id</th> -->
                                        <!-- <th>Ticket desc</th> -->
                                        <th>Service</th>
                                        <th>Level </th>
                                        <th>Ticket Status</th>
                                        <th>Created Date</th>
                                        <th>Action
                                            {{-- <th>Deadline Date</th> --}}
                                            <!-- <th>Deleted date</th> -->
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>


    </div>
</div>
<!-- Add modal template -->
<div id="add-modal" class="modal fade rounded-8" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="d-flex flex-row justify-content-between p-3">
                    <h5 class="modal-title fw-bold" id="info-header-modalLabel">Add New Ticket</h5>
                    <button type="button" class="btn-transparent" data-dismiss="modal">
                        <i class="h5 fa fa-times"></i>
                    </button>
                </div>
                <form action="{{ route('ticket_add') }}" method="POST" id="add-form" class="px-4 mt-4">
                    @csrf
                    <div class="row">
                        <input type="hidden" id="ticket_status" name="ticket_status" value=1>
                        <input type="hidden" id="createdBy" name="createdBy" maxlength="255"
                            value="{{ Auth::user()->n_penuh }}" readonly="readonly">
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="requester"> Requester (Email)<span class="text-danger">*</span> :</label>
                                <input type="text" name="requester" class="form-control" placeholder="Requester"
                                    maxlength="255" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="clientId"> Client: </label>
                                <!-- <input type="number" id="clientId" name="clientId" class="form-control" placeholder="Client id" maxlength="11" number="true" > -->
                                <select name="clientId" class="form-control">
                                    @foreach ($company as $comp)
                                    <option value="{{ $comp->id }}">{{ $comp->cpny_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ticketSubject"> Ticket subject: </label>
                                <input type="text" name="ticketSubject" class="form-control"
                                    placeholder="Ticket subject" maxlength="255">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Type of Product: </label>
                                <select id="typeOfProduct" name="product_type" class="form-control">
                                    <option value="1">Hardware</option>
                                    <option value="2">Software</option>
                                    <option value="3">System</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2" id="hardwareId" style="display: none">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="productId"> Product Name: </label>
                                <select name="productId" class="form-control">
                                    @foreach ($product as $prod)
                                    <option value="{{ $prod->id }}">{{ $prod->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="serviceId"> Service: </label>
                                <select name="serviceId" class="form-control">
                                    @foreach ($service as $serv)
                                    <option value="{{ $serv->id }}">{{ $serv->service_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="levelId"> Level: </label>
                                <select name="level" class="form-control">
                                    @foreach ($level as $lev)
                                    <option value="{{ $lev->id }}">{{ $lev->level_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ticketDesc"> Description: </label>
                                <textarea name="ticketDesc" class="form-control compose-textarea" rows="8" cols="10" style="text-align: left;">
Serial No:
License No:
</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ticketDesc"> Attachment: </label>
                                <input id="attachment-1" name="attachment[]" type="file" class="file"
                                    data-show-upload="true" data-show-caption="true" multiple>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-outline-light w-100 btn-lg rounded-8" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success w-100 btn-lg rounded-8" id="add-form-btn">Add</button>
                        </div>
                    </div>


                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="text-center bg-info p-3">
                <h4 class="modal-title text-white" id="editModalLabel">Edit Ticket</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('ticket_edit') }}" method="POST" id="edit-form" class="pl-3 pr-3">
                    @csrf
                    <div class="row">
                        <input type="hidden" id="ticketId" name="id" class="form-control" placeholder="Id"
                            maxlength="11" required>
                        <input type="hidden" id="createdBy" name="createdBy" maxlength="255"
                            value="{{ Auth::user()->n_penuh }}" readonly="readonly">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="requester"> Requester <span class="text-danger">*</span> :</label>
                                <input type="text" id="requester" name="requester" class="form-control"
                                    placeholder="Requester" maxlength="255" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="clientId"> Client: </label>
                                <select id="clientId" name="clientId" class="custom-select">
                                    @foreach ($company as $comp)
                                    <option value="{{ $comp->id }}">{{ $comp->cpny_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ticketSubject"> Ticket subject: </label>
                                <input type="text" id="ticketSubject" name="ticketSubject" class="form-control"
                                    placeholder="Ticket subject" maxlength="255">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Type of Product: </label>
                                <select id="type" name="product_type" class="form-control">
                                    <option value="1">Hardware</option>
                                    <option value="2">Software</option>
                                    <option value="3">System</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="hId" style="display: none">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="productId"> Product Name: </label>
                                <select id="productId" name="productId" class="custom-select">
                                    @foreach ($product as $prod)
                                    <option value="{{ $prod->id }}">{{ $prod->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ticketDesc"> Description: </label>
                                <textarea id="ticketDesc" name="ticketDesc" class="form-control compose-textarea" rows="8" cols="10">
                                    Serial No:
                                    License No:
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ticketDesc"> Attachment: </label>
                                <input id="attachment-1" name="attachment[]" type="file" class="file"
                                    data-show-upload="true" data-show-caption="true" multiple>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="serviceId"> Service: </label>
                                <select id="serviceId" name="serviceId" class="form-control">
                                    @foreach ($service as $serv)
                                    <option value="{{ $serv->id }}">{{ $serv->service_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="levelId"> Level: </label>
                                <select id="levelId" name="level" class="form-control">
                                    @foreach ($level as $lev)
                                    <option value="{{ $lev->id }}">{{ $lev->level_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-success" id="add-form-btn">Add</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

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

@endsection