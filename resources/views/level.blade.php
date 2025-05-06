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
                    <h1>Levels</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Levels</li>
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
                        <i class="fa fa-plus"></i> Add Level</button>
                </div>
                <h3 class="card-title">List of Level</h3>
                <br>
                <table id="level_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Level Name</th>
                            <th>Response Time (Working Hours)</th>
                            <th>Resolve Time (Working Hours)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.row -->
    </section>
    <!-- Add modal content -->
    <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="text-center bg-info p-3">
                    <h4 class="modal-title text-white" id="info-header-modalLabel">Add</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('level_add') }}" method="post" class="pl-3 pr-3">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="name" class="form-control" placeholder="Id" maxlength="11"
                                value="{{ Auth::user()->n_penuh }}" readonly="readonly">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="levelName"> Level Name: </label>
                                    <input type="text" id="levelName" name="levelName" class="form-control"
                                        placeholder="Level Name" maxlength="45">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="level_respond"> Respone Time (Working Hours): </label>
                                    <input type="text" id="level_respond" name="level_respond" class="form-control"
                                        maxlength="255">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="level_duration"> Resolve Time (Working Hours): </label>
                                    <input type="text" id="level_duration" name="level_duration" class="form-control"
                                        maxlength="45">
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-success">Add Level</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<!-- page script -->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#level_table').DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route('get_level') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'level_name',
                    name: 'level_name'
                },
                {
                    data: 'level_respond',
                    name: 'level_respond'
                },
                {
                    data: 'level_duration',
                    name: 'level_duration'
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
