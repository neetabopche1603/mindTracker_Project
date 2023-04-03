<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrainBalanceCategory;
use App\Models\BrainBalanceSubCategory;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
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
                        ->addColumn('action', function($row){
         
                               $btn = '<div class="dropdown">
                               <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                   <i class="dw dw-more"></i>
                               </a>
                               <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                   <a class="dropdown-item" href="#" class="text-warning"><i class="dw dw-eye text-warning"></i> View</a>

                                   <a class="dropdown-item" href="#"><i class="dw dw-edit2 text-success"></i> Edit</a>

                                   <a class="dropdown-item" href="#"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                               </div>
                           </div>';
        
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('backend.brainBalanceCategory.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Add Brain Balance Category Function
    public function categoryAddForm()
    {
        try {
            return view('backend.brainBalanceCategory.add');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Store Brain Balance Category Function
    public function categoryStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'category_name' => 'required',
                'status' => 'required',
            ]);

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
            return view('backend.brainBalanceCategory.edit',compact('categoryEdit'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Update Brain Balance Category Function
    public function categoryUpdate(Request $request)
    {
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
    public function categoryDeletes()
    {
        try {
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // ============BRAIN BALANCE CATEGORY FUNCTION END=============

    /*
        |---------------------------------------------------------------------
        | BRAIN BALANCE SUB CATEGORY FUNCTION START
        |---------------------------------------------------------------------
        */

    // Show Brain Balance Category Function
    public function subCategory()
    {
        try {
            $users = User::where('type', 0)->get();
            $category = BrainBalanceCategory::get();
            return view('backend.brainBalanceSubCategory.index', compact('users', 'category'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Add Brain Balance Category Function
    public function subCategoryAddForm()
    {
        try {
            $users = User::where('type', 0)->get();
            return view('backend.brainBalanceSubCategory.add',compact('users'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Store Brain Balance Category Function
    public function subCategoryStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required',
                'category_id' => 'required',
                'subcategory_name' => 'required',
            ]);
            $subCategoryStore = new BrainBalanceSubCategory();
            $subCategoryStore->user_id = $request->user_id;
            $subCategoryStore->category_id = $request->category_id;
            $subCategoryStore->subcategory_name = $request->subcategory_name;
            $subCategoryStore->save();
          return redirect()->route('admin.subCategory')->with('success',"Sub-Category Add Successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Edit Brain Balance Category Function
    public function subCategoryEditForm($id)
    {
        try {
            $subCategoryEdit = BrainBalanceSubCategory::find($id);
            return view('backend.brainBalanceSubCategory.edit',compact('subCategoryEdit'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Update Brain Balance Category Function
    public function subCategoryUpdate(Request $request)
    {
        try {
            $subCategoryUpdate = BrainBalanceSubCategory::find($request->id);
            $subCategoryUpdate->user_id = $request->user_id;
            $subCategoryUpdate->category_id = $request->category_id;
            $subCategoryUpdate->subcategory_name = $request->subcategory_name;
            $subCategoryUpdate->update();
          return redirect()->route('admin.subCategory')->with('success',"Sub-Category Update Successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Delete Brain Balance Category Function
    public function subCategoryDelete($id)
    {
        try {
            BrainBalanceSubCategory::find($id)->delete();
          return redirect()->route('admin.subCategory')->with('delete',"Sub-Category Update Successfully Done.!");

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
}
