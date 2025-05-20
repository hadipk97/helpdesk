@include('template.header')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ticket Status</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Ticket List</a></li>
                        <li class="breadcrumb-item active">
                            {{ $ticket->ticket_no }}
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 mt-2">
                                <h3 class="card-title">Ticket {{ $ticket->ticket_no }} </h3>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-block btn-success" data-toggle="modal"
                                    data-target="#update-modal" title="Update">
                                    <i class="fa fa-pencil-alt"></i> Assign Ticket</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-4">
                            <h4>Ticket Details</h4>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Ticket No</th>
                                    {{-- {{ dd($cpmsuser) }} --}}
                                    <td>{{ $ticket->ticket_no }}</td>
                                </tr>
                                <tr>
                                    <th>Requester</th>
                                    <td>{{ $ticket->requester }}</td>
                                </tr>
                                <tr>
                                    <th>Client Name</th>
                                    <td>{{ $ticket->company->cpny_name }}</td>
                                </tr>
                                <tr>
                                    <th>Product Name</th>
                                    <td>
                                        @if ($ticket->product)
                                            {{ $ticket->product->product_name }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $ticket->ticket_desc }}</td>
                                </tr>
                                <tr>
                                    <th>Service</th>
                                    <td>
                                        {{ $ticket->service->service_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Level</th>
                                    <td>
                                        {{ $ticket->level->level_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Attachment</th>
                                    <td>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-8">
                            <table id="history_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Ticket status</th>
                                        <th>Date</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="text-center bg-info p-3">
                <h4 class="modal-title text-white" id="info-header-modalLabel">Assign Ticket</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('ticket_assign') }}" method="post" class="pl-3 pr-3">
                    @csrf
                    <div class="row">
                        <input type="hidden" id="hdTicketId" name="hdTicketId" placeholder="Hd ticket id"
                            value="<?= $ticket->id ?>">
                        <input type="hidden" id="ticket_no" name="priority" value="<?= $ticket->level_id ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Task No:</label>
                                <input type="text" name="task_no" value="{{ $taskNo }}" class="form-control"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="createdAt"> Start Date: <font color="red"> *</font></label>
                                <input type="date" id="createdAt" name="start_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="createdAt"> End Date: <font color="red"> *</font></label>
                                <input type="date" id="createdAt" name="end_date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Employee Name <font color="red"> *</font></label>
                                <select name="employee[]" class="form-control select2" multiple="multiple"
                                    style="width: 100%" required>
                                    @foreach ($cpmsuser as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->n_penuh }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Appointment Time <font color="red"> *</font></label>
                                <input type="time" name="appointment_time" class="form-control timepicker"
                                    value="{{ now()->format('H:i') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Service Type <font color="red"> *</font></label>
                                <select name="service[]" class="form-control select2" multiple="multiple"
                                    style="width: 100%" required>
                                    @foreach ($service as $id => $desc)
                                        <option value="{{ $id }}">
                                            {{ $desc }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Priority <font color="red"> *</font></label>
                                <select name="level" class="form-control" required>
                                    <option>--Option--</option>
                                    @foreach ($level as $lev)
                                        <option value="{{ $lev->id }}">{{ $lev->level_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Client Name:</label>
                                <input type="text" name="client" class="form-control"
                                    value="{{ $ticket->requester }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="remarks"> Task Description: <font color="red"> *</font></label>
                                <textarea id="remarks" name="remarks" class="form-control" placeholder="Remarks" maxlength="255" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-success" id="add-form-btn">Assign</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script>
    function changeRemarks(e) {
        if (e.value === "Assigned") {
            var x = document.getElementById("ticketStatus").selectedIndex;
            var remarks = document.getElementsByTagName("option")[x].label;
            document.getElementById("remarks").value = remarks;
        } else {
            document.getElementById("remarks").value = '';
        }
    }

    document.getElementById('ticketStatus').addEventListener('change', function() {
        changeRemarks(this);
    });
</script>
<script>
    $(document).ready(function() {
        let ticketNo = @json($ticket->ticket_no);
        let encodedTicketNo = encodeURIComponent(ticketNo);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#history_table').DataTable({
            processing: true,
            ajax: `/ticket_status/${encodedTicketNo}/histories`,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: true,
                    searchable: false
                },
                {
                    data: 'ticket_status',
                    name: 'ticket_status'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
                {
                    data: 'remarks',
                    name: 'remarks'
                },
            ]
        });
    });
</script>

@include('template.footer')
