@extends('home')
@section('content')
<div class="container-fluid">
        <div class="row-md-6">
           <h2>Student register form</h2>
            <section class="col-md-7">

           <form action="{{route('student.store')}}" method="post">

                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif

                  @csrf
                <div class="form-group">
                <label for="cne" class="form-label">CNE</label>
                <input type="text" id="cne" name="cne" class="form-control" placeholder="Enter cne">
                                
                </div>
                @error('cne')
                                <strong style="color:red">{{ $message }}</strong>
                                   
                                @enderror
                <div class="form-group">
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter firstname">
                               
                </div>
                @error('firstname')
                                   
                                        <strong style="color:red">{{ $message }}</strong>
                                   
                                @enderror
                <div class="form-group">
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter lastname">
                </div>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                <div class="form-group">
                <label for="age" class="form-label">AGE</label>
                <input type="text" id="age" name="age" class="form-control" placeholder="Enter age">
                </div>
                                @error('age')
                                <strong style="color:red">{{ $message }}</strong>
                                   
                                @enderror


                                <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Enter email">
                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                <div class="form-group">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter phone">
                </div>
                                @error('phone')
                                <strong style="color:red">{{ $message }}</strong>
                                   
                                @enderror
               
                <div class="form-group">
                <label for="speciality" class="form-label">Speciality</label>
                <input type="text" id="speciality" name="speciality" class="form-control" placeholder="Enter speciality">
                </div>
                @error('speciality')
                <strong style="color:red">{{ $message }}</strong>
                                   
                                @enderror
                
                <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="text" id="password" name="password" class="form-control" placeholder="Enter password">
                </div>
                @error('password')
                <strong style="color:red">{{ $message }}</strong>
                                   
                                @enderror
                
                <div class="form-group">

                <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <a  href="{{ route('student.login') }}"> Already have Account </a>
                            </div>
                        </div>
                <!-- <input type="submit" class="btn btn-primary" name="subbtn" value="Save">
                <input type="reset" class="btn btn-warning" name="resetbtn" value="Reset"> -->'
                 </div>
            </form>

            </section>
        </div>
        </div>
@endsection