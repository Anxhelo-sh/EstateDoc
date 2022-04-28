<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\User;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request ,Property $properties)
    {
        $start_date = $request->input('start_date') ;
        $end_date = $request->input('end_date') ;
        $min_price = $request->input('min_price') ;
        $max_price = $request->input('max_price') ;
        $location = $request->input('location') ;
        $properties = Property::query() ;

        if($start_date){
            $properties->where('start_date','>=' , $start_date) ;
        }
        if($end_date){
            $properties->where('end_date','<=' , $end_date) ;
        }
        if($min_price){
           $properties->where('price','>=' , $min_price) ;

        }
        if($max_price){
          $properties->where('price','<=' , $max_price) ;
        }

        if($location){
         $properties->where('state','LIKE' ,'%'. $location.'%') ;
        }


        //
        return view('properties.index', ['properties' => $properties->paginate(10)->withQueryString()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('properties.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePropertyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyRequest $request)
    {
        if($request->hasFile('image')){
            $destination_path = 'public/images/properties' ;
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName() ;
            $path = $request->file('image')->storeAs($destination_path , $image_name) ;
        }
        //store the submited property
        Property::create(
            [
                'price' => $request->price ,
                'category' => $request->category ,
                'type' => $request->type ,
                'street_adress' => $request->street_adress ,
                'city' => $request->city ,
                'state' => $request->state ,
                'start_date' => $request->start_date ,
                'end_date' => $request->end_date ,
                'number_of_rooms' => $request->number_of_rooms ,
                'number_of_bathrooms' => $request->number_of_bathrooms ,
                'has_garden' => !isset($request->has_garden) ? 0 : 1,
                'has_pool' => !isset($request->has_pool) ? 0 : 1 ,
                'has_garage' => !isset($request->has_garage) ? 0 : 1 ,
                'has_furnitures' =>  !isset($request->has_furnitures) ? 0 : 1 ,
                'status' =>  !isset($request->status) ? 0 : 1 ,
                'image' => $image_name ,
                'user_id' =>  $request->user()->id ,
            ]
        );
        return redirect()->route('properties.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //


        return view('properties.show' , ['property' => $property]) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
        return view('properties.edit', ['property' => $property]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyRequest  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        //
        if($request->hasFile('image')){
            $destination_path = 'public/images/properties' ;
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName() ;
            $path = $request->file('image')->storeAs($destination_path , $image_name) ;
        }

        $property->price = $request->price ;
        $property->category = $request->category ;
        $property->type = $request->type ;
        $property->street_adress = $request->street_adress ;
        $property->city = $request->city ;
        $property->state = $request->state ;
        $property->number_of_rooms = $request->number_of_rooms ;
        $property->number_of_bathrooms = $request->number_of_bathrooms ;
        $property->has_garden = $request->has_garden ;
        $property->has_pool = $request->has_pool ;
        $property->has_garage = $request->has_garage ;
        $property->has_furnitures = $request->has_furnitures ;
        $property->status = $request->status ;
        $property->start_date = $request->start_date ;
        $property->end_date = $request->end_date ;
        $property->image = $image_name ;
        $property->save() ;

        return redirect()->route('properties.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
        $property->delete() ;
        return redirect()->route('properties.index');

    }
    public function getPropertyByUser() {


        return view('properties.properties' , ['properties'=>request()->user()->properties()->paginate(5)->withQueryString()]) ;
    }
}
