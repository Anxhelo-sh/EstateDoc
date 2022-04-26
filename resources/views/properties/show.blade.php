@extends('layouts.app')

@section('content')

    <div id="holder" class="container">
        <div class="row">
            <div class="card bg-dark text-white">
                <img height="800vh" src="{{asset('/storage/images/properties/'.$property->image)}}" class="card-img-top" alt="image-property">

                <div class="card-img-overlay">
                    <h5 class="card-title">{{ $property->category }}</h5>
                    <h5 class="card-title">{{ $property->street_adress }}</h5>
                    <h5 class="card-title">{{ $property->city }}</h5>
                    <h5 class="card-title">{{ $property->state }}</h5>

                    <p class="card-text">
                        {{ $property->number_of_rooms }} rooms, {{ $property->number_of_bathrooms }} bathrooms
                        & {{ $property->has_garage }} parking spots
                    </p>
                    <h5 class="card-title">${{ $property->price }} per month</h5>
                    <a class="btn btn-primary" href="{{route('properties.edit',['property'=>$property->id])}}">Update</a>
                    <form action="" method="post">
                        @method('delete')
                        @csrf


                        <button  class="btn btn-danger">Delete</button>
                    </form>





                </div>
            </div>



        </div>
    </div>

@endsection
