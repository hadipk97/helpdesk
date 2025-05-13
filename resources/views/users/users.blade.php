@include('template.header')
@include('template.navbar')

<section class="content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8 mt-2">
                                    <h3 class="card-title">List of Helpdesk Users</h3>
                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <button style="width: 100px; float: right; padding-bottom: 10px" type="button"
                                class="btn btn-block btn-success" data-toggle="modal" data-target="#add-modal"
                                title="Add">
                                <i class="fa fa-plus"></i> Add</button>
                            <br>
                            <br>
                            <table id="user_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8 mt-2">
                                    <h3 class="card-title">List of Roles</h3>
                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <button style="width: 100px; float: right; padding-bottom: 10px" type="button"
                                class="btn btn-block btn-success" data-toggle="modal" data-target="#add-role-modal"
                                title="Add">
                                <i class="fa fa-plus"></i> Add</button>
                            <br>
                            <br>
                            <table id="role_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:60px">No</th>
                                        <th>Role Name</th>
                                        <th>Role Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- Add User Modal -->
    <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="text-center bg-info p-3">
                    <h4 class="modal-title text-white" id="info-header-modalLabel">Add Users</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add_users') }}" method="post" class="pl-3 pr-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="username"> Username: </label>
                                    <input type="text" id="username" name="username" class="form-control"
                                        placeholder="Username" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nPenuh"> Full Name: </label>
                                    <input type="text" id="nPenuh" name="nPenuh" class="form-control"
                                        placeholder="Full Name" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password"> Password: </label>
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email"> Email: </label>
                                    <input type="text" id="email" name="email" class="form-control"
                                        placeholder="Email" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tel"> Telephone: </label>
                                    <input type="text" id="tel" name="tel" class="form-control"
                                        placeholder="Telephone" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="role"> Role: </label>
                                    <select id="type" name="role" class="form-control"
                                        placeholder="User Type" maxlength="50">
                                        @foreach ($role as $role)
                                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="stat"> Status: </label>
                                    <select id="stat" name="stat" class="form-control" maxlength="50">
                                        <option value="1">Active</option>
                                        <option value="2">InActive</option>
                                    </select>
                                </div>
                            </div>
                            <input type='hidden' id="sessionID" name="sessionID" class="form-control"
                                placeholder="SessionID"></input>
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
    <!-- Edit User modal content -->
    <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="text-center bg-info p-3">
                    <h4 class="modal-title text-white" id="editModalLabel">Update</h4>
                </div>
                <div class="modal-body">
                    <form id="edit-form" method="post" action="{{ route('user_update') }}" class="pl-3 pr-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="username"> Username: </label>
                                    <input type="text" id="user-username" name="username" class="form-control"
                                        placeholder="Username" maxlength="50">
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password"> Password: </label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Password">
                                </div>
                            </div> --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="role"> Role: </label>
                                    <select id="user-role_id" name="role" class="form-control" placeholder="Role"
                                        maxlength="50">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nPenuh"> Full Name: </label>
                                    <input type="text" id="user-fullname" name="nPenuh" class="form-control"
                                        placeholder="Full Name" maxlength="50">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email"> Email: </label>
                                    <input type="text" id="user-email" name="email" class="form-control"
                                        placeholder="Email" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tel"> Telephone: </label>
                                    <input type="text" id="user-tel" name="tel" class="form-control"
                                        placeholder="Telephone" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stat"> Status: </label>
                                    <select id="user-stat" name="stat" class="form-control" maxlength="50">
                                        <option value="1">Active</option>
                                        <option value="2">InActive</option>
                                    </select>

                                </div>
                            </div>
                            <input type='hidden' id="user-id" name="sessionID" class="form-control"
                                placeholder="SessionID"></input>
                        </div>
                        <div class="form-group text-center">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-success" id="edit-form-btn">Update</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- Add Role Modal -->
    <div id="add-role-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="text-center bg-info p-3">
                    <h4 class="modal-title text-white" id="info-header-modalLabel">Add Role</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add_roles') }}" method="post" class="pl-3 pr-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="role"> Role Name: </label>
                                    <input type="text" id="role_name" name="role_name" class="form-control"
                                        placeholder="Role Name" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="role_desc"> Role Description: </label>
                                    <input type="text" id="role_desc" name="role_desc" class="form-control"
                                        placeholder="Role Description" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="isActive"> IsActive: </label>
                                    <select class="form-control" name="isActive" id="role_stat">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
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
            </div>
        </div>
    </div>
    <!-- Edit Role Modal -->
    <div id="edit-role-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="text-center bg-info p-3">
                    <h4 class="modal-title text-white" id="editRoleLabel">Add Role</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit_roles') }}" method="post" class="pl-3 pr-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="role"> Role Name: </label>
                                    <input type="text" id="role-role" name="role_name" class="form-control"
                                        placeholder="Role Name" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="role_desc"> Role Description: </label>
                                    <input type="text" id="role-desc" name="role_desc" class="form-control"
                                        placeholder="Role Description" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="isActive"> IsActive: </label>
                                    <select class="form-control" name="isActive" id="role-stat">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
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
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#user_table').on('click', '[data-toggle="modal"]', function() {
            // Retrieve data from the clicked button
            var id = $(this).data('id');
            var username = $(this).data('username');
            var fullname = $(this).data('fullname');
            var email = $(this).data('email');
            var roleId = $(this).data('role_id');
            var tel = $(this).data('tel');
            var active = $(this).data('active');

            $('#user-username').val(username);
            $('#user-fullname').val(fullname);
            $('#user-role_id').val(roleId);
            $('#user-email').val(email);
            $('#user-tel').val(tel);
            $('#userstat').val(active);
            $('#user-id').val(id);
            // Optionally, you can modify the modal title or do other UI adjustments here
            $('#editModalLabel').text('Update - ' +
                fullname); // Optional: Change title dynamically

            $.ajax({
                url: "{{ route('list_role') }}", // Use Laravel route
                type: "GET",
                success: function(response) {
                    let roleDropdown = $("#user-role_id");
                    roleDropdown.empty(); // Clear existing options

                    // // Add default option
                    // roleDropdown.append('<option value="">Select Role</option>');

                    response.roles.forEach(function(role) {
                        let selected = role.id == roleId ? "selected" : "";
                        roleDropdown.append(
                            `<option value="${role.id}" ${selected}>${role.role}</option>`
                        );
                    });

                    // Show the modal after populating
                    $("#edit-modal").modal("show");
                },
                error: function() {
                    alert("Failed to load roles.");
                },
            })
        });

        $('#role_table').on('click', '[data-toggle="modal"]', function() {
            var id = $(this).data('id');
            var role_name = $(this).data('name');
            var desc = $(this).data('desc');
            var stat = $(this).data('stat');

            $('#role-id').val(id);
            $('#role-role').val(role_name);
            $('#role-desc').val(desc);
            $('#role-stat').val(stat);
            $('#editRoleLabel').text('Update - ' +
                role_name);
        });

        $('#user_table').DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route('get_users') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'n_penuh',
                    name: 'n_penuh'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'tel',
                    name: 'tel'
                },
                {
                    data: 'roles',
                    name: 'roles'
                },
                {
                    data: 'action',
                    name: 'action',
                } // The action buttons
            ]
        });

        $('#role_table').DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route('get_roles') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'role_desc',
                    name: 'role_desc'
                },
                {
                    data: 'action',
                    name: 'action',
                } // The action buttons
            ]
        });
    });
</script>
@include('template.footer')
