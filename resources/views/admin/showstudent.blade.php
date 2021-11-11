
<div class="container-fluid">
        <div class="row">
            <section class="col">@include('admin.studentslist');</section>
            <section class="col">
            <form action="{{url('admin/student-update/'.$student->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="cne" class="form-label">CNE</label>
                    <input type="text" id="cne" name="cne" class="form-control" value="{{$student->cne}}" placeholder="Enter cne">
                </div>
                @error('cne')
                                <strong style="color:red">{{ $message }}</strong>
                                   
                                @enderror
                <div class="form-group">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" value="{{$student->firstname}}" placeholder="Enter firstname">
                </div>
                @error('firstname')
                                   
                                   <strong style="color:red">{{ $message }}</strong>
                              
                           @enderror
                <div class="form-group">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" value="{{$student->lastname}}" placeholder="Enter lastname">
                </div>
                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <div class="form-group">
                    <label for="email" class="form-label">email</label>
                    <input type="text" id="email" name="email" class="form-control" value="{{$student->email}}" placeholder="Enter email">
                </div>
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <div class="form-group">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{$student->phone}}" placeholder="Enter phone">
                </div>
                @error('phone')
                                <strong style="color:red">{{ $message }}</strong>
                                   
                                @enderror
                <div class="form-group">
                    <label for="age" class="form-label">AGE</label>
                    <input type="text" id="age" name="age" class="form-control" value="{{$student->age}}" placeholder="Enter age">
                </div>
                @error('age')
                                <strong style="color:red">{{ $message }}</strong>
                                   
                                @enderror
                <div class="form-group">
                    <label for="speciality" class="form-label">Speciality</label>
                    <input type="text" id="speciality" name="speciality" class="form-control" value="{{$student->speciality}}" placeholder="Enter speciality">
                </div>
                @error('speciality')
                <strong style="color:red">{{ $message }}</strong>
                                   
                                @enderror
                <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="text" id="password" name="password" class="form-control" value="{{$student->password}}" placeholder="Enter password">
                </div>
                @error('password')
                <strong style="color:red">{{ $message }}</strong>
                                   
                                @enderror
                <div class="form-group">
                <input type="submit" class="btn btn-primary" name="updatebtn" value="Update">
                <!-- <input type="reset" class="btn btn-warning" name="resetbtn" value="Reset"> -->
                 </div>
            </form>

            </section>
        </div>
</div>