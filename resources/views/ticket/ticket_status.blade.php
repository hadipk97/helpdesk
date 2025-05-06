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
                                        <th>Updated by</th>
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
                                <label for="createdAt"> Start Date: </label>
                                <input type="date" id="createdAt" name="start_date" class="form-control"
                                    dateISO="true">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="createdAt"> End Date: </label>
                                <input type="date" id="createdAt" name="end_date" class="form-control"
                                    dateISO="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Employee Name</label>
                                <select name="employee[]" class="form-control select2" multiple="multiple"
                                    style="width: 100%">
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
                                <label>Appointment Time</label>
                                <input type="time" name="appointment_time" class="form-control timepicker"
                                    value="{{ now()->format('H:i') }}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Service Type</label>
                                <select name="service[]" class="form-control select2" multiple="multiple"
                                    style="width: 100%">
                                    @foreach ($service as $id => $desc)
                                        <option value="{{ $id }}">
                                            {{ $desc }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ticketStatus"> Ticket status: </label>
                                <select id="ticketStatus" name="ticketStatus" class="form-control"
                                    placeholder="Ticket status" maxlength="45">

                                    @switch (Auth::user()->role_id)
                                        @case (8)
                                            <option value="Rechecking">Rechecking</option>
                                            <option value="Close">Close</option>';
                                        @break

                                        @case (1)
                                            @foreach ($cpmsuser as $user)
                                                <option value="Assigned Task to {{ $user->n_penuh }}"
                                                    label="Assigned Task to {{ $user->n_penuh }}">
                                                    Assigned Task to {{ $user->n_penuh }}
                                                </option>
                                            @endforeach
                                        @break

                                        @case (6)

                                        @case(7)
                                            <option value="Update">Update</option>
                                            <option value="Complete">Completed</option>';
                                        @break

                                    @endswitch
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Priority</label>
                                <select name="level" class="form-control">
                                    @foreach ($level as $lev)
                                        <option value="{{ $lev->id }}">{{ $lev->level_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="remarks"> Remarks: </label>
                                @switch (Auth::user()->role_id)
                                    @case(1)
                                        <textarea id="remarks" name="remarks" class="form-control" placeholder="Remarks" maxlength="255"></textarea>
                                    @break

                                    @case(6)
                                    @case(7)
                                        <select id="remarks" name="remarks" class="form-control" placeholder="Remarks"
                                            maxlength="255">
                                            <option value="">Please Select</option>
                                            <option value="Level 1 - Support by Call/Email by {{ Auth::user()->n_penuh }}">
                                                Level 1 - Support by Call/Email</option>
                                            <option value="Level 2 - Onsite Support by {{ Auth::user()->n_penuh }}">
                                                Level 2 - Onsite Support</option>
                                            <option value="Level 3 - Escalate to Principal by {{ Auth::user()->n_penuh }}">
                                                Level 3 - Escalate to Principal</option>
                                            <option value="">No Remarks</option>
                                        </select>
                                    @break

                                    @default
                                        <textarea id="remarks" name="remarks" class="form-control" placeholder="Remarks" maxlength="255"></textarea>
                                    @break
                                @endswitch
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
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'created_by',
                    name: 'created_by'
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
