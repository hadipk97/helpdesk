<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateUserRequest;
use App\Models\UserView;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('users.users', compact('role'));
    }

    public function getUsers()
    {

        if (request()->ajax()) {

            return DataTables::of(UserView::query())
                ->addIndexColumn()
                ->addColumn('roles', function ($user) {
                    return $user->role ?? '<span class="text-danger">No Role Assigned</span>';
                })
                ->addColumn('action', function ($user) {
                    $ops = '<div class="btn-group">';

                    // Edit Button
                    $ops .= '<button type="button" data-target="#edit-modal" data-toggle="modal"
                    data-id="' . $user->id . '"
                    data-username="' . $user->username  . '"
                    data-fullname="' . $user->n_penuh . '"
                    data-role_id="' . $user->role_id . '"
                    data-email="' . $user->email . '"
                    data-tel="' . $user->tel . '"
                    data-active="' . $user->stat . '"
                    class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>';

                    // Restore Button (if soft-deleted)
                    if ($user->deleted_at != null) {
                        $ops .= '<form action="' . route('users.restore', $user->id) . '" method="POST" style="display:inline;">
                                    ' . csrf_field() . '
                                    <button type="submit" class="btn btn-sm btn-success" onclick="return confirm(\'Are you sure you want to restore this user?\');">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </form>';
                    } else {
                        // Soft Delete Button
                        $ops .= '<form action="' . route('users.softDelete', $user->id) . '" method="POST" style="display:inline;">
                                    ' . csrf_field() . '
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this user?\');">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>';
                    }

                    $ops .= '</div>';
                    return $ops;
                })
                ->rawColumns(['roles', 'action'])
                ->make(true);
        }
    }

    public function getRoles()
    {
        $roles = Role::all();
        return response()->json(['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $user = User::create([
            'username' => $request->username,
            'n_penuh' => $request->nPenuh,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tel' => $request->tel,
            'role_id' => $request->role,
            'created_at' => date('Y-m-d'),
            'isActive' => $request->isActive,
        ]);

        Session::flash('toastr', ['type' => 'success', 'message' => 'User added successfully!']);
        return redirect()->route('users');
    }

    public function softDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Soft delete
        Session::flash('toastr', ['type' => 'success', 'message' => 'User deleted successfully!']);
        return redirect()->route('users');
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore(); // Restore user
        Session::flash('toastr', ['type' => 'success', 'message' => 'User restored successfully!']);
        return redirect()->route('users');
    }

    public function update(Request $request)
    {
        $id = $request->sessionID;
        $user = User::findOrFail($id);

        $data = array(
            'username' => $request->username,
            'n_penuh' => $request->nPenuh,
            'role_id' => $request->role,
            'tel' => $request->tel,
            // 'password' => Hash::make($request->password),
            'email' => $request->email,
            'isActive' => $request->isActive
        );

        $user->update($data);
        Session::flash('toastr', ['type' => 'success', 'message' => 'User updated successfully!']);
        return redirect()->route('users');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        // $user = Auth::user();

        // $user->username
    }
}
