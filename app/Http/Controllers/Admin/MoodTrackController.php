<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MoodTrack;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class MoodTrackController extends Controller
{
     /*
        |---------------------------------------------------------------------
        | MOOD TRACK MODULE START
        |---------------------------------------------------------------------
        */
    //  Show mood Type List Function
    public function moodtype(Request $request)
    {
        try {
            if ($request->ajax()) {

                $moodTypes = DB::table('mood_tracks')->join('users','users.id','=','mood_tracks.user_id')->select('mood_tracks.*','users.id as userId','users.name as user_name')->where('status',1)->get();

                return Datatables::of($moodTypes)
                ->addIndexColumn()

                ->editColumn('created_at', function ($row) {
                    return \Carbon\Carbon::parse($row->created_at)->format('d F Y H:i:s');
                })

                ->editColumn('updated_at', function ($row) {
                    return \Carbon\Carbon::parse($row->updated_at)->isoFormat('D MMMM YYYY HH:mm:ss');
                })

                    ->addColumn('action', function ($row) {

                        $btn = '<div class="dropdown">
                               <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                   <i class="dw dw-more"></i>
                               </a>
                               <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                   <a class="dropdown-item" href="'.route('admin.moodTypeEditForm',$row->id).'"><i class="dw dw-edit2 text-success"></i> Edit</a>

                                   <a class="dropdown-item" href="'.route('admin.moodTrackDelete',$row->id).'" onclick="return confirm(`Are you sure delete this data`)"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                               </div>
                           </div>';

                        return $btn;
                    })
                    ->rawColumns(['action','created_at','updated_at'])
                    ->make(true);
            }
            return view('backend.moodTrack.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    //  moodType Edit Form Function
    public function moodTypeEditForm($id){
        try{
            $users = User::where(['role'=>0,'status'=>1])->get();
            $moodTypeEditForm = MoodTrack::find($id);
            return view('backend.moodTrack.edit',compact('moodTypeEditForm','users'));
        }catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Mood Type Update function
    public function moodTypeUpdate(Request $request){
       
        $validated = $request->validate([
            'user_id' => 'required',
            'mood_type' => 'required',
        ]);
        try{
            $moodTypeUpdate = MoodTrack::find($request->id);
            $moodTypeUpdate->user_id = $request->user_id;
            $moodTypeUpdate->mood_type = $request->mood_type;
            $moodTypeUpdate->update();
            return redirect()->route('admin.moodTypeList')->with('success',"Mood Type Updated Successfully Done.!");
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    // mood type delete function
    public function moodTrackDelete($id){
        try{
            MoodTrack::find($id)->delete();
            return redirect()->route('admin.moodTypeList')->with('delete',"Mood Type Deteted Successfully Done.!");
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
