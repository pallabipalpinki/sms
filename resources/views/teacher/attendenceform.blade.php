@extends('home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Attendence Form') }}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('teacher.saveattendence') }}">
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
                         

                            <div class="col-md-6">
                                <input id="teacher_id" type="text" class="form-control @error('teacher_id') is-invalid @enderror" name="teacher_id" value="{{ Auth::guard('student')->user()->id }}"  autocomplete="teacher_id" hidden>

                                <!-- @error('teacher_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>
                        <select class="form-control" name="class_id" id="class_id">
   
                        <option value=" ">Select class</option>
                            
                        @foreach ($class as $classlist)
                        <option value="{{ $classlist->id }}">{{ $classlist->subject }}-{{ $classlist->starttime }} </option>
                        @endforeach
                        </select>
                        @error('class_id')
                       
                <strong style="color:red">{{ $message }}</strong>
                                   
                                @enderror
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('submit') }}
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
