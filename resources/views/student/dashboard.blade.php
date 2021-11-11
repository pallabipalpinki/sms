@extends('home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif



                        {{ __('You are logged in!') }}
                        
                        <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Speciality</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ Auth::guard('student')->user()->firstname }} {{ Auth::guard('student')->user()->lastname }}</td>
                                    <td>{{ Auth::guard('student')->user()->phone }}</td>
                                    <td>{{ Auth::guard('student')->user()->email }}</td>
                                    <td>{{ Auth::guard('student')->user()->speciality }}</td>
                                    <td><a  href="{{ route('student.logout') }}" onclick="event.preventdefault();document.getElementById('logout-form').submit();"> Logout </a>
                                    <form action="{{ route('student.logout') }}" method="POST" id="logout-form" class="d-none">@csrf</form>
                                    </td>
                                </tr>
                        
                             </tbody>
                        </table>
                        <!-- <a href="{{url('/student/studentlist')}}">My Class</a> -->
                    </div>
               </div>
            </div>
        </div>
    </div>
    <div class="container overflow-hidden">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light">
                    <a href="{{url('student/checkmyclass')}}">My Classes</a>
                </div>
            </div>
                <!--  <div class="col">
                <div class="p-3 border bg-light">
                     <a href="{{url('admin/studentlist')}}">All Teacher List</a>
                </div>
                </div> -->
                <div class="col">
                <div class="p-3 border bg-light">
                <a href="{{url('student/attendenceview')}}">Give attendence</a>
                </div>
                </div>
        </div>
    </div>




</div>
@endsection