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
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ Auth::guard('teacher')->user()->firstname }} {{ Auth::guard('teacher')->user()->lastname }}</td>
                                    <td>{{ Auth::guard('teacher')->user()->phone }}</td>
                                    <td>{{ Auth::guard('teacher')->user()->email }}</td>
                                    <td><img src="{{ URL::asset('uploads/teacher/' . Auth::guard('teacher')->user()->image ) }}" height="30px" width="30px" alt="user" class="img-responsive"></a></td>
                                    <td><a  href="{{ route('teacher.logout') }}" onclick="event.preventdefault();document.getElementById('logout-form').submit();"> Logout </a>
                                    <form action="{{ route('teacher.logout') }}" method="POST" id="logout-form" class="d-none">@csrf</form>
                                    </td>
                                </tr>
                        
                             </tbody>
                        </table>
                        <!-- <a href="{{url('/teacher/studentlist')}}">My Class</a> -->
                    </div>
               </div>
            </div>
        </div>
    </div>
    <div class="container overflow-hidden">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light">
                    <a href="{{url('teacher/classschedule')}}">My Class</a>
                </div>
            </div>
                <div class="col">
                <div class="p-3 border bg-light">
                <a href="{{url('teacher/attendenceview')}}">Give attendence</a>
                </div>
                </div>
                <div class="col">
                <div class="p-3 border bg-light">
                    <a href="{{url('admin/assignclassst')}}">Add new class</a>
                </div>
                </div>
        </div>
    </div>




</div>
@endsection