<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SelfCareContents;
use Illuminate\Http\Request;
use App\Models\SelfCareCategory;
use Exception;
use Yajra\DataTables\DataTables;
class SelfCareController extends Controller
{
    /*
        |---------------------------------------------------------------------
        | ACTIVITIES (SELF CARE ME) CATEGORY FUNCTION START
        |---------------------------------------------------------------------
        */

    // Show List Category Table function
    public function selfCategory(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = SelfCareCategory::all();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($row) {
                        return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Block</span>';
                    })
                    ->addColumn('action', function ($row) {

                        $btn = '<div class="dropdown">
                               <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                   <i class="dw dw-more"></i>
                               </a>
                               <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                   <a class="dropdown-item" href="' . route('admin.selfCategoryView', $row->id) . '" class="text-warning"><i class="dw dw-eye text-warning"></i> View</a>

                                   <a class="dropdown-item" href="' . route('admin.selfCategoryEditForm', $row->id) . '"><i class="dw dw-edit2 text-success"></i> Edit</a>

                                   <a class="dropdown-item" href="' . route('admin.selfCategoryDelete', $row->id) . '" onclick="return confirm(`Are you sure delete this data`)"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                               </div>
                           </div>';

                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            }

            return view('backend.selfCare.activitiesCategory.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // View Category Details Function
    public function selfCategoryView($id)
    {
        try {
            $selfCareCateView = SelfCareCategory::find($id);
            return view('backend.selfCare.activitiesCategory.view', compact('selfCareCateView'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Add Category From Function
    public function selfCategoryAddForm()
    {
        try {
            return view('backend.selfCare.activitiesCategory.add');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Store Category From Function
    public function selfCategoryStore(Request $request)
    {
        $validated = $request->validate([
            'self_cate_name' => 'required|unique:self_care_categories,self_cate_name',
        ]);
        try {
            $actCategoryStore = new SelfCareCategory();
            $actCategoryStore->self_cate_name = $request->self_cate_name;
            $actCategoryStore->status = $request->status;
            $actCategoryStore->save();
            return redirect()->route('admin.selfCategory')->with('success', "Category Add successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Edit Category From Function
    public function selfCategoryEditForm($id)
    {
        try {
            $selfCategoryEdit = SelfCareCategory::find($id);
            return view('backend.selfCare.activitiesCategory.edit', compact('selfCategoryEdit'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Update Category Function
    public function selfCategoryUpdate(Request $request)
    {
        $validated = $request->validate([
            'self_cate_name' => 'required|unique:self_care_categories,self_cate_name,' . $request->id,
        ]);
        try {
            $actCategoryUpdate = SelfCareCategory::find($request->id);
            $actCategoryUpdate->self_cate_name = $request->self_cate_name;
            $actCategoryUpdate->status = $request->status;
            $actCategoryUpdate->update();
            return redirect()->route('admin.selfCategory')->with('success', "Category Update successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Delete Category Function 
    public function selfCategoryDelete($id)
    {
        try {
            SelfCareCategory::find($id)->delete();
            return redirect()->route('admin.selfCategory')->with('delete', "Category Delete successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // ===========================CATEGORY END=======================================

    /*
        |---------------------------------------------------------------------
        | ACTIVITIES (SELF CARE ME) CONTENTS FUNCTION START
        |---------------------------------------------------------------------
        */

    // Show Contents List Function
    public function selfContent(Request $request)
    {
        try {
            return view('backend.selfCare.activitiesContent.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // View Contents Function
    public function selfContentView($id)
    {
        try {
            return view('backend.selfCare.activitiesContent.view');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

        // Add Form Contents Function
        public function selfContentAddForm()
        {
            try {
                return view('backend.selfCare.activitiesContent.add');
            } catch (Exception $e) {
                dd($e->getMessage());
            }
        }

        // Store Form Contents Function
        public function selfContentStore(Request $request)
        {
            $validated = $request->validate([
                'self_category_id' => 'required',
                'title' => 'required',
                'description' => 'required|unique:self_care_contents,description',
            ]);
            try {
                $selfContentStore = new SelfCareContents();
                $selfContentStore->self_category_id = $request->self_category_id;
                $selfContentStore->title = $request->title;
                $selfContentStore->description = $request->description;
                
            } catch (Exception $e) {
                dd($e->getMessage());
            }
        }
}

