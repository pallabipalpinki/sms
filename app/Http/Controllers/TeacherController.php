<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Teacher;
use App\Models\Classst;
use App\Models\Teacherattendence;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::guard('teacher')->check() ){
            return redirect()->route('teacher/dashboard');
        }
        else{
             return view('teacher/index');
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
        $request->validate([
            'firstname' =>'required|max:255',
            'lastname' =>'required|max:255',
            'cne' =>'required|max:10|unique:teachers,cne',
            'email' =>'required|max:255|email|unique:teachers,email',
            'phone' =>'required|max:10|min:10|unique:teachers,phone',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|max:15000',
            'speciality' =>'required|max:25|min:2',
            'password' =>'required|max:25|min:4'
            
        ]);
        $teacher = new teacher();
        if ($request->file('image')) {
           
            $img_name = $this->rand_string(12) . '.' . $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $file->move(public_path('uploads/teacher/'), $img_name);
            
            $teacher->image = $img_name;
        }


        $teacher->cne=$request->cne;
        $teacher->firstname=$request->firstname;
        $teacher->lastname=$request->lastname;
        $teacher->email=$request->email;
        $teacher->phone=$request->phone;
        $teacher->speciality=$request->speciality;
        $teacher->password=Hash::make($request->password);
        //dd($teacher);die;
        $save=$teacher->save();
        if($save)
        {
           return redirect()->back()->with('success','You are now registered successfully');
        }else{
            return redirect()->back()->with('fail','Something went wrong...failed to registered');
        }
        
    }
    public function rand_string($digits) {
        $alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz" . time();
        $rand = substr(str_shuffle($alphanum), 0, $digits);
        return $rand;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = teacher::find($id);
        $teachers = teacher::all();
        return view('teacher',['teacher'=>$teacher,'teachers'=>$teachers, 'layout'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = teacher::find($id);
            $teacher->cne=$request->cne;
            $teacher->firstname=$request->firstname;
            $teacher->lastname=$request->lastname;
            $teacher->age=$request->age;
            $teacher->email=$request->email;
            $teacher->phone=$request->phone;
            $teacher->speciality=$request->speciality;
            $teacher->password=Hash::make($request->password);
        $teacher->save();
        return redirect('/');
    }
    function check_login(Request $request){
        $request->validate([
          'email' =>'required|max:255|email|exists:teachers,email',
          'password' =>'required|max:25|min:4',
         ],
         ['email.exists'=>'the email does not exist in the table']);
         $credential= $request->only('email','password');
         if( Auth::guard('teacher')->attempt($credential) )
         {
           // 
           
        
            //return view('teacher.dashboard');
            return redirect()->intended('teacher/dashboard');
         }else{
            return redirect()->route('teacher.login')->with('fail','Incorerrect credential');
          }
        }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function dashboard()
    {
        if(Auth::guard('teacher') ) {
            return view('teacher/dashboard');  
        }
            
        //  return redirect::to("user.login")->withSuccess('Oopps! You do not have access');
        
    }
    public function classschedule()
    {
        $id=Auth::guard('teacher')->user()->id ;
       // echo $id;exit();
        $data = [];
        $data['schedule'] = Classst::where('status', '1')->where('teacher_id', $id)->get();
        //print_r($data['schedule']);
        return view('teacher.classlist', $data);

    }


    public function attendenceview()
    {
        $id=Auth::guard('teacher')->user()->id;
        $teacher = Teacher::find($id);
        $class = Classst::all();
        return view('teacher.attendenceform',['class'=>$class,'teacher'=>$teacher]);
      
    }
    public function saveattendence(Request $request)
    {     
        //echo "hi1234";exit();
         $request->validate([
            'class_id' =>'required|unique:teacherattendences,class_id',
           
              ]);

            $teacherattendence = new teacherattendence();
            
            //$teacherattendence->subject=$request->subject;
            $teacherattendence->teacher_id=$request->teacher_id;
            $teacherattendence->class_id=$request->class_id;
            $teacherattendence->attendence=1;
           
        
        
        //dd($teacherattendence);die;
            $save=$teacherattendence->save();
            if($save)
            {
            return redirect()->back()->with('success','You added new class successfully');
            }else{
                return redirect()->back()->with('fail','Something went wrong...failed to add');
            }
        
    }












    
    function logout(){
        Auth::guard('teacher')->logout();
        //Session::forget('teacher');
        return redirect()->route('home'); 
       }


}
