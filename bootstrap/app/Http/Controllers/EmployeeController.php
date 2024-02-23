<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  public function getemp()
  {
    return view('employee.emp');
  }
  public function getEmployees()
  {
    return view('employee.employees ');
  }

  public function getDashboard()
  {
    return view('employee.employees');
  }



  public function index()
  {
    $leaves = Leave::all();
    //  dd( $leaves);
    return view('employee.leave', compact('leaves'));
  }


  public function create()
  {
    return view('employee.employees');
  }
  public function store(Request $request)
  {
    try {

      $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'mobile_no' => 'required|string',
        'department' => 'required|string',
        'leave_type' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'leave_reason' => 'required|string',
        // 'leave_status' => 'required|string',
      ]);
// dd(  $request);
      Leave::create([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'mobile_no' => $request->input('mobile_no'),
        'department' => $request->input('department'),
        'leave_type' => $request->input('leave_type'),
        'start_date' => $request->input('start_date'),
        'end_date' => $request->input('end_date'),
        'leave_reason' => $request->input('leave_reason'),
        'leave_status' => 'pending',
      ]);


      return redirect()->back()->with('success', 'Leave request submitted successfully');
    } catch (\Exception $e) {

      return redirect()->back()->with('error', 'An error occurred while processing the request');
    }
  }
  public function edit($id)
  {
    $leaves =  Leave::findOrFail($id);

    return view('employee.edit', compact('leave'));
  }



  public function getleave()
  {
    $leaves = Leave::all();

    return view('employee.leaveHistory', compact('leaves'));
  }



  public function getlogin()
  {
    return view('employee.login');
  }
}
