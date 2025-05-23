<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Level;
use App\Models\Ticket;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\TicketHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class TicketController extends Controller
{
    public function getTicket()
    {
        if (request()->ajax()) {
            $tickets = Ticket::all();

            return DataTables::of($tickets)
                ->addIndexColumn()
                ->addColumn('service_id', function ($tickets) {
                    $services = [
                        1 => 'Software',
                        2 => 'Hardware',
                        3 => 'License',
                        4 => 'Other'
                    ];

                    return isset($services[$tickets->service_id]) ? $services[$tickets->service_id] : 'Unknown';
                })
                ->addColumn('level_id', function ($tickets) {
                    $levels = [
                        1 => ['name' => 'Low', 'class' => 'badge-primary'],
                        2 => ['name' => 'Normal', 'class' => 'badge-info'],
                        3 => ['name' => 'Urgent', 'class' => 'badge-danger'],
                    ];

                    if (isset($levels[$tickets->level_id])) {
                        return '<span class="py-2 px-4 rounded-pill badge ' . $levels[$tickets->level_id]['class'] . '">' .
                            $levels[$tickets->level_id]['name'] . '</span>';
                    }

                    return '<span class="badge badge-dark">Unknown</span>';
                })
                ->addColumn('ticket_status', function ($tickets) {
                    $statusLabels = [
                        1 => 'New',
                        2 => 'In Progress',
                        3 => 'Completed',
                        4 => 'Close'
                    ];

                    $badgeColors = [
                        1 => 'primary',
                        2 => 'info',
                        3 => 'success',
                        4 => 'danger'
                    ];

                    $status = $tickets->ticket_status;
                    $label = $statusLabels[$status] ?? 'No Status';
                    $color = $badgeColors[$status] ?? 'secondary';

                    return '<span class="fw-semibold text-' . $color . '">' . $label . '</span>';
                })
                ->addColumn('created_date', function ($tickets) {
                    return $tickets->created_date->format('d-m-Y');
                })
                ->addColumn('action', function ($tickets) {
                    // Create buttons for edit, remove, and toggle activation status
                    $ops = '<div class="d-flex flex-row gap-2">';

                    // Edit Button
                    $ops .= '<button type="button" data-target="#edit-modal" data-toggle="modal"
                    data-id="' . $tickets->id . '"
                    data-ticket_no="' . $tickets->ticket_no . '"
                    data-requester="' . $tickets->requester . '"
                    data-client="' . $tickets->client_id . '"
                    data-subject="' . $tickets->ticket_subject . '"
                    data-product="' . $tickets->product_id . '"
                    data-product_type="' . $tickets->product_type . '"
                    data-desc="' . $tickets->ticket_desc . '"
                    data-service="' . $tickets->service_id . '"
                    data-level="' . $tickets->level_id . '"


                    class="btn btn-md btn-warning text-white px-2 rounded-4 d-flex flex-row justify-content-center custom-tooltip"><i class="fas fa-pen" ></i><span class="tooltip-text">Modify Ticket</span></button>';
                    // Assign Button
                    $ops .= '<a href=' . route("ticket_status", $tickets->id) . '
                    class="btn btn-md btn-success px-2 rounded-4 custom-tooltip"><i class="fa fa-book"></i><span class="tooltip-text text-capitalize">Ticket Status</span></a>';
                    // Remove Button
                    $ops .= '<button type="button" class="btn btn-md btn-danger px-2 rounded-4 custom-tooltip">
                    <i class="fa fa-trash"></i>
                    <span class="tooltip-text">Delete</span>
                    </button>';

                    $ops .= '</div>';
                    return $ops;
                })
                ->rawColumns(['level_id', 'ticket_status', 'created_date', 'action'])
                ->make(true);
        }
    }

    public function add(Request $request)
    {
        $currentYear = Carbon::now()->year;
        $today = Carbon::now()->toDateString();

        $latestTicket = Ticket::whereYear('created_date', $currentYear)
            ->orderBy('id', 'desc')
            ->first();

        $runningNumber = $latestTicket ? (intval(substr($latestTicket->ticket_no, -4)) + 1) : 1;

        $ticketNo = "#" . $currentYear . "-" . str_pad($runningNumber, 4, '0', STR_PAD_LEFT);

        Ticket::create([
            'ticket_no' => $ticketNo,
            'requester' => $request->requester,
            'client_id' => $request->clientId,
            'ticket_subject' => $request->ticketSubject,
            'product_id' => $request->productId,
            'product_type' => $request->product_type,
            'ticket_desc' => $request->ticketDesc,
            'service_id' => $request->serviceId,
            'level_id' => $request->level,
            'ticket_status' => $request->ticket_status,
            'created_date' => date('Y-m-d'),
            'created_by' => Auth::user()->username,
        ]);

        TicketHistory::create([
            'ticket_no' => $ticketNo,
            'ticket_status' => 'New',
            'created_at' => date('Y-m-d'),
        ]);

        Session::flash('toastr', ['type' => 'success', 'message' => 'Ticket has been created successfully!']);
        return redirect()->route('dashboard');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $service = Ticket::findOrFail($id);

        $data = array(
            'requester' => $request->requester,
            'client_id' => $request->clientId,
            'ticket_subject' => $request->ticketSubject,
            'product_id' => $request->productId,
            'product_type' => $request->product_type,
            'ticket_desc' => $request->ticketDesc,
            'service_id' => $request->serviceId,
            'level_id' => $request->level
        );
        // dd($id);
        $service->update($data);
        Session::flash('toastr', ['type' => 'success', 'message' => 'Ticket updated successfully!']);
        return redirect()->route('dashboard');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        Session::flash('toastr', ['type' => 'success', 'message' => 'Ticket deleted successfully!']);
        return redirect()->route('dashboard');
    }

    public function ticket_status($id)
    {
        $ticket = Ticket::with('company', 'product', 'service', 'level')->findOrFail($id);
        $cpmsuser = User::whereIn('role', [2, 8])->where('stat', 1)->get();
        $service = Ticket::get_service_type();
        $level = Level::all();

        $lastId = Ticket::get_last_id();
        $taskNo = $lastId['task_no'];
        return view('ticket.ticket_status', compact('ticket', 'cpmsuser', 'taskNo', 'level', 'service'));
    }

    public function getHistories($ticket_no)
    {
        $ticket = Ticket::where('ticket_no', $ticket_no)->firstOrFail();
        $histories = $ticket->sortedHistories('asc')->get(); // or 'desc'

        return DataTables::of($histories)
            ->addIndexColumn()
            ->addColumn('ticket_status', function ($histories) {
                return '<span class="badge badge-primary">' . $histories->ticket_status . '</span>';
            })
            ->addColumn('created_at', function ($histories) {
                return Carbon::parse($histories->created_at)->format('Y-m-d');
            })
            ->rawColumns(['ticket_status', 'created_at'])
            ->make(true);
    }

    public function ticket_assign(Request $request)
    {
        $id = $request->hdTicketId;
        $ticket = Ticket::findOrFail($id);
        $data = array(
            'ticket_status' => 2
        );

        $ticket->update($data);

        TicketHistory::create([
            'ticket_no' => $request->ticket_no,
            'status' => 'Assigned Task to ' + $request->employee,
            'remarks' => $request->remarks,
            'created_date' => date('Y-m-d'),
            'created_by' => Auth::user()->username,
        ]);

        Task::create(
            [
                'task_no' => $request->task_no,
                'task_date' => $request->start_date,
                'task_date_end' => $request->end_date,
                'task_time' => $request->appointment_time,
                'task_desc' => $request->remarks,
                'task_level' => $request->priority,
                'task_assign' => is_array($request->employee) ? json_encode($request->employee) : $request->employee,
                'task_stat' => '1',
                'task_client' => $request->client,
                'task_client_pic' => $request->pic,
                'task_product' => $request->product,
                'task_type' => $request->type,
                'assign_by' => Auth::user()->id
            ]
        );

        Session::flash('toastr', ['type' => 'success', 'message' => 'Ticket has been updated successfully!']);
        return redirect()->route('ticket_status', ['id' => $request->hdTicketId]);
    }
}
