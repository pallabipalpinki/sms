@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-striped table-hover">
<thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">CNE</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Speciality</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
      @foreach($teachers as $data)
    <tr>
      <th scope="row">{{$data->id}}</th>
      <th scope="row">{{$data->cne}}</th>
      <th scope="row">{{$data->firstname}} {{$data->lastname}}</th>
      <th scope="row">{{$data->email}}</th>
      <th scope="row">{{$data->speciality}}</th>
      <th><a href="#" class="btn btn-sm btn-info">show</a>
          <a href="{{url('/admin/teacher-edit/'.$data->id)}}" class="btn btn-sm btn-warning">edit</a>
          <a href="{{url('/admin/teacher-delete/'.$data->id)}}" class="btn btn-sm btn-danger">delete</a>
          <a href="{{url('admin/teacherattendence')}}"> Attendence</a>
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