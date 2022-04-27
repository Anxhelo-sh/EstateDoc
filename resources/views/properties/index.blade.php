@extends('layouts.app')

@section('content')
    <style>
        .pagination{
            float: right;
            margin-top: 10px;
        }
        .components{
            border: 1px solid white;
            border-radius: 5px;
            background: white;
            margin-top: 10px;
        }
        .field{
            margin: 10px;
        }
    </style>
    <div id="holder" class="container">

        <div class="row components">
            <form action="{{ route('properties.index') }}" method="GET">
                <div class="row field">
                    <div class="col-4 ">
                        <input type="date" class="form-control input-sm" id="start_date" name="start_date"  value="{{Request::get("start_date")}}">
                    </div>
                    <div class="col-4 ">

                        <input type="date" class="form-control input-sm" id="end_date" name="end_date" value="{{Request::get("end_date")}}">
                    </div>
                    <div class="col-2 ">
                        <input type="number" class="form-control input-sm" id="min_price" name="min_price" placeholder="{{ __('Min Price') }}" value="{{Request::get("min_price")}}">
                    </div>
                    <div class="col-2 ">
                        <input type="number" class="form-control input-sm" id="max_price" name="max_price" placeholder="{{ __('Max Price') }}" value="{{Request::get("max_price")}}">

                    </div>
                </div>
                <div class="row field flex justify-content-between">
                    <div class="col-4">
                        <input type="text" class="form-control input-sm" id="location" name="location" placeholder="{{ __('Location') }}" >

                    </div>
                    <div class="col-2 ">
                        <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>

                    </div>
                </div>



            </form>

        </div>
        <div class="row components">
            @if(count($properties))
                <h1 style="padding:15px; padding-top:0px;">Click on the property you wish to see</h1>
            @else
                <h1 style="padding:15px; padding-top:0px;">There are no properties for you to edit. Click
                    <a href="/properties/create" style="text-decoration:none;">
                        here
                    </a>
                    to add a propery.
                </h1>
            @endif
            @foreach($properties as $property)
                <div class="col-sm-3 mt-3">
                    <a href="{{route('properties.show',['property'=>$property->id])}}" style="text-decoration: none; cursor: pointer;">
                        <div class="thumbnail" style="background-color:white; box-shadow:2px 2px 2px lightgrey; min-height:390px;">
                            <img height="200px" src="{{asset('/storage/images/properties/'.$property->image)}}" class="card-img-top" alt="image-property">


                            <div class="mt-2 ">
                                <div>
                                    <b>{{ $property->category }}</b>
                                </div>
                                <div>
                                    {{ $property->street_adress }}, {{ $property->city }}, {{ $property->state }}
                                </div>

                                <div >
                                    {{ $property->number_of_rooms }} rooms, {{ $property->number_of_bathrooms }} bathrooms
                                    & {{ $property->has_garage }} parking spots
                                </div>
                                <div >
                                    Start Date: {{ $property->start_date }}  <br>End Date : {{ $property->end_date }}

                                </div>
                                <div >
                                    <b>${{ $property->price }} per month</b>

                                </div>


                            </div>
                        </div>


                    </a>

                </div>
            @endforeach

        </div>
        {!! $properties->links() !!}


    </div>
        </div>





@endsection
