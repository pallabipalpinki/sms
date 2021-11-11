<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Student;
use App\Models\Classst;
use App\Models\Studentattendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::guard('student')->check() ){
            return redirect()->route('student.dashboard');
        }
        else{
             return view('student.index');
         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $students = Student::all();
        return view('student',['students'=>$students, 'layout'=>'create']);
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
                'cne' =>'required|max:10|unique:students,cne',
                'email' =>'required|max:255|email|unique:students,email',
                'phone' =>'required|max:10|min:10|unique:students,phone',
                'age' => 'required|numeric|min:1',
                'speciality' =>'required|max:25|min:2',
                'password' =>'required|max:25|min:4'
                
            ]);

            $student = new Student();
            $student->cne=$request->cne;
            $student->firstname=$request->firstname;
            $student->lastname=$request->lastname;
            $student->age=$request->age;
            $student->email=$request->email;
            $student->phone=$request->phone;
            $student->speciality=$request->speciality;
            $student->password=Hash::make($request->password);
            //dd($student);
             //die;
            $save=$student->save();
            if($save)
            {
               return redirect()->back()->with('success','You are now registered successfully');
            }else{
                return redirect()->back()->with('fail','Something went wrong...failed to registered');
            }
            
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::guard('student') ) {
            return view('student.dashboard');  
        }
            
        //  return redirect::to("user.login")->withSuccess('Oopps! You do not have access');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $students = Student::all();
        return view('student',['student'=>$student,'students'=>$students, 'layout'=>'edit']);
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
        $student = Student::find($id);
            $student->cne=$request->cne;
            $student->firstname=$request->firstname;
            $student->lastname=$request->lastname;
            $student->age=$request->age;
            $student->email=$request->email;
            $student->phone=$request->phone;
            $student->speciality=$request->speciality;
            $student->password=Hash::make($request->password);
        $student->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $student = Student::find($id);
    //     $student->delete();
    //     return redirect('/home');
    // }
    function check_login(Request $request){
        $request->validate([
          'email' =>'required|max:255|email|exists:students,email',
          'password' =>'required|max:25|min:4',
         ],
         ['email.exists'=>'the email does not exist in the table']);
         $credential= $request->only('email','password');
         if( Auth::guard('student')->attempt($credential) )
         {
           // 
           
        
            //return view('student.dashboard');
            return redirect()->intended('student/dashboard');
         }else{
            return redirect()->route('student.login')->with('fail','Incorerrect credential');
          }
        }
        public function checkmyclass()
        {
            $id=Auth::guard('student')->user()->id;
            //echo $id;exit();
            $data = [];
            $schedule = Classst::where('status', '1')
            // ->whereIn('student_id', $id)
            ->get();

            //print_r($data['schedule']);
           // echo "<br><br>";
            foreach ($schedule as $stdid){ 
                 // echo $stdid->student_id;
                  $stdarray=explode("," ,$stdid->student_id);
                   if (in_array($id, $stdarray)){
                    //echo "Match found";
                        array_push($data,$stdid);
                    }
                
                }
                //echo "<pre>";print_r($data);die;

            return view('student.classlist')->with('data',$data);

        }



    public function attendenceview()
    {
        $id=Auth::guard('student')->user()->id;
        $student = Student::find($id);
        $class = Classst::all();

        return view('student.attendenceform',['class'=>$class,'student'=>$student]);
    }
    public function saveattendence(Request $request)
    {
       // echo "hi1234";exit();

         $request->validate([
              'class_id' =>'required',
              ]);

            $studentattendence = new Studentattendence();
            
           
            $studentattendence->student_id=$request->student_id;;
            $studentattendence->class_id=$request->class_id;
            $studentattendence->attendence=1;
           
        
        
            //dd($studentattendence);die;
            $save=$studentattendence->save();
            if($save)
            {
            return redirect()->back()->with('success','Your attendence is added successfully');
            }else{
                return redirect()->back()->with('fail','Your attendence is failed to add');
            }
        
    }



    function logout(){
        Auth::guard('student')->logout();
        //Session::forget('student');
        return redirect()->route('home'); 
       }


}
