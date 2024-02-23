<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

   


    public function showPendingLeaveRequests()
{
    $pendingLeaveRequests = Leave::where('leave_status', 'pending')->get();

    return view('admin.leaveDetails', compact('pendingLeaveRequests'));
}


public function approveLeave($id)
{
    $leave = Leave::find($id);
    $leave->leave_status = 'approved';
    $leave->save();

    return redirect()->back()->with('success', 'Leave request approved/rejected successfully.');
}

public function rejectLeave(Request $request, $id)
{
    $leave = Leave::find($id);
    $leave->leave_status = 'rejected';
    $leave->reject_reason = $request->input('reject_reason');
    $leave->save();

    return redirect()->back()->with('success', 'Leave request approved/rejected successfully.');
}




    // public function approve(Request $request)
    // {

    //     dd($request);
    //     $request->validate([
    //         'leave_id' => 'required|exists:leaves,id',
    //         'leave_status' => 'required|in:approved,rejected',
    //         'comments' => 'nullable|string',
    //     ]);

    //     $leave = Leave::findOrFail($request->leave_id);

    //     $leave->create([
    //         'leave_status' => $request->leave_status,
    //         'comments' => $request->comments,
    //     ]);

    //     return redirect()->back()->with('success', 'Leave request approved/rejected successfully.');
    // }

    public function getSignOut()
    {
        return view('admin.signout');
    }

}