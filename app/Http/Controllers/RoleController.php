<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRoles()
    {
        if (request()->ajax()) {

            $roles = Role::all();

            // Return DataTables with an additional action column for buttons
            return DataTables::of($roles)
                ->addIndexColumn()
                ->addColumn('action', function ($roles) {

                    // Create buttons for edit, remove, and toggle activation status
                    $ops = '<div class="btn-group">';

                    // Edit Button
                    $ops .= '<button type="button" data-target="#edit-role-modal" data-toggle="modal"
                    data-id="' . $roles->id . '"
                    data-name="' . $roles->role  . '"
                    data-desc="' . $roles->role_desc . '"
                    data-stat="' . $roles->role_stat . '"
                    class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>';

                    // Remove Button
                    $ops .= '<button type="button" class="btn btn-sm btn-danger" onclick="remove(' . $roles->id . ')"><i class="fa fa-trash"></i></button>';

                    $ops .= '</div>';
                    return $ops;
                })
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        Role::create([
            'role_name' => $request->role_name,
            'role_desc' => $request->role_desc,
            'role_stat' => $request->isActive,
            'created_at' => date('Y-m-d')
        ]);

        Session::flash('toastr', ['type' => 'success', 'message' => 'Role added successfully!']);
        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $role = Role::findOrFail($id);

        $data = array(
            'role' => $request->role_name,
            'role_desc' => $request->role_desc,
            'role_stat' => $request->isActive,
        );
        // dd($id);
        $role->update($data);
        Session::flash('toastr', ['type' => 'success', 'message' => 'Role updated successfully!']);
        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
