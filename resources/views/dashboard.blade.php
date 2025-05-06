@include('template.header')
@include('template.navbar')
<br>
<div class="content">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Ticketing</li>
                            </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ticket</h5>
                            <p class="card-text">
                            <div class="list-group">
                                <a href="/index.php/Ticketing/list?filter=New"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    New<span class="badge badge-primary badge-pill">{{ $counts['New'] }}</span>
                                </a>
                                <a href="/index.php/Ticketing/list?filter=InProgress"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    In Progress<span class="badge badge-warning badge-pill"
                                        style="color: #ffffff">{{ $counts['In Progress'] }}</span>
                                </a>
                                <a href="/index.php/Ticketing/list?filter=Completed"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    Completed<span class="badge badge-info badge-pill">{{ $counts['Completed'] }}</span>
                                </a>
                                <a href="/index.php/Ticketing/list?filter=Close"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    Close<span class="badge badge-success badge-pill">{{ $counts['Close'] }}</span>
                                </a>
                            </div>
                            </p>
                        </div>
                    </div><br />
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Service Type</h5>
                            <p class="card-text">
                            <div class="list-group">
                                <a href="/index.php/Ticketing/list?filter=Software"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    Software
                                    <span class="badge  badge-pill"
                                        style="background-color: #d966ff; color: #ffffff">{{ $countsService['Software'] }}</span>
                                </a>
                                <a href="/index.php/Ticketing/list?filter=Hardware"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    Hardware
                                    <span class="badge badge-pill"
                                        style="background-color: #d966ff; color: #ffffff">{{ $countsService['Hardware'] }}</span>
                                </a>
                                <a href="/index.php/Ticketing/list?filter=License"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    License
                                    <span class="badge badge-pill"
                                        style="background-color: #d966ff; color: #ffffff">{{ $countsService['License'] }}</span>
                                </a>
                                <a href="/index.php/Ticketing/list?filter=Other"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    Other
                                    <span class="badge badge-pill"
                                        style="background-color: #d966ff; color: #ffffff">{{ $countsService['Other'] }}</span>
                                </a>
                            </div>
                            </p>

                        </div>
                    </div><br />
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 mt-2">
                                <h3 class="card-title">List of Ticket</h3>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-block btn-success" href="/index.php/Ticketing/spreadsheet"> <i
                                        class="fa fa-book"> </i> Export</a>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-block btn-success" data-toggle="modal"
                                    data-target="#add-modal" title="Add">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="ticket_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
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
<!-- Add modal template -->
<div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="text-center bg-info p-3">
                <h4 class="modal-title text-white" id="info-header-modalLabel">Add New Ticket</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('ticket_add') }}" method="POST" id="add-form" class="pl-3 pr-3">
                    @csrf
                    <div class="row">
                        <input type="hidden" id="ticket_status" name="ticket_status" value=1>
                        <input type="hidden" id="createdBy" name="createdBy" maxlength="255"
                            value="{{ Auth::user()->n_penuh }}" readonly="readonly">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="requester"> Requester <span class="text-danger">*</span> :</label>
                                <input type="text" name="requester" class="form-control" placeholder="Requester"
                                    maxlength="255" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="clientId"> Client: </label>
                                <!-- <input type="number" id="clientId" name="clientId" class="form-control" placeholder="Client id" maxlength="11" number="true" > -->
                                <select name="clientId" class="custom-select">
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
                    <div class="row">
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
                    <div class="row" id="hardwareId" style="display: none">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="productId"> Product Name: </label>
                                <select name="productId" class="custom-select">
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
                                <textarea name="ticketDesc" class="form-control compose-textarea" rows="8" cols="10">
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
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route('get_ticket') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
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
                    data: 'created_at',
                    name: 'created_at'
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
@include('template.footer')
