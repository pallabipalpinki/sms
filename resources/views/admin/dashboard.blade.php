@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th> Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ Auth::guard('admin')->user()->name }}</td>
                            <td>{{ Auth::guard('admin')->user()->phone }}</td>
                            <td>{{ Auth::guard('admin')->user()->email }}</td>
                            <td>
         <a  href="{{ route('admin.logout') }}" onclick="event.preventdefault();document.getElementById('logout-form').submit();"> Logout </a>
               <form action="{{ route('admin.logout') }}" method="POST" id="logout-form" class="d-none">@csrf</form>
                            </td>
                        </tr>
                       
                     </tbody>
                   </table>

                </div>
            </div>
        </div>
    </div>

    <div class="container overflow-hidden">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light">
                    <a href="{{url('admin/studentlist')}}">All Student List</a>
                </div>
            </div>
                <div class="col">
                <div class="p-3 border bg-light">
                    <a href="{{url('admin/teacherlist')}}">All Teacher List</a>
                </div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light">
                        <a href="{{url('admin/assignclassst')}}">Add new class</a>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light">
                        <!-- <a href="{{url('admin/studentattendence')}}">Student attendencelist</a> -->
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light">
                        <!-- <a href="{{url('admin/teacherattendence')}}">Teacher attendencelist</a> -->
                    </div>
                </div>
        </div>
    </div>

</div>


@endsection
