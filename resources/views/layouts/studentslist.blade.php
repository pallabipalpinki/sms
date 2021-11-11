@extends('layouts.app')

@section('content')
<table class="table table-striped table-hover">
<thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">CNE</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Speciality</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
      @foreach($students as $data)
    <tr>
      <th scope="row">{{$data->id}}</th>
      <th scope="row">{{$data->cne}}</th>
      <th scope="row">{{$data->firstname}}</th>
      <th scope="row">{{$data->lastname}}</th>
      <th scope="row">{{$data->speciality}}</th>
      <th><a href="#" class="btn btn-sm btn-info">show</a>
          <a href="{{url('/edit/'.$data->id)}}" class="btn btn-sm btn-warning">edit</a>
          <a href="{{url('/delete/'.$data->id)}}" class="btn btn-sm btn-danger">delete</a>
      </th>
    </tr>
    @endforeach
   
  </tbody>
</table>      
@endsection  