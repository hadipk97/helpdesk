<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GroupController extends Controller
{
    public function index()
    {
        return view('group');
    }

    public function getGroup()
    {
        if (request()->ajax()) {

            $group = Group::all();

            // Return DataTables with an additional action column for buttons
            return DataTables::of($group)
                ->addIndexColumn()
                ->addColumn('stat', function ($group) {
                    $levels = [
                        1 => ['name' => 'Active', 'class' => 'badge-primary'],
                        0 => ['name' => 'InActive', 'class' => 'badge-danger'],
                    ];

                    if (isset($levels[$group->stat])) {
                        return '<span class="badge ' . $levels[$group->stat]['class'] . '">' .
                            $levels[$group->stat]['name'] . '</span>';
                    }
                })
                ->addColumn('action', function ($group) {

                    // Create buttons for edit, remove, and toggle activation status
                    $ops = '<div class="btn-group">';

                    // Edit Button
                    $ops .= '<button type="button" data-target="#edit-modal" data-toggle="modal"
                    data-id="' . $group->id . '"
                    data-dept="' . $group->dept  . '"
                    class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>';

                    // Remove Button
                    $ops .= '<button type="button" class="btn btn-sm btn-danger" onclick="remove(' . $group->id . ')"><i class="fa fa-trash"></i></button>';

                    $ops .= '</div>';
                    return $ops;
                })
                ->rawColumns(['stat', 'action'])
                ->make(true);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
