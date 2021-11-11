<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\Student;
use App\Models\studentattendence;
use App\Models\Teacher;
use App\Models\Classst;


class AdminController extends Controller
{
    public function index()
    {
       //$students = Student::all();
      // return view('student',['students'=>$students, 'layout'=>'index']);

     
        if( Auth::guard('admin')->check() ){
            return redirect()->route('admin/dashboard');
        }
        else{
             return view('admin.login');
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
        return view('student.login',['students'=>$students, 'layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    $student = new Student();
    //    $student->cne=$request->input('cne');
    //    $student->firstname=$request->input('firstname');
    //    $student->lastname=$request->input('lastname');
    //    $student->age=$request->input('age');
    //    $student->speciality=$request->input('speciality');
    //    $student->password=$request->input('password');
    //    $student->save();
    //    return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $students = Student::all();
        return view('student',['student'=>$student,'students'=>$students, 'layout'=>'show']);
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
        return view('admin.showstudent',['student'=>$student,'students'=>$students]);
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
        $request->validate([
            'firstname' =>'required|max:255',
            'lastname' =>'required|max:255',
            'cne' =>'required|max:10|unique:students,cne,'.$id,
            'email' =>'required|max:255|email|unique:students,email,'.$id,
            'phone' =>'required|max:10|min:10|unique:students,phone,'.$id,
            'age' => 'required|numeric|min:1',
            'speciality' =>'required|max:25|min:2',
            'password' =>'required|min:4'
            ]);

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
        
        return redirect('/admin/studentlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('/admin/studentlist');
    }


    function check_login(Request $request){
        $request->validate([
          'email' =>'required|max:255|email|exists:admins,email',
          'password' =>'required|max:25|min:4'
        ],[
            'email.exists'=>'This email does not exists in admin table'
        ]);
         $credential= $request->only('email','password');
         if( Auth::guard('admin')->attempt($credential) )
         {
          return redirect()->route('admin.dashboard');   
         }else{
            return redirect()->route('admin.login')->with('fail','Incorerrect credential');
          }
        }
    public function dashboard()
    {
        if(Auth::guard('admin') ) {
            return view('admin.dashboard');  
        }
            
        //  return redirect::to("user.login")->withSuccess('Oopps! You do not have access');
    }
    public function studentlist()
    {
        $students = Student::all();
        return view('admin.studentslist',['students'=>$students]);
    }
    public function teacherlist()
    {
        $teachers = Teacher::all();
        return view('admin.teacherslist',['teachers'=>$teachers]);
    }
    public function assignclassst()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        return view('admin.assignclass',['students'=>$students , 'teachers'=>$teachers]);
    }
    public function addclass(Request $request)
    {
         $request->validate([
              'subject' =>'required',
              'teacher' =>'required',
            'student' =>'required',
             'cdate' =>'required',
            'starttime' =>'required',
             'endtime' => 'required',
            ]);
      //  print_r($request->student);
       $studentstring=implode(',', $request->student);
       //echo $studentstring;exit();

            $classst = new classst();
            
            $classst->subject=$request->subject;
            $classst->teacher_id=$request->teacher;
            $classst->student_id=$studentstring;
            $classst->date=$request->cdate;
            $classst->starttime=$request->starttime;
            $classst->endtime=$request->endtime;
            $classst->status=1;
        
        //dd($classst);die;
            $save=$classst->save();
            if($save)
            {
            return redirect()->back()->with('success','You added new class successfully');
            }else{
                return redirect()->back()->with('fail','Something went wrong...failed to add');
            }
        
    }
    function studentattendencecount($id)
    {
        $student = Student::find($id);
       // dd($student);
        $studentattendence = $student->studentattendence;
        dd($studentattendence);
        //$studentattendence = Studentattendence::find($id);
       // dd($student);
        //$studentattendence = $student->studentattendences;
        //dd($studentattendence);


    }
    function teacherattendence()
    {
        
    }




function logout(){
    Auth::guard('admin')->logout();
        return redirect('/'); 
        }
    






}
