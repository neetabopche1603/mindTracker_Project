<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AppointmentController extends Controller
{
    /*
        |---------------------------------------------------------------------
        | APPOINTMENTS LIST FUNCTION START
        |---------------------------------------------------------------------
        */

    // SHOW APPOINTMENTS FUNCTION
    public function appointments(Request $request)
    {
        try {
            if ($request->ajax()) {
                $appointments = DB::table('appointments')
                    ->join('users as u1', 'u1.id', '=', 'appointments.user_id')
                    ->join('users as u2', 'u2.id', '=', 'appointments.therapist_id')
                    ->select('appointments.*', 'u1.id as user_id', 'u1.name as user_name', 'u2.id as therapist_id', 'u2.name as therapist_name')
                    ->get();

                return Datatables::of($appointments)

                    ->addColumn('booking_status', function ($row) {
                       
                        if ($row->booking_status == 'upcoming') return  '<span class="badge badge-info">Upcoming</span>';
                        if ($row->booking_status == 'cancel') return  '<span class="badge badge-danger">Cancel</span>';
                        if ($row->booking_status == 'completed') return  '<span class="badge badge-success">Completed</span>';

                    })
                    ->addColumn('action', function ($row) {

                        $btn = '<div class="dropdown">
                                   <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                       <i class="dw dw-more"></i>
                                   </a>
                                   <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                       <a class="dropdown-item" href="' . route('admin.appointmentsView', $row->id) . '" class="text-warning"><i class="dw dw-eye text-warning"></i> View</a>
    
                                       <a class="dropdown-item" href="' . route('admin.appointmentsEditForm', $row->id) . '"><i class="dw dw-edit2 text-success"></i> Edit</a>
    
                                       <a class="dropdown-item" href="' . route('admin.appointmentsDelete', $row->id) . '" onclick="return confirm(`Are you sure delete this data`)"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                                   </div>
                               </div>';

                        return $btn;
                    })
                    ->rawColumns(['action', 'booking_status'])
                    ->make(true);
            }
            return view('backend.appointments.appointmentsList.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // View Appointments Function

    public function appointmentsView($id)
    {
        try {
            $users = User::where([
                'role' => 0,
                'status' => 1,
            ])->get();

            $therapist = User::where(['role' => 1, 'status' => 1])->get();
            $appointmentsView = Appointment::find($id);
            return view('backend.appointments.appointmentsList.view', compact('appointmentsView', 'users', 'therapist'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Add Appointments Function

    public function appointmentsAddForm()
    {
        try {
            $users = User::where([
                'role' => 0,
                'status' => 1,
            ])->get();

            $therapist = User::where(['role' => 1, 'status' => 1])->get();
            return view('backend.appointments.appointmentsList.add', compact('users', 'therapist'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Store Appointments Function

    public function appointmentsStore(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'therapist_id' => 'required',
            'appointmentDate' => 'required',
            'appointmentTime' => 'required',
        ]);

        try {
            $appointmentsStore = new Appointment();
            $appointmentsStore->user_id = $request->user_id;
            $appointmentsStore->therapist_id = $request->therapist_id;
            $appointmentsStore->date = $request->appointmentDate;
            $appointmentsStore->time = $request->appointmentTime;
            $appointmentsStore->booking_status = 'upcomming';

            $appointmentsStore->save();
            return redirect()->route('admin.appointments')->with('success', 'Appointments Booked  Successfully Done.!');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Edit Appointments Function
    public function appointmentsEditForm($id)
    {
        try {
            $users = User::where([
                'role' => 0,
                'status' => 1,
            ])->get();

            $therapist = User::where(['role' => 1, 'status' => 1])->get();
            $appointmentsEdit = Appointment::find($id);
            // $data = [
            //     'users'  => $users,
            //     'therapist'   => $therapist,
            //     'appointmentsEdit' => $appointmentsEdit
            // ];
            return view('backend.appointments.appointmentsList.edit', compact('appointmentsEdit', 'users', 'therapist'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Update Appointments Function
    public function appointmentsUpdate(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'therapist_id' => 'required',
            'appointmentDate' => 'required',
            'appointmentTime' => 'required',
            'booking_status' => 'required',
        ]);

        try {
            $appointmentsUpdate = Appointment::find($request->id);
            $appointmentsUpdate->user_id = $request->user_id;
            $appointmentsUpdate->therapist_id = $request->therapist_id;
            $appointmentsUpdate->date = $request->appointmentDate;
            $appointmentsUpdate->time = $request->appointmentTime;
            $appointmentsUpdate->booking_status = $request->booking_status;

            $appointmentsUpdate->update();
            return redirect()->route('admin.appointments')->with('success', 'Appointments Updated Successfully Done.!');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Delete Appointments Function  
    public function appointmentsDelete($id)
    {
        try {
            Appointment::find($id)->delete();
            return redirect()->route('admin.appointments')->with('delete', 'Appointments Delete Successfully Done.!');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
