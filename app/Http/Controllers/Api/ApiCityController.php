<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CityMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiCityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cities = CityMaster::all();
        if($cities -> count() > 0 ){
            return response()->json([
                'status' => 200,
                'cities' => $cities
            ],200);
        }else{
            return  response()->json([
                'status' => 404,
                'message' => 'No City Data Found'
            ],404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $cities = CityMaster::find($id);
        if($cities){
            return response()->json([
                'status' => 200,
                'cities' => $cities
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'error' => 'NO Such Data Found'
            ]);  
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[

        ]);
        if($validator -> fails()){
            return  response()->json([
                'status' => 422,
                'error' => $validator->errors()
            ]);
        }else{
            $cities = CityMaster::create([
                'city_name' =>  $request->city_name,
                'state_id' =>  $request->state_id,
            ]);
        }

        if($cities){
            return  response()->json([
                'status' => 200,
                'message' => 'City Created Succesfully'
                ]);
        }else{
            return  response()->json([
                'status' => 500,
                'error' => 'Failed to Create City'
            ]);
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $cities = CityMaster::find($id);
        if($cities){
            return  response()->json([
                'status' => 200,
                'data' => $cities
                ],200);
        }else{
            return  response()->json([
                'status' => 404,
                'error' => 'City Not Found'
                ],404);
            }
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [

        ]);
        if($validator->fails()){
            return   response()->json([
                'status' =>  422,
                'error' => $validator->errors()
                ],422);
        }else{
            $cities = CityMaster::find($id);
            if($cities){
                $cities->update([
                    'city_name' => $request->city_name,
                    'state_id' => $request->state_id
                ]);
                return  response()->json([
                    'status' => 200,
                    'message' =>  'City Updated Successfully'
                    ],200);
            }else{
                return  response()->json([
                    'status' => 404,
                    'error' => 'City Not Found'
                    ],404);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $city = CityMaster::find($id);
        if($city){
            $city->delete();
            DB::statement('ALTER TABLE city_master AUTO_INCREMENT = 1');
            return  response()->json([
                'status' => 200,
                'message' => 'city Deleted Successfully'
                ],200);
        }else{
            return  response()->json([
                'status' => 404,
                'error' => 'City Not Found'
                ],404);
        }
    }
}
