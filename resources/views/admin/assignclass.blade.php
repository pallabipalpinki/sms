@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Assign New Class') }}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('admin.addclass') }}">
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

                         <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>

                            <div class="col-md-6">
                                <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}"   autofocus>

                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        <select class="form-control" name="teacher" id="teacher">
   
                        <option value=" ">Select teacher</option>
                            
                        @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->firstname }} {{ $teacher->lastname }}</option>
                        @endforeach
                        </select>

                       
                        <div class="form-group row">
                            <label for="student" class="col-md-4 col-form-label text-md-right">{{ __('Select Student for class') }}</label>
                            @foreach ($students as $student)
                            <!-- <div class="col-md-9">
                                <input id="studentfield" name="dynamic[$student->id]" value="{{ $student->firstname }}" class="form-control field" type="text">
                            </div>  -->
                            <div class="col-md-3">
                                <div class="student">
                                <label for="{{$student->id}}"><input type="checkbox" id="student" value="{{ $student->id }}" name="student[]"  @if($student->finished == 1) checked @endif/>
                                   {{ $student->firstname }} {{ $student->lastname }} </label>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group row">
                            <label for="cdate" class="col-md-4 col-form-label text-md-right">{{ __('Class date') }}</label>

                            <div class="col-md-6">
                                <input id="cdate" type="date" class="form-control @error('cdate') is-invalid @enderror" name="cdate" value="{{ old('cdate') }}"  autocomplete="cdate" autofocus>

                                @error('cdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="starttime" class="col-md-4 col-form-label text-md-right">{{ __('Starting Time') }}</label>

                            <div class="col-md-6">
                                <input id="starttime" type="time" class="form-control @error('starttime') is-invalid @enderror" name="starttime" value="{{ old('starttime') }}"  autocomplete="starttime" autofocus>

                                @error('starttime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="endtime" class="col-md-4 col-form-label text-md-right">{{ __('Ending Time') }}</label>

                            <div class="col-md-6">
                                <input id="endtime" type="time" class="form-control @error('endtime') is-invalid @enderror" name="endtime" value="{{ old('endtime') }}"  autocomplete="endtime" autofocus>

                                @error('endtime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('add') }}
                                </button>

                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
