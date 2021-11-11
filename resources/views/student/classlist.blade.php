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
     
    </tr>
  </thead>
  <tbody>
     @php
    
    @endphp
    @foreach($data as $class)

    @php
     
    @endphp
    <tr>
      <th scope="row">{{ $class->id }}</th>
      <th scope="row">{{ $class->subject }}</th>
      <th scope="row">{{ date('d-M-y', strtotime($class->date)) }}</th>
      <th scope="row">{{ $class->starttime }}</th>
      <th scope="row">{{ $class->endtime }}</th>
      
    </tr>
    @endforeach
   
  </tbody>
</table> 

<div class="container overflow-hidden">
  <div class="row gx-5">
  <div class="col">
      <div class="p-3 border bg-light">
      <a href="{{url('student/dashboard')}}">Go Back home</a>  
      </div>
    </div>
  </div>
</div>
</div>
@endsection