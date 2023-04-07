<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ReviewsController extends Controller
{
    /*
        |---------------------------------------------------------------------
        | REVIRES & RATTING FUNCTION START
        |---------------------------------------------------------------------
        */
    //  Show REVIRES List Function

    public function reviewsRatting(Request $request)
    {
        try {
            if ($request->ajax()) {
                $reviews = DB::table('reviews')
                    ->join('users as u1', 'u1.id', '=', 'reviews.user_id')
                    ->join('users as u2', 'u2.id', '=', 'reviews.therapist_id')
                    ->select('reviews.*', 'u1.id as user_id', 'u1.name as user_name', 'u2.id as therapist_id', 'u2.name as therapist_name')
                    ->get();

                return Datatables::of($reviews)

                    ->addColumn('action', function ($row) {

                        $btn = '<div class="dropdown">
                                   <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                       <i class="dw dw-more"></i>
                                   </a>
                                   <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                       <a class="dropdown-item" href="' . route('admin.reviewsView', $row->id) . '" class="text-warning"><i class="dw dw-eye text-warning"></i> View Reviews</a>

                                       <a class="dropdown-item" href="'.route('admin.reviewsEdit', $row->id).'"><i class="dw dw-edit2 text-success"></i> Edit Reviews</a>
    
                                       <a class="dropdown-item" href="' . route('admin.reviewsDelete', $row->id) . '" onclick="return confirm(`Are you sure delete this reviews`)"><i class="dw dw-delete-3 text-danger"></i> Delete Reviews</a>
                                   </div>
                               </div>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('backend.reviewsRatting.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // View Reviews Function
    public function reviewsView($id){
        try{
            $reviews = DB::table('reviews')
            ->join('users as u1', 'u1.id', '=', 'reviews.user_id')
            ->join('users as u2', 'u2.id', '=', 'reviews.therapist_id')
            ->select('reviews.*', 'u1.id as user_id', 'u1.name as user_name', 'u2.id as therapist_id', 'u2.name as therapist_name')
            ->where('reviews.id', $id)
            ->get();
            // dd($reviews);

            return view('backend.reviewsRatting.view',compact('reviews'));
        }catch (Exception $e) {
            dd($e->getMessage());
        }
    } 



     // View Reviews Function
     public function reviewsEdit($id){
        try{
            $users = User::where([
                'role' => 0,
                'status' => 1,
            ])->get();

            $therapist = User::where(['role' => 1, 'status' => 1])->get();
            $reviewsEdit = Review::find($id);
            return view('backend.reviewsRatting.edit',compact('reviewsEdit','users','therapist'));
        }catch (Exception $e) {
            dd($e->getMessage());
        }
    }        

    // Update Reviews Function 
    public function reviewsUpdate(Request $request){
        $validated = $request->validate([
            'therapist_id' => 'required',
            'user_id' => 'required',
            'rating' => 'required',
            'review' => 'required',
        ]);
        try{
            $reviewsUpdate = Review::find($request->id);
            $reviewsUpdate->therapist_id  = $request->therapist_id;
            $reviewsUpdate->user_id  = $request->user_id;
            $reviewsUpdate->rating  = $request->rating;
            $reviewsUpdate->review  = $request->review;
            $reviewsUpdate->update();

         return redirect()->route('admin.reviewsRatting')->with('success','Reviews Updated Successfully Done .!');
        }catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Delete Reviews Function

    public function reviewsDelete($id){
        try{
            Review::find($id)->delete();
            return redirect()->route('admin.reviewsRatting')->with('delete','Reviews Deleted Successfully Done .!');
        }catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
