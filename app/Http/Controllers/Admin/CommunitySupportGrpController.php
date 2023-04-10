<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommunityGroupPost;
use App\Models\CommunityGroups;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CommunitySupportGrpController extends Controller
{
    /*
        |---------------------------------------------------------------------
        | COMMUNITY SUPPORT GRUOPS[C.S.G] (CREATE GRPS) FUNCTION START
        |---------------------------------------------------------------------
        */
    // Show List C.S.G Function
    public function groupList(Request $request)
    {

        // $communityGroups = DB::table('community_groups_members')
        //         ->rightJoin('community_groups', 'community_groups.id', '=', 'community_groups_members.group_id')
        //         ->select('community_groups.group_name','community_groups.id','community_groups.group_icon', DB::raw('COUNT(community_groups_members.id) as count_member'))
        //         ->groupBy('community_groups.group_name', 'community_groups.id','community_groups.group_icon')
        //         ->get();
        //             dd($communityGroups);
        try {
            if ($request->ajax()) {
                // $communityGroups = CommunityGroups::all();
                $communityGroups = DB::table('community_groups_members')
                ->rightJoin('community_groups', 'community_groups.id', '=', 'community_groups_members.group_id')
                ->select('community_groups.group_name','community_groups.id','community_groups.group_icon','community_groups.status', DB::raw('COUNT(community_groups_members.id) as count_member'))
                ->groupBy('community_groups.group_name', 'community_groups.id','community_groups.group_icon','community_groups.status')
                ->get();

                return Datatables::of($communityGroups)
                    ->addIndexColumn()
                    ->addColumn('status', function ($row) {
                        return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Block</span>';
                    })

                    ->addColumn('group_icon', function ($row) {
                        // /community_support/group_icons/
                        return "<img src='$row->group_icon' class='grpsIconPopup' alt='$row->group_name' width='70' height='70'>";
                    })

                    ->addColumn('action', function ($row) {

                        $btn = '<div class="dropdown">
                               <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                   <i class="dw dw-more"></i>
                               </a>
                               <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                   <a class="dropdown-item" href="' . route('admin.communityGroupEditForm', $row->id) . '"><i class="dw dw-edit2 text-success"></i> Edit</a>

                                   <a class="dropdown-item" href="' . route('admin.communityGroupDelete', $row->id) . '" onclick="return confirm(`Are you sure delete this data`)"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                               </div>
                           </div>';

                        return $btn;
                    })
                    ->rawColumns(['action', 'status', 'group_icon'])
                    ->make(true);
            }
            return view('backend.community_support.groups.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // View List C.S.G Function
    public function groupView(Request $request)
    {
        try {
            return view('backend.community_support.groups.view');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Add Form List C.S.G Function
    public function groupAddForm(Request $request)
    {
        try {
            return view('backend.community_support.groups.add');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Store C.S.G Function
    public function groupStore(Request $request)
    {
        $validated = $request->validate([
            'group_name' => 'required|unique:community_groups,group_name',
            'group_icon' => 'required',
            'status' => 'required',
        ]);
        try {
            $groupPostStore = new CommunityGroups();
            $groupPostStore->group_name = $request->group_name;
            $groupPostStore->status = $request->status;
            // Grp Icons upload 
            if ($request->hasFile('group_icon')) {
                if ($reqIcons = $request->file('group_icon')) {
                    $destinationPath = '/community_support/group_icons/';
                    $groupIcons = date('YmdHis') . "." . $reqIcons->getClientOriginalExtension();
                    $reqIcons->move(public_path() . $destinationPath, $groupIcons);

                    $imagePath = $destinationPath . $groupIcons;
                    $groupPostStore->group_icon = url($imagePath);
                }
            }
            $groupPostStore->save();
            return redirect()->route('admin.communityGroups')->with('success', 'Group Created Successfully Done');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // EDIT Form List C.S.G Function
    public function groupEditForm($id)
    {
        try {
            $groupPostEditForm = CommunityGroups::find($id);
            return view('backend.community_support.groups.edit', compact('groupPostEditForm'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    // Update C.S.G Function
    public function groupUpdate(Request $request)
    {
        $validated = $request->validate([
            'group_name' => 'required|unique:community_groups,group_name,' . $request->id,
        ]);
        try {
            $groupPostUpdate =  CommunityGroups::find($request->id);
            $groupPostUpdate->group_name = $request->group_name;
            $groupPostUpdate->status = $request->status;
            // Grp Icons upload 

            if ($reqIcons = $request->file('group_icon')) {
                $destinationPath = '/community_support/group_icons/';
                // Old Image Delete Code Start
                if ($groupPostUpdate->group_icon != NULL) {
                    if (file_exists('/community_support/group_icons/' . $groupPostUpdate->group_icon)) {
                        unlink('/community_support/group_icons/' . $groupPostUpdate->group_icon);
                    }
                }
                // Old Image Delete Code End
                $groupIcons = date('YmdHis') . "." . $reqIcons->getClientOriginalExtension();
                $reqIcons->move(public_path() . $destinationPath, $groupIcons);
                $groupPostUpdate->group_icon = $groupIcons;
            }

            $groupPostUpdate->update();
            return redirect()->route('admin.communityGroups')->with('success', 'Group Updated Successfully Done');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // DELETE C.S.G Function
    public function groupDelete($id)
    {
        try {
            CommunityGroups::find($id)->delete();
            return redirect()->route('admin.communityGroups')->with('delete', 'Group delete Successfully Done');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


     /*
        |---------------------------------------------------------------------
        |  COMMUNITY GROUP POST FUNCTION START
        |---------------------------------------------------------------------
        */

    // Show Community Group post list function

    public function communityPostsList(Request $request)
    {
        try {
            if ($request->ajax()) {
                $communityPosts = DB::table('community_group_posts')
                    ->join('users', 'users.id', '=', 'community_group_posts.user_id')
                    ->join('community_groups', 'community_groups.id', '=', 'community_group_posts.community_group_id')
                    ->leftJoin(DB::raw('(SELECT group_post_id, COUNT(id) as likesCount FROM community_group_likes GROUP BY group_post_id) as likes'), 'likes.group_post_id', '=', 'community_group_posts.id')
                    ->where('users.status', 1)
                    ->select('community_group_posts.*','community_groups.group_name', 'users.id as userId', 'users.name as user_name', DB::raw('IFNULL(likes.likesCount, 0) as likesCount'))
                    ->get();

                return Datatables::of($communityPosts)

                    ->addColumn('action', function ($row) {

                        $btn = '<div class="dropdown">
                               <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                   <i class="dw dw-more"></i>
                               </a>
                               <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                   <a class="dropdown-item" href="' . route('admin.postPostView', $row->id) . '" class="text-warning"><i class="dw dw-eye text-warning"></i> View</a>

                                   <a class="dropdown-item" href="' . route('admin.communityPostEditForm', $row->id) . '"><i class="dw dw-edit2 text-success"></i> Edit</a>

                                   <a class="dropdown-item" href="' . route('admin.communityPostDelete', $row->id) . '" onclick="return confirm(`Are you sure delete this data`)"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                               </div>
                           </div>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return  view('backend.community_support.posts.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function communityPostAddForm()
    {
        try {
            $users = User::where(['role' => 0, 'status' => 1])->get();
            $groups = CommunityGroups::where( 'status', 1)->get();
            return view('backend.community_support.posts.add', compact('users','groups'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function communityPostStore(Request $request)
    {
        $validated = $request->validate([
            'group_id'=>'required',
            'user_id' => 'required',
            'post_text' => 'required',
            'post_files.*' => 'mimes:mp4,mp3,mov,ogg,qt,audio/mpeg,mpga,wav,png,jpeg,jpg,gif|max:100000',
        ]);
        try {
            $groupPostStore = new CommunityGroupPost();
            $groupPostStore->user_id = $request->user_id;
            $groupPostStore->community_group_id = $request->group_id;
            $groupPostStore->grpPost_text = $request->post_text;

            // Upload Multiple Files
            $filesData = [];
            if ($request->hasFile('post_files')) {
                $destinationPath = '/community_group/posts/';

                $files = $request->file('post_files');
                foreach ($files as $file) {
                    $name =  date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move(public_path() . $destinationPath, $name);
                    array_push($filesData, $name);
                }
            }
            $groupPostStore->grpPostFiles = json_encode($filesData, true);
            $groupPostStore->save();
            return redirect()->route('admin.journalPostList')->with('success', 'Post Add Successfully Done.!');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

     // View Post post function
     public function postPostView($id)
     {
         try {
            // $users = User::where(['role' => 0, 'status' => 1])->get();
 
                 $communityPosts = DB::table('community_group_posts')
                    ->join('users', 'users.id', '=', 'community_group_posts.user_id')
                    ->join('community_groups', 'community_groups.id', '=', 'community_group_posts.community_group_id')
                    ->leftJoin(DB::raw('(SELECT group_post_id, COUNT(id) as likesCount FROM community_group_likes GROUP BY group_post_id) as likes'), 'likes.group_post_id', '=', 'community_group_posts.id')
                    ->where('users.status', 1)->where('community_group_posts.id', $id)
                    ->select('community_group_posts.*','community_groups.group_name', 'users.id as userId', 'users.name as user_name', DB::raw('IFNULL(likes.likesCount, 0) as likesCount'))
                    ->first();

             return  view('backend.community_support.posts.view', compact('communityPosts'));
         } catch (Exception $e) {
             dd($e->getMessage());
         }
     }

    // Community post Edit Fprm function
    public function communityPostEditForm($id)
    {
        try {
            $users = User::where(['role' => 0, 'status' => 1])->get();
            $groups = CommunityGroups::where( 'status', 1)->get();
            
            $groupPostEdit = CommunityGroupPost::find($id);
            return view('backend.community_support.posts.edit', compact('users','groups','groupPostEdit'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

     //Community Post Update Function

     public function communityPostUpdate(Request $request)
     {
         // print_r($request->all());
         // die();
         $request->validate([
             'user_id' => 'required',
             'group_id' => 'required',
             'post_text' => 'required',
             'post_files.*' => 'mimes:mp4,mp3,mov,ogg,qt,audio/mpeg,mpga,wav,png,jpeg,jpg,gif|max:100000',
         ]);
         try {
            
             $communityPostUpdate = CommunityGroupPost::find($request->id);
             $communityPostUpdate->user_id = $request->user_id;
             $communityPostUpdate->community_group_id = $request->group_id;
             $communityPostUpdate->grpPost_text = $request->post_text;
             // Upload Multiple Files
             $filesData = [];
             if ($request->hasFile('post_files')) {
                 $destinationPath = '/community_group/posts/';
 
                 $files = $request->file('post_files');
                 foreach ($files as $file) {
                    $random_digit = rand(1111,9999);
                     $name =  date('YmdHis') ."-". $random_digit."." . $file->getClientOriginalExtension();
                     $file->move(public_path() . $destinationPath, $name);
                     array_push($filesData, $name);
                 }
                 $communityPostUpdate->grpPostFiles = json_encode($filesData, true);
             }
             $communityPostUpdate->update();
             return redirect()->route('admin.communityPostsList')->with('success', 'Post Update Successfully Done.!');
         } catch (Exception $e) {
             dd($e->getMessage());
         }
     }


       //Community Post Delete Function

    public function communityPostDelete($id)
    {
        try {
            CommunityGroupPost::find($id)->delete();
            return redirect()->route('admin.communityPostsList')->with('delete', 'Post Delete Successfully Done.!');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
