<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;

class ArticleCategoryController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Article Category List';
        if ($request->ajax()) {

            $data = Category::where('type', 'article')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->name ?? '';
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return 'Active';
                    } else {
                        return 'Inactive';
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '<button type="button"   onclick="selectid2(' . $row->id . ')"
                    class="btn btn-success waves-effect waves-light"style="margin-right:20px"   data-toggle="modal" data-target="#updatecategory">
                   Edit

                    </button> ';
                    $btn2 = '<button type="button"   onclick="delete(' . $row->id . ')"
                     class="btn btn-danger waves-effect waves-light"style="margin-right:20px"   data-toggle="modal" data-target="#">
                      Delete
                     </button>';
                    return $btn . '' . $btn2;

                    // <i class="bx bx-pencil  font-size-16 align-right "   ></i>
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/articlecategory/category', compact('title'));
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|max:255 |unique:categories',
            'type' => 'required|string',
            'status' => 'nullable|integer',
        ]);

        try {
            Category::create($data);
            $this->successfullymessage('Category  Addedd successfully ');
            return redirect()->back();
        } catch (\Exception $e) {
            $this->failmessage($e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('admin/articlecategory/update', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|max:255 |unique:categories,name,' . $id,
            'status' => 'required|integer',
            'type' => 'required|string',

        ]);

        $category = Category::findOrFail($id);

        try {
            $category->update($data);
            $this->successfullymessage('Category Updated successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            $this->failmessage($e->getMessage());
            return redirect()->back()->with('error', 'Failed to update Category!');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
