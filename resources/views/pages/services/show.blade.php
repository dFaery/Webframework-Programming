@extends('layouts.adminlte4')
@section('title')
<title>Service</title>
@endsection
@section('content')
<div class="container"> 
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://static.vecteezy.com/system/resources/thumbnails/026/375/249/small/ai-generative-portrait-of-confident-male-doctor-in-white-coat-and-stethoscope-standing-with-arms-crossed-and-looking-at-camera-photo.jpg" alt="Card image cap">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title"><b>{{ $service->name }}</b></h5>
            <p class="card-text">{{ $service->description }}</p>
            <p class="card-text">Available at: {{ $service->availability }}</p>
            <div class="container p-0">
                <p class="badge badge-primary text-light">{{ $service->category->name }}</p>
                <small>Rp{{ $service->price }}</small>
            </div>
            
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
    </div>
</div>
@endsection