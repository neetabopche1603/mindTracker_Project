<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JournalPost;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class JournalController extends Controller
{
    /*
        |---------------------------------------------------------------------
        |  JOURNAL POST FUNCTION START
        |---------------------------------------------------------------------
        */

    // Show Journal post list function

    public function journalPosts(Request $request)
    {
        try {
            if ($request->ajax()) {
                $journalPosts = DB::table('journal_posts')
                    ->join('users', 'users.id', '=', 'journal_posts.user_id')
                    ->leftJoin(DB::raw('(SELECT post_id, COUNT(id) as likesCount FROM journal_post_likes GROUP BY post_id) as likes'), 'likes.post_id', '=', 'journal_posts.id')
                    ->where('users.status', 1)
                    ->select('journal_posts.*', 'users.id as userId', 'users.name as user_name', DB::raw('IFNULL(likes.likesCount, 0) as likesCount'))
                    ->get();

                return Datatables::of($journalPosts)

                    ->addColumn('action', function ($row) {

                        $btn = '<div class="dropdown">
                               <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                   <i class="dw dw-more"></i>
                               </a>
                               <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                   <a class="dropdown-item" href="' . route('admin.journalPostView', $row->id) . '" class="text-warning"><i class="dw dw-eye text-warning"></i> View</a>

                                   <a class="dropdown-item" href="' . route('admin.journalPostEditForm', $row->id) . '"><i class="dw dw-edit2 text-success"></i> Edit</a>

                                   <a class="dropdown-item" href="' . route('admin.journalPostDelete', $row->id) . '" onclick="return confirm(`Are you sure delete this data`)"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                               </div>
                           </div>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return  view('backend.journal.journal_post.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // View Journal post function
    public function journalPostView($id)
    {
        try {
            $users = User::where(['role'=>0,'status'=>1])->get();
            $journalPostView =  DB::table('journal_posts')
            ->join('users', 'users.id', '=', 'journal_posts.user_id')
            ->leftJoin(DB::raw('(SELECT post_id, COUNT(id) as likesCount FROM journal_post_likes GROUP BY post_id) as likes'), 'likes.post_id', '=', 'journal_posts.id')
            ->where('users.status', 1)->where('journal_posts.id',$id)
            ->select('journal_posts.*', 'users.id as userId', 'users.name as user_name', DB::raw('IFNULL(likes.likesCount, 0) as likesCount'))
            ->first();

            return  view('backend.journal.journal_post.view', compact('users', 'journalPostView'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Journal post Add Fprm function
    public function journalPostAddForm()
    {
        try {
            $users = User::where(['role'=>0,'status'=>1])->get();
            return view('backend.journal.journal_post.add',compact('users'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Journal post Store  function
    public function journalPostStore(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'post_text' => 'required',
            'post_files.*' => 'mimes:mp4,mp3,mov,ogg,qt,audio/mpeg,mpga,wav,png,jpeg,jpg,gif|max:100000',
        ]);
        try {
            $journalPostStore = new JournalPost();
            $journalPostStore->user_id = $request->user_id;
            $journalPostStore->post_text = $request->post_text;

            // Upload Multiple Files
            $filesData = [];
            if ($request->hasFile('post_files')) {
                $destinationPath = '/journals/posts/';

                $files = $request->file('post_files');
                foreach ($files as $file) {
                    $name =  date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move(public_path() . $destinationPath, $name);
                    array_push($filesData, $name);
                }
            }
            $journalPostStore->post_files = json_encode($filesData, true);
            $journalPostStore->save();
            return redirect()->route('admin.journalPostList')->with('success', 'Post Add Successfully Done.!');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    // Journal post Edit Fprm function
    public function journalPostEditForm($id)
    {
        try {
            $users = User::where(['role'=>0,'status'=>1])->get();
            $journalPostEdit = JournalPost::find($id);
            return  view('backend.journal.journal_post.edit', compact('users', 'journalPostEdit'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    //Journal Post Update Function

    public function journalPostUpdate(Request $request)
    {
        // print_r($request->all());
        // die();
        $validated = $request->validate([
            'user_id' => 'required',
            'post_text' => 'required',
            'post_files.*' => 'mimes:mp4,mp3,mov,ogg,qt,audio/mpeg,mpga,wav,png,jpeg,jpg,gif|max:100000',
        ]);
        try {
            $journalPostUpdate = JournalPost::find($request->id);
            $journalPostUpdate->user_id = $request->user_id;
            $journalPostUpdate->post_text = $request->post_text;
            // Upload Multiple Files
            $filesData = [];
            if ($request->hasFile('post_files')) {
                $destinationPath = '/journals/posts/';

                $files = $request->file('post_files');
                foreach ($files as $file) {
                    $name =  date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move(public_path() . $destinationPath, $name);
                    array_push($filesData, $name);
                }
                $journalPostUpdate->post_files = json_encode($filesData, true);
            }
            $journalPostUpdate->update();
            return redirect()->route('admin.journalPostList')->with('success', 'Post Update Successfully Done.!');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    //Journal Post Delete Function

    public function journalPostDelete($id)
    {
        try {
            JournalPost::find($id)->delete();
            return redirect()->route('admin.journalPostList')->with('delete', 'Post Delete Successfully Done.!');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    //  ----------------------------journal Post Function End----------------------------------

}
