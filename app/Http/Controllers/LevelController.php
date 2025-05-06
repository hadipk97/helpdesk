<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    public function index()
    {
        return view('level');
    }

    public function getLevel()
    {
        if (request()->ajax()) {

            $levels = Level::all();

            // Return DataTables with an additional action column for buttons
            return DataTables::of($levels)
                ->addIndexColumn() // Automatically adds an index column
                ->addColumn('action', function ($level) {

                    // Create buttons for edit, remove, and toggle activation status
                    $ops = '<div class="btn-group">';

                    // Edit Button
                    $ops .= '<button type="button" data-target="#edit-modal" data-toggle="modal"
                            data-id="' . $level->id . '"
                            data-name="' . $level->service_name  . '"
                            data-duration="' . $level->service_duration . '"
                            data-respond="' . $level->service_respond . '"
                            class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>';

                    // Remove Button
                    $ops .= '<button type="button" class="btn btn-sm btn-danger" onclick="remove(' . $level->id . ')"><i class="fa fa-trash"></i></button>';

                    $ops .= '</div>';
                    return $ops;
                })
                ->make(true);
        }
    }

    public function add(Request $request)
    {
        Level::create([
            'level_name' => $request->levelName,
            'level_duration' => $request->level_duration,
            'level_respond' => $request->level_respond,
            'created_at' => date('Y-m-d'),
            'created_by' => $request->name,
            'isActive' => 1,
        ]);

        Session::flash('toastr', ['type' => 'success', 'message' => 'Level added successfully!']);
        return redirect()->route('level');
    }
}
