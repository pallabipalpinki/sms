<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Student Management System</title>
  </head>
  <body>
    <center><h1>Student Management System</h1></center>
    @include('navbar');
        @if($layout == 'index')
       
        <div class="container-fluid">
        <div class="row">
            <section class="col">@include('layouts.studentslist')</section>
            <section class="col"></section>
        </div>
        </div>
        @elseif($layout == 'create')
        
        <div class="container-fluid">
        <div class="row">
            <section class="col">@include('layouts.studentslist');</section>
            <section class="col">

            <form action="{{url('/store')}}" method="post">
                @csrf
                <div class="form-group">
                <label for="cne" class="form-label">CNE</label>
                <input type="text" id="cne" name="cne" class="form-control" placeholder="Enter cne">
                </div>
                <div class="form-group">
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter firstname">
                </div>
                <div class="form-group">
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter lastname">
                </div>
                <div class="form-group">
                <label for="age" class="form-label">AGE</label>
                <input type="text" id="age" name="age" class="form-control" placeholder="Enter age">
                </div>
                <div class="form-group">
                <label for="speciality" class="form-label">Speciality</label>
                <input type="text" id="speciality" name="speciality" class="form-control" placeholder="Enter speciality">
                </div>
                <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="text" id="password" name="password" class="form-control" placeholder="Enter password">
                </div>
                <div class="form-group">
                <input type="submit" class="btn btn-primary" name="subbtn" value="Save">
                <input type="reset" class="btn btn-warning" name="resetbtn" value="Reset">
                 </div>
            </form>

            </section>
        </div>
        </div>
        @elseif($layout == 'show')
       
        <div class="container-fluid">
        <div class="row">
            <section class="col">@include('layouts.studentslist');</section>
            <section class="col"></section>
        </div>
        </div>
        @elseif($layout == 'edit')
        
        <div class="container-fluid">
        <div class="row">
            <section class="col">@include('layouts.studentslist');</section>
            <section class="col">
            <form action="{{url('/update/'.$student->id)}}" method="post">
                @csrf
                <div class="form-group">
                <label for="cne" class="form-label">CNE</label>
                <input type="text" id="cne" name="cne" class="form-control" value="{{$student->cne}}" placeholder="Enter cne">
                </div>
                <div class="form-group">
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" id="firstname" name="firstname" class="form-control" value="{{$student->firstname}}" placeholder="Enter firstname">
                </div>
                <div class="form-group">
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" id="lastname" name="lastname" class="form-control" value="{{$student->lastname}}" placeholder="Enter lastname">
                </div>
                <div class="form-group">
                <label for="age" class="form-label">AGE</label>
                <input type="text" id="age" name="age" class="form-control" value="{{$student->age}}" placeholder="Enter age">
                </div>
                <div class="form-group">
                <label for="speciality" class="form-label">Speciality</label>
                <input type="text" id="speciality" name="speciality" class="form-control" value="{{$student->speciality}}" placeholder="Enter speciality">
                </div>
                <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="text" id="password" name="password" class="form-control" value="{{$student->password}}" placeholder="Enter password">
                </div>
                <div class="form-group">
                <input type="submit" class="btn btn-primary" name="updatebtn" value="Update">
                <input type="reset" class="btn btn-warning" name="resetbtn" value="Reset">
                 </div>
            </form>

            </section>
        </div>
        </div>
        @endif


       

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>