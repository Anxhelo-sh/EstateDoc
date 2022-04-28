@extends('layouts.app')

@section('content')
    <style>
        .pagination{
            float: right;
            margin-top: 10px;
        }
    </style>
    <div id="holder" class="container">
        <div class="row">
            @if(count($properties))
                <h1 style="padding:15px; padding-top:0px;">Click on the property you wish to see</h1>
            @endif
              @forelse($properties as $property)
                <div class="col-sm-3 mt-3">
                    <a href="{{route('properties.show',['property'=>$property->id])}}" style="text-decoration: none; cursor: pointer;">
                        <div class="thumbnail" style="background-color:white; box-shadow:2px 2px 2px lightgrey; min-height:390px;">
                            <img height="250px" src="{{asset('/storage/images/properties/'.$property->image)}}" class="card-img-top" alt="image-property">


                            <div  class="mt-1 card-body d-flex justify-content-between flex-column" style="height: 320px">
                                <div class="card-title">
                                    <b>{{ $property->category }}</b>
                                </div>
                                <div class="card-title">
                                    {{ $property->street_adress }}, {{ $property->city }}, {{ $property->state }}
                                </div>
                                <div class="card-title">
                                    {{ str_replace('_',' ',$property->type) }} , {{ str_replace('_',' ',$property->category) }}
                                </div>
                                <div class="card-title">
                                    {{ $property->number_of_rooms }} rooms, {{ $property->number_of_bathrooms }} bathrooms
                                    & {{ $property->has_garage }} parking spots
                                </div>
                                <div class="card-title">
                                    Start Date: {{ $property->start_date }}  <br>End Date : {{ $property->end_date }}

                                </div>
                                <div class="card-title">
                                    <b>${{ $property->price }} per month</b>

                                </div>
                                <div >
                                    <a class="btn btn-primary m-1" href="/reservations/create/{{$property->id}}}">Book Now </a>

                                </div>



                            </div>
                        </div>

                    </a>
                </div>
              @empty
                  <p>No Properties to display</p>
              @endforelse
          </div>
        {!! $properties->links() !!}



    </div>

@endsection
