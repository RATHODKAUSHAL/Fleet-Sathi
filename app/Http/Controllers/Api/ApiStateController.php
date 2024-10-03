<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StateMaster;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiStateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = StateMaster::all();
        //in this APiTesting name is from model 
        if($states-> count() > 0){
            return response() -> json([
                'status' => 200,
                'states' => $states
            ], 200);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'No states data Found'
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $states = StateMaster::find($id);
        if($states){
            return response()->json([   
                'status' => 200,
                'Student' => $states
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No Such data Found' 
            ],404);
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

        if($validator->fails()){
            return response()->json([
               'status' => 422,
               'errors' => $validator->messages()
            ],422);   
           }else{
            $states = StateMaster::create([
                'state_name'=> $request->state_name,
                'state_abbreviation' => $request->state_abbreviation
            ]);

            if($states){
                return response()->json([
                    'status' => 200,
                    'message' => 'Customer Created Successfully'
                ],200);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Data not responding'
                ],500);
            }
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
        $states = StateMaster::find($id);
        if($states){
            return response()->json([
                'status'=> 200,
                'states' => '$states'
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No Such Status Found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(),[

        ]);

        if($validator->fails()){
            return response()->json()([
                'status' => 422,
                'error' => $validator->messages()
            ],422);
        }else{
            $states = StateMaster::find($id);

            if($states){
                $states->update([
                    'state_name' => $request->state_name,
                    'state_abbreviation' => $request->State_abbreviation
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => 'states Upadted succesfully' 
                ],200);
            }else{
                return response()->json([
                    'status' => 404,
                    'mesasage' => 'No Such Data Found'
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
        $state = StateMaster::find($id);
        if($state){
            $state->delete();
            DB::statement('ALTER TABLE states AUTO_INCREMENT = 1');
            return response()->json([
                'status' => 200,
                'message' => 'State Deleted Succesfully'
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'error' => "No Such State Found"
            ],404);
        }
    }
}
