<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category');
    }

    public function getCategory()
    {
        $category = Category::all();

        // Return DataTables with an additional action column for buttons
        return DataTables::of($category)
            ->addIndexColumn()
            ->addColumn('action', function ($category) {

                // Create buttons for edit, remove, and toggle activation status
                $ops = '<div class="btn-group">';

                // Edit Button
                $ops .= '<button type="button" data-target="#edit-modal" data-toggle="modal"
                    class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>';

                // Remove Button
                $ops .= '<button type="button" class="btn btn-sm btn-danger" onclick="remove(' . $category->id . ')"><i class="fa fa-trash"></i></button>';

                $ops .= '</div>';
                return $ops;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        //
    }

    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
