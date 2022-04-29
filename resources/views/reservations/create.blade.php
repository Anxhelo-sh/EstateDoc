@extends('layouts.app')

@section('content')
    <div class="container card">
        <form action="{{ route('reservations.store',['property'=>$property]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">{{ __('Add Reservation') }}</div>

            <div class="card-body">


                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">

                        <label for="start_date">{{ __('Start Date') }}</label>
                    </div>
                    <div class="col-md-6">

                        <input type="date" class="form-control input-sm" id="start_date" name="start_date"  value="{{ old('start_date') }}">
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
                        <label for="no_of_persons">{{ __('Number of Persons') }}</label>
                    </div>
                    <div class="col-md-6">

                        <select class="form-select" id="no_of_persons" name="no_of_persons" aria-label="Choose number of Persons">
                            <option selected>{{ __('Select number of persons') }}</option>
                            <option value="1" {{ old('no_of_persons') == 1 ? 'selected' : '' }}>1</option>
                            <option value="2"  {{ old('no_of_persons') == 2 ? 'selected' : '' }}>2</option>
                            <option value="3"  {{ old('no_of_persons') == 3 ? 'selected' : '' }}>3</option>
                            <option value="4"  {{ old('no_of_persons') == 4 ? 'selected' : '' }}>4</option>
                            <option value="5"  {{ old('no_of_persons') == 5 ? 'selected' : '' }}>5</option>
                            <option value="6"  {{ old('no_of_persons') == 6 ? 'selected' : '' }}>6</option>
                            <option value="7"  {{ old('no_of_persons') == 7 ? 'selected' : '' }}>7</option>
                            <option value="8"  {{ old('no_of_persons') == 8 ? 'selected' : '' }}>8</option>
                            <option value="9"  {{ old('no_of_persons') == 9 ? 'selected' : '' }}>9</option>
                            <option value="10"  {{ old('no_of_persons') == 10 ? 'selected' : '' }}>10</option>
                            <option value="11"  {{ old('no_of_persons') == 11 ? 'selected' : '' }}>11</option>
                            <option value="12"  {{ old('no_of_persons') == 12 ? 'selected' : '' }}>12</option>
                            <option value="13"  {{ old('no_of_persons') == 13 ? 'selected' : '' }}>13</option>
                            <option value="14"  {{ old('no_of_persons') == 14 ? 'selected' : '' }}>14</option>
                            <option value="15"  {{ old('no_of_persons') == 15 ? 'selected' : '' }}>15</option>
                        </select>
                        <p style="color: red">
                            @error('no_of_persons')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>

                <div class="row justify-content-center mb-3">

                    <div class="col-md-2">
                        <label for="full_name">{{ __('Full Name') }}</label>
                    </div>
                    <div class="col-md-6">

                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}" placeholder="{{ __('Full Name') }}" >

                        <p style="color: red">
                            @error('full_name')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">

                    <div class="col-md-2">
                        <label for="full_name">{{ __('Email') }}</label>
                    </div>
                    <div class="col-md-6">

                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" >

                        <p style="color: red">
                            @error('email')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                </div>




                <div class="row justify-content-center mb-3">
                    <div class="col-md-8 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
