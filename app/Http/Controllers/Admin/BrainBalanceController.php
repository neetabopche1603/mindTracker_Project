<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrainBalanceCategory;
use App\Models\BrainBalanceContents;
use App\Models\BrainBalanceSubCategory;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class BrainBalanceController extends Controller
{
    /*
        |---------------------------------------------------------------------
        | BRAIN BALANCE CATEGORY FUNCTION START
        |---------------------------------------------------------------------
        */
    // Show Brain Balance Category Function
    public function category(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = BrainBalanceCategory::all();
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
                                   <a class="dropdown-item" href="' . route('admin.brainCateViewForm', $row->id) . '" class="text-warning"><i class="dw dw-eye text-warning"></i> View</a>

                                   <a class="dropdown-item" href="' . route('admin.brainCateEditForm', $row->id) . '"><i class="dw dw-edit2 text-success"></i> Edit</a>

                                   <a class="dropdown-item" href="' . route('admin.brainCategoryDelete', $row->id) . '" onclick="return confirm(`Are you sure delete this data`)"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                               </div>
                           </div>';

                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            }
            return view('backend.brainBalance.brainBalanceCategory.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // View Brain Balance Category Function
    public function categoryViewForm($id)
    {
        try {
            $categoryViewData = BrainBalanceCategory::find($id);
            return view('backend.brainBalance.brainBalanceCategory.view', compact('categoryViewData'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Add Brain Balance Category Function
    public function categoryAddForm()
    {
        try {
            return view('backend.brainBalance.brainBalanceCategory.add');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Store Brain Balance Category Function
    public function categoryStore(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:brain_balance_categories,category_name',
            'status' => 'required',
        ]);
        try {
            $categoryStore = new BrainBalanceCategory();
            $categoryStore->category_name = $request->category_name;
            $categoryStore->status = $request->status;
            $categoryStore->save();
            return redirect()->route('admin.brainCategory')->with('success', "Category add successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Edit Brain Balance Category Function
    public function categoryEditForm($id)
    {
        try {
            $categoryEdit = BrainBalanceCategory::find($id);
            return view('backend.brainBalance.brainBalanceCategory.edit', compact('categoryEdit'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Update Brain Balance Category Function
    public function categoryUpdate(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:brain_balance_categories,category_name,' . $request->id,
            'status' => 'required',
        ]);
        try {
            $categoryUpdate = BrainBalanceCategory::find($request->id);
            $categoryUpdate->category_name = $request->category_name;
            $categoryUpdate->status = $request->status;
            $categoryUpdate->update();
            return redirect()->route('admin.brainCategory')->with('success', "Category Update successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Delete Brain Balance Category Function
    public function categoryDelete($id)
    {
        try {
            BrainBalanceCategory::find($id)->delete();
            return redirect()->route('admin.brainCategory')->with('delete', "Category Deleted successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Multiple Category Deletes Brain Balance Category Function
    public function categoryDeletes($id)
    {
        try {
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // ============BRAIN BALANCE CATEGORY FUNCTION END=============

    /*
        |---------------------------------------------------------------------
        |---------------------------------------------------------------------

        | BRAIN BALANCE SUB CATEGORY FUNCTION START

        |---------------------------------------------------------------------
        |---------------------------------------------------------------------

        */

    // Show Brain Balance Category Function
    public function subCategory(Request $request)
    {
        try {
            if ($request->ajax()) {
                // $data = BrainBalanceSubCategory::all();
                $data = DB::table('brain_balance_sub_categories')->join('brain_balance_categories', 'brain_balance_categories.id', '=', 'brain_balance_sub_categories.category_id')->where('brain_balance_categories.status', 1)->select('brain_balance_sub_categories.*', 'brain_balance_categories.category_name')->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($row) {
                        return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Block</span>';
                    })
                    ->addColumn('action', function ($row) {

                        $btn = '<div class="dropdown">
                               <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="' . route('admin.brainSubCateViewForm', $row->id) . '" role="button" data-toggle="dropdown">
                                   <i class="dw dw-more"></i>
                               </a>
                               <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                   <a class="dropdown-item" href="' . route('admin.brainSubCateViewForm', $row->id) . '" class="text-warning"><i class="dw dw-eye text-warning"></i> View</a>

                                   <a class="dropdown-item" href="' . route('admin.brainSubCateEditForm', $row->id) . '"><i class="dw dw-edit2 text-success"></i> Edit</a>

                                   <a class="dropdown-item" href="' . route('admin.brainSubCategoryDelete', $row->id) . '" onclick="return confirm(`Are you sure delete this data`)"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                               </div>
                           </div>';

                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            }

            return view('backend.brainBalance.brainBalanceSubCategory.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // View Brain Balance Category Function
    public function subCategoryViewForm($id)
    {
        try {
            $subCategoryEdit = BrainBalanceSubCategory::find($id);
            $categories = BrainBalanceCategory::where('status', 1)->get();
            return view('backend.brainBalance.brainBalanceSubCategory.view', compact('subCategoryEdit', 'categories'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Add Brain Balance Category Function
    public function subCategoryAddForm()
    {
        try {
            $categories = BrainBalanceCategory::where('status', 1)->get();
            return view('backend.brainBalance.brainBalanceSubCategory.add', compact('categories'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Store Brain Balance Category Function
    public function subCategoryStore(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
            'status' => 'required',
        ]);
        try {
            $subCategoryStore = new BrainBalanceSubCategory();
            $subCategoryStore->category_id = $request->category_id;
            $subCategoryStore->sub_category_name = $request->subcategory_name;
            $subCategoryStore->status = $request->status;
            $subCategoryStore->save();
            return redirect()->route('admin.brainSubCategory')->with('success', "Sub-Category Add Successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Edit Brain Balance Category Function
    public function subCategoryEditForm($id)
    {
        try {

            $subCategoryEdit = BrainBalanceSubCategory::find($id);
            $categories = BrainBalanceCategory::where('status', 1)->get();
            return view('backend.brainBalance.brainBalanceSubCategory.edit', compact('subCategoryEdit', 'categories'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Update Brain Balance Category Function
    public function subCategoryUpdate(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'sub_category_name' => 'required',
            'status' => 'required',
        ]);
        try {
            $subCategoryUpdate = BrainBalanceSubCategory::find($request->id);
            $subCategoryUpdate->category_id = $request->category_id;
            $subCategoryUpdate->sub_category_name = $request->sub_category_name;
            $subCategoryUpdate->status = $request->status;
            $subCategoryUpdate->update();
            return redirect()->route('admin.brainSubCategory')->with('success', "Sub-Category Update Successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Delete Brain Balance Category Function
    public function subCategoryDelete($id)
    {
        try {
            BrainBalanceSubCategory::find($id)->delete();
            return redirect()->route('admin.brainSubCategory')->with('delete', "Sub-Category Update Successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Multiple Category Deletes Brain Balance Category Function
    public function subCategoryDeletes()
    {
        try {
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // ============BRAIN BALANCE SUB CATEGORY FUNCTION END=============

    /*
        |---------------------------------------------------------------------
        |---------------------------------------------------------------------
        
        | BRAIN BALANCE CONTENT FUNCTION START

        |---------------------------------------------------------------------
        |---------------------------------------------------------------------

        */

    // Content Show Function
    public function content(Request $request)
    {
        try {
            if ($request->ajax()) {
                // $data = BrainBalanceContents::all();

                $data = DB::table('brain_balance_contents')->join('brain_balance_sub_categories', 'brain_balance_sub_categories.id', '=', 'brain_balance_contents.subCategory_id')->where('brain_balance_sub_categories.status', 1)->select('brain_balance_contents.*', 'brain_balance_sub_categories.sub_category_name')->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('description', function ($row) {
                        return $row->description;
                    })
                    ->addColumn('action', function ($row) {

                        $btn = '<div class="dropdown">
                                   <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                       <i class="dw dw-more"></i>
                                   </a>
                                   <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                       <a class="dropdown-item" href="' . route('admin.contentViewFrom', $row->id) . '" class="text-warning"><i class="dw dw-eye text-warning"></i> View</a>
    
                                       <a class="dropdown-item" href="' . route('admin.brainBalContentEditFrom', $row->id) . '"><i class="dw dw-edit2 text-success"></i> Edit</a>
    
                                       <a class="dropdown-item" href="' . route('admin.brainBalContentDelete', $row->id) . '" onclick="return confirm(`Are you sure delete this data`)"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                                   </div>
                               </div>';

                        return $btn;
                    })
                    ->rawColumns(['action', 'description'])
                    ->make(true);
            }

            return view('backend.brainBalance.brainBalanceContent.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Content View Function
    public function contentViewFrom($id)
    {
        try {
            $contents = BrainBalanceContents::find($id);
            $subCategory = BrainBalanceSubCategory::where('status', 1)->get();
            return view('backend.brainBalance.brainBalanceContent.view', compact('subCategory', 'contents'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    // Content Add From Function
    public function contentAddFrom()
    {
        try {
            $contents = BrainBalanceContents::get();
            $subCategory = BrainBalanceSubCategory::where('status', 1)->get();
            return view('backend.brainBalance.brainBalanceContent.add', compact('subCategory', 'contents'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Content Store Function
    public function contentStore(Request $request)
    {
        $validated = $request->validate([
            'subCategory_id' => 'required',
            'description' => 'required',
            'uploadImages.*' => 'mimes:png,jpeg,jpg,gif',
            'uploadfiles.*' => 'required|mimes:mp4,mov,ogg,qt,audio/mpeg,mpga,wav,png,jpeg,jpg,gif|max:100000',
        ]);
        // dd($request->all());
        try {
            $contentStore = new BrainBalanceContents();
            $contentStore->subCategory_id = $request->subCategory_id;
            $contentStore->sub_cate_title = $request->sub_cate_title;
            $contentStore->description = $request->description;
            // image upload 
            if ($request->hasFile('uploadImages')) {
                if ($reqImg = $request->file('uploadImages')) {
                    $destinationPath = '/brainBalanceFiles/images/';
                    $contentImg = date('YmdHis') . "." . $reqImg->getClientOriginalExtension();
                    $reqImg->move(public_path() . $destinationPath, $contentImg);
                    $contentStore->images = $contentImg;
                }
            }

            // Upload Multiple Files
            $filesData = [];
            if ($request->hasFile('uploadfiles')) {
                $files = $request->file('uploadfiles');
                foreach ($files as $file) {
                    $name =  date('YmdHis') . "." . $file->getClientOriginalName();
                    array_push($filesData, $name);
                }
            }
            $contentStore->files = json_encode($filesData, true);

            $contentStore->save();
            return redirect()->route('admin.brainBalContent')->with('success', "Content Add Successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Content Edit Function
    public function contentEditFrom($id)
    {
        try {
            $contents = BrainBalanceContents::find($id);
            $subCategory = BrainBalanceSubCategory::where('status', 1)->get();
            return view('backend.brainBalance.brainBalanceContent.edit', compact('subCategory', 'contents'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Content Update Function
    public function contentUpdate(Request $request)
    {
        $validated = $request->validate([
            'subCategory_id' => 'required',
            'description' => 'required',
            'uploadImages.*' => 'mimes:png,jpeg,jpg,gif',
            'uploadfiles.*' => 'mimes:png,jpeg,jpg,gif',
        ]);

        try {
            $contentUpdate = BrainBalanceContents::find($request->id);
            $contentUpdate->subCategory_id = $request->subCategory_id;
            $contentUpdate->sub_cate_title = $request->sub_cate_title;
            $contentUpdate->description = $request->description;
            $contentUpdate->images = json_encode($request->uploadImages);
            $contentUpdate->filesData = json_encode($request->uploadfiles);
            $contentUpdate->update();
            return redirect()->route('admin.brainBalContent')->with('success', "Content Add Successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Content Delete Function
    public function contentDelete($id)
    {
        try {
            BrainBalanceContents::find($id)->delete();
            return redirect()->route('admin.brainBalContent')->with('delete', "Content delete Successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
