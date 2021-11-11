@extends('home')
@section('content')
<div class="container">
<table class="table table-striped table-hover">
<thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Date</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($schedule as $class)
    <tr>
      <th scope="row">{{$class->id}}</th>
      <th scope="row">{{$class->subject}}</th>
      <th scope="row">{{date('d-M-y', strtotime($class->date))}}</th>
      <th scope="row">{{$class->starttime}}</th>
      <th scope="row">{{$class->endtime}}</th>
      
      <th><a href="#" class="btn btn-sm btn-info">show</a>
          <a href="{{url('/admin/student-edit/'.$class->id)}}" class="btn btn-sm btn-warning">edit</a>
          <a href="{{url('/admin/student-delete/'.$class->id)}}" class="btn btn-sm btn-danger">delete</a>
      </th>
    </tr>
    @endforeach
   
  </tbody>
</table> 

<div class="container overflow-hidden">
  <div class="row gx-5">
  <div class="col">
      <div class="p-3 border bg-light">
      <a href="{{url('admin/dashboard')}}">Go Back home</a>  
      </div>
    </div>
  </div>
</div>
</div>
@endsection