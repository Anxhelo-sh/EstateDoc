@extends('layouts.app')

@section('content')

    <div class="container  ">
            <div class="card d-flex justify-content-between flex-row" style="background-color:white ; max-height: 80vh ;">
                <div >
                    <img height="100%" src="{{asset('/storage/images/properties/'.$property->image)}}" class="card-img-top " alt="image-property">

                </div>
                <div class="container">
                    <div class="row" >
                        <div class=" m-2 " >
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
                    <div class="row m-1">
                        <div class="d-flex flex-row justify-content-start ">
                            <div >

                                @cannot('host')
                                    @cannot('simple_user')

                                    @auth
                                        <a class="btn btn-primary m-1" href="{{route('properties.edit',['property'=>$property->id])}}">Update</a>
                                    @endauth
                                    @endcannot
                                    @endcannot

                            </div>
                            <div>
                                <form action="" method="post">
                                    @method('delete')
                                    @csrf


                                    @cannot('host')
                                        @cannot('simple_user')
                                        @auth

                                        <button  class="btn btn-danger m-1">Delete</button>
                                        @endauth
                                            @endcannot
                                        @endcannot
                                </form>
                            </div>
                            <div >
                                @cannot('host_user')
                                    <a class="btn btn-primary m-1" href="/reservations/create/{{$property->id}}}">Book Now </a>

                                @endcannot


                            </div>

                        </div>
                    </div>
                </div>

            </div>

    </div>

    @can('add_review',$property)
        <div class="container  mt-2">

            <form action="{{ route('reviews.store',['property'=>$property]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center mt-4 mb-2">
                    <div class="col-md-2">

                        <label for="review_score">{{ __('Review score ') }}</label>
                    </div>
                    <div class="col-md-6">

                        <select class="form-select" id="review_score" name="review_score" aria-label="How many starts do you give us ">
                            <option selected>{{ __('How many starts do you give us') }}</option>
                            <option value="1" {{ old('review_score') == 1 ? 'selected' : '' }}>1</option>
                            <option value="2"  {{ old('review_score') == 2 ? 'selected' : '' }}>2</option>
                            <option value="3"  {{ old('review_score') == 3 ? 'selected' : '' }}>3</option>
                            <option value="4"  {{ old('review_score') == 4 ? 'selected' : '' }}>4</option>
                            <option value="5"  {{ old('review_score') == 5 ? 'selected' : '' }}>5</option>
                        </select>
                        <p style="color: red">
                            @error('review_score')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">

                        <label for="status">{{ __('Message') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control input-sm" id="message" name="message" value="{{ old('message') }}">


                        <p style="color: red">
                            @error('message')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-md-8 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
                    </div>
                </div>
            </form>
        </div>
        @endcan




    <h2 class="text-center mt-2" style="color: black ">Reviews</h2>

    @forelse($property->reviews as $review)
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <div class="container">


            <div class="card mt-1">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                            <p class="text-secondary text-center">    </p>
                        </div>
                        <div class="col-md-10">

                                <a class="float-left"  ><strong>{{ $review->user->name }}   </strong></a>
                                    @if($review->review_score >=0 && $review->review_score <=1)
                                   <p>{{$review->review_score}}</p>
                                   @elseif($review->review_score >=1 && $review->review_score <=2 )
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    @elseif($review->review_score >=2 && $review->review_score <=3 )
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    @elseif($review->review_score >=3 && $review->review_score <=4)
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                      @else
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                            @endif

                            <div class="clearfix"></div>
                            <p style="color: black">{{ $review->message}}</p>
                            <p>
                                <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
                                <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    @empty
        <p style="color: red" class="container">There are no reviews to display</p>
    @endforelse



@endsection
