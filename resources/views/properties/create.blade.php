@extends('layouts.app')

@section('content')
    <div class="container card">
        <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">{{ __('Create Property') }}</div>

            <div class="card-body">
                <div class="row justify-content-center mb-3">

                    <div class="col-md-2">
                        <label for="category">{{ __('Property Category') }}</label>
                    </div>
                    <div class="col-md-6">


                        <select class="form-select" id="category" name="category"  aria-label="Property category">
                            <option disabled selected >Choose a category for the property</option>
                            <option value="house" {{ old('category') == 'house' ? 'selected' : '' }}>House</option>
                            <option value="appartment" {{ old('category') == 'appartment' ? 'selected' : '' }}>Appartment</option>
                            <option value="storage_unit" {{ old('category') == 'storage_unit' ? 'selected' : '' }}>Storage unit</option>
                            <option value="office" {{ old('category') == 'office' ? 'selected' : '' }}>Office</option>
                            <option value="land" {{ old('category') == 'land' ? 'selected' : '' }}>Land</option>
                        </select>
                        <p style="color: red">
                            @error('category')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>

                <div class="row justify-content-center mb-3">

                    <div class="col-md-2">
                        <label for="type">{{ __('Property Type') }}</label>
                    </div>
                    <div class="col-md-6">

                        <select class="form-select" id="type" name="type"  aria-label="Property Type">
                            <option disabled selected>Choose a type for the property</option>
                            <option value="single_family_home" {{ old('type') == 'single_family_home' ? 'selected' : '' }} >Single-Family Home</option>
                            <option value="townhome" {{ old('type') == 'townhome' ? 'selected' : '' }}>Townhome</option>
                            <option value="condos" {{ old('type') == 'condos' ? 'selected' : '' }}> Condos</option>
                            <option value="victorian" {{ old('type') == 'victorian' ? 'selected' : '' }}>Victorian</option>
                            <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <p style="color: red">
                            @error('type')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">

                    <div class="col-md-2">
                        <label for="price">{{ __('Price') }}</label>
                    </div>
                    <div class="col-md-6">

                        <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}"  placeholder="{{ __('Price') }}" >
                        <p style="color: red">
                            @error('price')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">

                    <div class="col-md-2">
                        <label for="street_adress">{{ __('Property Street Adress') }}</label>
                    </div>
                    <div class="col-md-6">

                        <input type="text" class="form-control" id="street_adress" name="street_adress" value="{{ old('street_adress') }}" placeholder="{{ __('Property Street Adress') }}" >
                        <p style="color: red">
                            @error('street_adress')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">

                    <div class="col-md-2">
                        <label for="city">{{ __('Property City') }}</label>
                    </div>
                    <div class="col-md-6">

                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" placeholder="{{ __('Property City') }}" >

                        <p style="color: red">
                            @error('city')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">


                    <div class="col-md-2">
                        <label for="state">{{ __('Property State') }}</label>
                    </div>
                    <div class="col-md-6">

                        <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}" placeholder="{{ __('Property State') }}" >
                        <p style="color: red">
                            @error('state')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">

                    <div class="col-md-2">
                        <label for="number_of_rooms">{{ __('Number of Rooms') }}</label>
                    </div>
                    <div class="col-md-6">

                        <select class="form-select" id="number_of_rooms" name="number_of_rooms" aria-label="Choose number of rooms">
                            <option selected>{{ __('Select number of rooms') }}</option>
                            <option value="1" {{ old('number_of_rooms') == 1 ? 'selected' : '' }}>1</option>
                            <option value="2"  {{ old('number_of_rooms') == 2 ? 'selected' : '' }}>2</option>
                            <option value="3"  {{ old('number_of_rooms') == 3 ? 'selected' : '' }}>3</option>
                            <option value="4"  {{ old('number_of_rooms') == 4 ? 'selected' : '' }}>4</option>
                            <option value="5"  {{ old('number_of_rooms') == 5 ? 'selected' : '' }}>5</option>
                            <option value="6"  {{ old('number_of_rooms') == 6 ? 'selected' : '' }}>6</option>
                            <option value="7"  {{ old('number_of_rooms') == 7 ? 'selected' : '' }}>7</option>
                        </select>
                        <p style="color: red">
                            @error('number_of_rooms')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>

                <div class="row justify-content-center mb-3">

                    <div class="col-md-2">
                        <label for="number_of_bathrooms">{{ __('Number Of Bathrooms') }}</label>
                    </div>
                    <div class="col-md-6">

                        <select class="form-select" id="number_of_bathrooms" name="number_of_bathrooms" aria-label="Choose number of bathrooms">
                            <option selected>{{ __('Select number of bathrooms') }}</option>
                            <option value="1"  {{ old('number_of_bathrooms') == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('number_of_bathrooms') == 2 ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('number_of_bathrooms') == 3 ? 'selected' : '' }}>3</option>
                            <option value="4" {{ old('number_of_bathrooms') == 4 ? 'selected' : '' }}>4</option>
                            <option value="5" {{ old('number_of_bathrooms') == 5 ? 'selected' : '' }}>5</option>
                            <option value="6" {{ old('number_of_bathrooms') == 6 ? 'selected' : '' }}>6</option>
                        </select>
                        <p style="color: red">
                            @error('number_of_bathrooms')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">


                    <div class="col-md-2">
                        <label for="has_garden">{{ __('Has Garden') }}</label>
                    </div>
                    <div class="col-md-6">

                        <input type="checkbox" id="has_garden" name="has_garden" value="1" {{old('has_garden') ==1 ? 'checked' : ''}}  >
                        <p style="color: red">
                            @error('has_garden')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">


                    <div class="col-md-2">
                        <label for="has_pool">{{ __('Has Pool') }}</label>
                    </div>
                    <div class="col-md-6">

                        <input type="checkbox" id="has_pool" name="has_pool" value="1" {{old('has_pool') ==1 ? 'checked' : ''}}  >
                        <p style="color: red">
                            @error('has_pool')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">

                    <div class="col-md-2">
                        <label for="has_garage">{{ __('Has Garage') }}</label>
                    </div>
                    <div class="col-md-6">

                        <input type="checkbox" id="has_garage" name="has_garage" value="1" {{old('has_garage') ==1 ? 'checked' : ''}}  >
                        <p style="color: red">
                            @error('has_garage')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">


                        <label for="has_furnitures">{{ __('Has Furnitures') }}</label>
                    </div>
                    <div class="col-md-6">

                        <input type="checkbox" id="has_furnitures" name="has_furnitures" value="1" {{old('has_furnitures') ==1 ? 'checked' : ''}}  >
                        <p style="color: red">
                            @error('has_furnitures')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">

                        <label for="status">{{ __('Is Rented') }}</label>
                    </div>
                    <div class="col-md-6">

                        <input type="checkbox" id="status" name="status" value="1" {{old('status') ==1 ? 'checked' : ''}}  >
                        <p style="color: red">
                            @error('status')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">

                        <label for="status">{{ __('Start Date') }}</label>
                    </div>
                    <div class="col-md-6">

                        <input type="date" class="form-control input-sm" id="start_date" name="start_date" value="{{ old('start_date') }}">
                        <p style="color: red">
                            @error('start_date')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">

                        <label for="status">{{ __('End Date') }}</label>
                    </div>
                    <div class="col-md-6">

                        <input type="date" class="form-control input-sm" id="end_date" name="end_date" value="{{ old('end_date') }}">
                        <p style="color: red">
                            @error('end_date')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">

                    <div class="col-md-2">
                        <label for="image">{{ __('Image') }}</label>
                    </div>
                    <div class="col-md-6">



                        <label class="form-label" for="image">{{ __('Image') }}</label>
                        <input type="file" class="form-control"   id="image" name="image" />
                        <p style="color: red">
                            @error('image')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>



                <div class="row justify-content-center mb-3">
                    <div class="col-md-8 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">{{ __('Create Property') }}</button>
                    </div>
                </div>
            </div>
        </form>











    </div>
@endsection
