<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Notification;
use App\Notifications\SendEmailNotification;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.add_doctor');
    }

    public function showappoinment()
    {
        //
        $data = Appointment::all();
        return view('admin.showappoinment', compact('data'));

    }

    public function alldoctor()
    {
        //
        $data = Doctor::all();
        return view('admin.alldoctor', compact('data'));

    }

    public function deletedoctor($id)
    {
        //
        $data = Doctor::find($id);
        $data->delete();

        return redirect()->back()->with('message','Doctor Removed Successfully');
    }

    public function updatedoctor($id)
    {
        //
        $data = Doctor::find($id);

        return view('admin.updatedoctor', compact('data'));
    }

    public function emailview($id)
    {
        //
        $data = Appointment::find($id);

        return view('admin.emailview', compact('data'));
    }

    public function sendmail(Request $request, $id)
    {
        //
        $data = Appointment::find($id);

        $details=[
            'greeting'=> $request->greeting,
            'body'=> $request->body,
            'actionpart'=> $request->actionpart,
            'actionurl'=> $request->actionurl,
            'endpart'=> $request->endpart,
        ];

        Notification::send($data, new SendEmailNotification($details));

        

        return redirect()->back()->with('message','Send Email Successfully');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $doctor = new Doctor;
        $image = $request->file;
        //dd($image);
        
        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;

        $doctor->save();

        return redirect()->back()->with('message','Doctor Added Successfully');

    }

    public function approved($id)
    {
        //
        $data = Appointment::find($id);
        $data->status= "Approved";
        $data->save();

        return redirect()->back()->with('message','Appointment Request Approved Successfully');
    }

    public function cancell($id)
    {
        //
        $data = Appointment::find($id);
        $data->status= "Cancelled";
        $data->save();

        return redirect()->back()->with('message','Appointment Request Cancelled!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $doctor = Doctor::find($id);

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;
        $image = $request->file;
        if($image){            
            //dd($image);            
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->file->move('doctorimage',$imagename);
            $doctor->image=$imagename;
        }

        $doctor->save();

        return redirect()->back()->with('message','Doctor Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
