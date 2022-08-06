<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Home;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::id())
        {
            return redirect('home');
        }else
        {
            $doctor = Doctor::all();
            return view('user.home', compact('doctor'));
        }
        
    }

    public function redirect()
    {
        //
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor = Doctor::all();
                return view('user.home', compact('doctor'));
            }
            else
            {
                return view('admin.home');
            }
        }else{

        }
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
        $appointment = new Appointment;
        $appointment->name=$request->name;
        $appointment->phone=$request->phone;
        $appointment->email=$request->email;
        $appointment->doctor=$request->doctor;
        $appointment->date=$request->date;
        $appointment->message=$request->message;
        $appointment->status='In progress';

        if(Auth::id())
        {
            $appointment->user_id = Auth::user()->id;
        }

        $appointment->save();

        return redirect()->back()->with('message','Appointment Request Sent Successfully, We contact with you as soon as possible!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    public function myappointment()
    {
        //
        if(Auth::id())
        {   
            $user_id = Auth::user()->id;
            $appointment = Appointment::where('user_id',$user_id)->get();
            return view('user.my_appointment', compact('appointment'));
            
        }
        else
        {
            return redirect()->back();
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function cancelAppointment($id)
    {
        //
        $data = Appointment::find($id);
        $data->delete();

        return redirect()->back()->with('message','Appointment Request Cancel Successfully');
    }
}
