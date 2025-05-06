@include('template.header')
@include('template.navbar')
<br>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Department</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Group</li>
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
                <h3 class="card-title">List of Departments</h3>
                <br>
                <table id="group_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Department</th>
                            <th>Status</th>
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
                    <h4 class="modal-title text-white" id="info-header-modalLabel">Add Group</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('group_add') }}" class="pl-3 pr-3" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="dept"> Group Name: </label>
                                    <input type="text" id="dept" name="dept" class="form-control"
                                        placeholder="Dept" maxlength="50">
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
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

    <!-- Add modal content -->
    <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="text-center bg-info p-3">
                    <h4 class="modal-title text-white" id="editModalLabel">Edit Department</h4>
                </div>
                <div class="modal-body">
                    <form id="edit-form" action="{{ route('group_edit') }}" method="post" class="pl-3 pr-3">
                        @csrf
                        <div class="row">
                            <input type="hidden" id="group-id" name="id" class="form-control" placeholder="Id"
                                maxlength="11" required>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="dept"> Group Name: </label>
                                    <input type="text" id="group-dept" name="dept" class="form-control"
                                        placeholder="Department" maxlength="45">
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

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#group_table').on('click', '[data-toggle="modal"]', function() {
            // Retrieve data from the clicked button
            var groupId = $(this).data('id');
            var groupName = $(this).data('dept');

            $('#group-id').val(groupId);
            $('#group-dept').val(groupName);
            // Optionally, you can modify the modal title or do other UI adjustments here
            $('#editModalLabel').text('Edit Department - ' +
                groupName); // Optional: Change title dynamically
        });

        $('#group_table').DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route('get_group') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'dept',
                    name: 'dept'
                },
                {
                    data: 'stat',
                    name: 'stat'
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
