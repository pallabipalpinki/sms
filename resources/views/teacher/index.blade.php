@extends('home')
@section('content')


<div class="container-fluid">
        <div class="row">
        <section class="col-md-6">
            <div class="card">
            <img src="{{url('/images/images2.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
           
            </div>


        </section>
        <section class="col-md-6">
            <div class="card mb-3">
                <img src="{{url('/images/images1.jpg')}}" class="card-img-top" alt="image">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
    


        </section>
        </div>
        </div>

@endsection