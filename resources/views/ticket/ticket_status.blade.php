@extends('layouts.dashboard')


@section('sidebar')
@include('sidebar.sidebar')
@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex flex-row justify-content-between align-items-center px-4">
                <div>

                    <span class="h6 fw-bold">Ticket Status</span>

                </div>
                <div>
                    <div class="breadcrumb bg-white py-3">
                        <div class="d-flex flex-row bg-white">
                            <span class="breadcrumb-item fw-normal"><a href="#">Home</a></span>
                            <span class="breadcrumb-separator mx-2">/</span>
                            <span class="breadcrumb-item active fw-normal">Ticket List</span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-md btn-primary" href="{{ route('dashboard') }}"  title="Update">
                                        <i class="fas fa-arrow-circle-left"></i> Back</a>
                                    <button type="button" class="btn btn-md btn-warning text-white" data-toggle="modal"
                                        data-target="#update-modal" title="Update">
                                        <i class="fa fa-user-edit"></i> Assign Ticket</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">Ticket {{ $ticket->ticket_no }}</h5>
                                        <p class="card-text">
                                        <div class="list-group">
                                            <a href="/index.php/Ticketing/list?filter=New"
                                                class="border rounded-2 list-group-item list-group-item-action p-3">
                                                <div class="row ml-2">
                                                    <div class="col-lg-4"><span class="fs-14 fw-semibold" style="color:#464F60;">TICKET NO</span></div>
                                                    <div class="col-lg-8"><span class="fs-14 fw-normal" style="color:#464F60;">{{ $ticket->ticket_no }}</span></div>

                                                </div>

                                            </a>
                                            <a href="/index.php/Ticketing/list?filter=InProgress"
                                                class="border rounded-2 list-group-item list-group-item-action px-3 py-4">
                                                <div class="row ml-2">
                                                    <div class="col-lg-4"><span class="fs-14 fw-semibold" style="color:#464F60;">REQUESTER</span></div>
                                                    <div class="col-lg-8"><span class="fs-14 fw-normal" style="color:#464F60;">{{ $ticket->requester }}</span></div>

                                                </div>
                                            </a>
                                            <a href="/index.php/Ticketing/list?filter=Completed"
                                                class="border rounded-2 list-group-item list-group-item-action px-3 py-4">
                                                <div class="row ml-2">
                                                    <div class="col-lg-4"><span class="fs-14 fw-semibold" style="color:#464F60;">CLIENT NAME</span></div>
                                                    <div class="col-lg-8"><span class="fs-14 fw-normal" style="color:#464F60;">{{ $ticket->company->cpny_name }}</span></div>

                                                </div>

                                            </a>
                                            <a href="/index.php/Ticketing/list?filter=Close"
                                                class="border rounded-2 list-group-item list-group-item-action px-3 py-4">
                                                <div class="row ml-2">
                                                    <div class="col-lg-4"><span class="fs-14 fw-semibold" style="color:#464F60;">PRODUCT NAME</span></div>
                                                    <div class="col-lg-8"><span class="fs-14 fw-normal" style="color:#464F60;">{{ $ticket->product ? $ticket->product->product_name : 'N/A' }}</span></div>

                                                </div>

                                            </a>
                                            <a href="/index.php/Ticketing/list?filter=Close"
                                                class="border rounded-2 list-group-item list-group-item-action px-3 py-4">
                                                <div class="row ml-2">
                                                    <div class="col-lg-4"><span class="fs-14 fw-semibold" style="color:#464F60;">SERVICE</span></div>
                                                    <div class="col-lg-8"><span class="fs-14 fw-normal" style="color:#464F60;">{{ $ticket->service->service_name }}</span></div>

                                                </div>

                                            </a>
                                            <a href="/index.php/Ticketing/list?filter=Close"
                                                class="border rounded-2 list-group-item list-group-item-action px-3 py-4">
                                                <div class="row ml-2">
                                                    <div class="col-lg-4"><span class="fs-14 fw-semibold" style="color:#464F60;">LEVEL</span></div>
                                                    <div class="col-lg-8"><span class="fs-14 fw-semibold text-{{ $ticket->level->level_name === 'Low' ? 'success' : 
                                                                    ($ticket->level->level_name === 'Normal' ? 'warning' : 
                                                                    ($ticket->level->level_name === 'Urgent' ? 'danger' : 'dark'))  }}">{{ $ticket->level->level_name }}</span></div>

                                                </div>

                                            </a>
                                            <a href="/index.php/Ticketing/list?filter=Close"
                                                class="border rounded-2 list-group-item list-group-item-action px-3 py-4">
                                                <div class="row ml-2">
                                                    <div class="col-lg-4"><span class="fs-14 fw-semibold" style="color:#464F60;">DESCRIPTION</span></div>
                                                    <div class="col-lg-8"><span class="fs-14 fw-normal" style="color:#464F60;">{{ $ticket->ticket_desc }}</span></div>

                                                </div>

                                            </a>
                                            <a href="/index.php/Ticketing/list?filter=Close"
                                                class="border rounded-2 list-group-item list-group-item-action px-3 py-4">
                                                <div class="row ml-2">
                                                    <div class="col-lg-4"><span class="fs-14 fw-semibold" style="color:#464F60;">ATTACHMENT</span></div>
                                                    <div class="col-lg-8"><span class="fs-14 fw-normal" style="color:#464F60;">Close</span></div>

                                                </div>

                                            </a>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">Ticket History</h5>
                                        <table id="history_table" class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Ticket status</th>
                                                    <th>Date</th>
                                                    <th style="width:250px;">Remarks</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
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

@include('script.ticket-status')

@endsection