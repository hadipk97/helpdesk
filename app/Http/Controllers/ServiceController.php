<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    public function index()
    {
        return view('service');
    }

    public function getService()
    {
        if (request()->ajax()) {

            $services = Service::all();

            // Return DataTables with an additional action column for buttons
            return DataTables::of($services)
                ->addIndexColumn()
                ->addColumn('action', function ($service) {

                    // Create buttons for edit, remove, and toggle activation status
                    $ops = '<div class="btn-group">';

                    // Edit Button
                    $ops .= '<button type="button" data-target="#edit-modal" data-toggle="modal"
                    data-id="' . $service->id . '"
                    data-name="' . $service->service_name  . '"
                    data-desc="' . $service->service_desc . '"
                    data-duration="' . $service->service_duration . '"
                    data-respond="' . $service->service_respond . '"
                    data-active="' . $service->isActive . '"
                    class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>';

                    // Remove Button
                    $ops .= '<button type="button" class="btn btn-sm btn-danger" onclick="remove(' . $service->id . ')"><i class="fa fa-trash"></i></button>';

                    $ops .= '</div>';
                    return $ops;
                })
                ->make(true);
        }
    }

    public function add(Request $request)
    {
        $user = Service::create([
            'service_name' => $request->serviceName,
            'service_desc' => $request->serviceDesc,
            'service_duration' => $request->serviceDuration,
            'service_respond' => $request->serviceRespond,
            'created_at' => date('Y-m-d'),
            'created_by' => Auth::user()->username,
            'isActive' => $request->isActive,
        ]);

        // Mail::to($user->email)
        //     ->send(new WelcomeEmail($user));
        Session::flash('toastr', ['type' => 'success', 'message' => 'Service added successfully!']);
        return redirect()->route('service');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $service = Service::findOrFail($id);

        $data = array(
            'service_name' => $request->serviceName,
            'service_desc' => $request->serviceDesc,
            'service_duration' => $request->serviceDuration,
            'service_respond' => $request->serviceRespond,
            'isActive' => $request->isActive
        );

        $service->update($data);
        Session::flash('toastr', ['type' => 'success', 'message' => 'Service updated successfully!']);
        return redirect()->route('service');
    }
}
