<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommunityGroups;
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
}
