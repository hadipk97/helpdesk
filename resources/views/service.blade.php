@include('template.header')
@include('template.navbar')
<br>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Services</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Services</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-2" style="float: right">
                    <button type="button" class="btn btn-block btn-success" data-toggle="modal"
                        data-target="#add-modal" title="Add">
                        <i class="fa fa-plus"></i> Add</button>
                </div>
                <h3 class="card-title">List of Services</h3>
                <br>
                <table id="service_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Service Name</th>
                            <th>Description</th>
                            <th>Service Duration (Minutes)</th>
                            <th>Service Respond (Minutes)</th>
                            <th>IsActive</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- Add modal content -->
    <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="text-center bg-info p-3">
                    <h4 class="modal-title text-white" id="info-header-modalLabel">Add</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('service_add') }}" method="post" class="pl-3 pr-3">
                        @csrf
                        <div class="row">
                            <input type="hidden" id="id" name="id" class="form-control" placeholder="Id"
                                maxlength="11" required>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="serviceName"> Service Name: </label>
                                    <input type="text" id="serviceName" name="serviceName" class="form-control"
                                        placeholder="Service Name" maxlength="45">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="serviceDesc"> Description: </label>
                                    <input type="text" id="serviceDesc" name="serviceDesc" class="form-control"
                                        placeholder="Description" maxlength="255">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="serviceDuration"> Service Duration (Minutes): </label>
                                    <input type="text" id="serviceDuration" name="serviceDuration"
                                        class="form-control" placeholder="Service Duration" maxlength="45">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="serviceRespond"> Service Respond (Minutes): </label>
                                    <input type="text" id="serviceRespond" name="serviceRespond" class="form-control"
                                        placeholder="Service Respond" maxlength="45">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="isActive"> IsActive: </label>
                                    <select class="form-control" name="isActive">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-success">Add</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Add modal content -->
    <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="text-center bg-info p-3">
                    <h4 class="modal-title text-white" id="editModalLabel">Edit Service</h4>
                </div>
                <div class="modal-body">
                    <form id="edit-form" action="{{ route('service_edit') }}" method="post" class="pl-3 pr-3">
                        @csrf
                        <div class="row">
                            <input type="hidden" id="service-id" name="id" class="form-control"
                                placeholder="Id" maxlength="11" required>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="serviceName"> Service Name: </label>
                                    <input type="text" id="service-name" name="serviceName" class="form-control"
                                        placeholder="Service Name" maxlength="45">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="serviceDesc"> Description: </label>
                                    <input type="text" id="service-desc" name="serviceDesc" class="form-control"
                                        placeholder="Description" maxlength="255">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="serviceDuration"> Service Duration (Minutes): </label>
                                    <input type="text" id="service-duration" name="serviceDuration"
                                        class="form-control" placeholder="Service Duration">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="serviceRespond"> Service Respond (Minutes): </label>
                                    <input type="text" id="service-respond" name="serviceRespond"
                                        class="form-control" placeholder="Service Respond">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="isActive"> IsActive: </label>
                                    <select class="form-control" name="isActive" id="service-status">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /.content -->
</div>

<!-- page script -->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#service_table').on('click', '[data-toggle="modal"]', function() {
            // Retrieve data from the clicked button
            var serviceId = $(this).data('id');
            var serviceName = $(this).data('name');
            var serviceDesc = $(this).data('desc');
            var serviceDuration = $(this).data('duration');
            var serviceRespond = $(this).data('respond');
            var serviceStatus = $(this).data('active');

            $('#service-id').val(serviceId);
            $('#service-name').val(serviceName);
            $('#service-desc').val(serviceDesc);
            $('#service-duration').val(serviceDuration);
            $('#service-respond').val(serviceRespond);
            $('#service-status').val(serviceStatus);
            // Optionally, you can modify the modal title or do other UI adjustments here
            $('#editModalLabel').text('Edit Service - ' +
                serviceName); // Optional: Change title dynamically
        });

        $('#service_table').DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route('get_service') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'service_name',
                    name: 'service_name'
                },
                {
                    data: 'service_desc',
                    name: 'service_desc'
                },
                {
                    data: 'service_duration',
                    name: 'service_duration'
                },
                {
                    data: 'service_respond',
                    name: 'service_respond'
                },
                {
                    data: 'isActive',
                    name: 'isActive'
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
<script></script>


@include('template.footer')
