<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Models\Property;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use GuzzleHttp\Psr7\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Property $property)
    {

        //
        return view('reservations.create', ['property' => $property]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request , Reservation $reservation)
    {
        $start_date = $request->start_date ;
        $end_date = $request->end_date ;
        $user_id=$request->user()->id ;
        $property_id =$request->property ;

        $already_rented = Reservation::whereBetween('start_date', [
            $start_date, $end_date
        ])->whereBetween('end_date', [
            $start_date, $end_date
        ])->where('property_id', '=' ,$property_id )->exists();
        if($already_rented){
            return back()
                ->withInput()
                ->withErrors([
                    'start_date' => 'Property is already rented on these days '
                ]);
        }
        else{

            Reservation::create(
                [
                    'start_date'=>$start_date ,
                    'end_date' =>$end_date ,
                    'full_name'=>$request->full_name ,
                    'email'=>$request->email ,
                    'no_of_persons'=>$request->no_of_persons,
                    'user_id' =>  $user_id ,
                    'property_id' => $property_id ,

                ]
            );
            return redirect()->route('properties.index');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationRequest  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
