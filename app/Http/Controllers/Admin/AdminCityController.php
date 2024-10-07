<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CityMaster;
use App\Models\StateMaster;
use Illuminate\Http\Request;

class AdminCityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cities = CityMaster::get();
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = StateMaster::get();
        return view('admin.cities.create',[
            'states' => $states
        ]);
        // return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $cities = new CityMaster();
        $cities->city_name = $request->city_name;
        $cities->state_id = $request->state_id;
        $cities->save();

        return redirect()->route('admin.cities.index');
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
        $cities = CityMaster::findOrFail($id);
        $states = StateMaster::get();

        return view('admin.cities.create',[
            'cities' => $cities,
            'states' => $states

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Find the city by id
    $cities = CityMaster::find($id);
    
    if (!$cities) {
        return redirect()->route('admin.cities.index')->with('error', 'City not found.');
    }

    // Validate the request
    $request->validate([
        'city_name' => 'required|string|max:255',
        'state_id' => 'required|exists:state_master,id', // Validate the state_id
    ]);

    // Update city details
    $cities->city_name = $request->city_name;
    $cities->state_id = $request->state_id; // Update the state_id
    $cities->save();

    return redirect()->route('admin.cities.index')->with('success', 'City updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        //
        $cities = CityMaster::find($id);
        $cities->delete($request->all());
        return redirect()->route('admin.cities.index')->with("vehicle deleted successfully");

    }

    public function search(Request $request) {
        $cities = $this->search($request);

        $param = [];
        foreach($cities as $key => $value){
            $param[$key]['id'] = $value['id'];
            $param[$key]['text'] =  $value->city_name ;
        }
        $results['results'] =  $param;
        return $results;

    }
    public function findCity(Request $request)
    {
        $City = CityMaster::findCity($request);

        if (empty($City)) {
            return response()->json([
                'success' => false,
            ]);
        }
        return response()->json([
            'success' => true,
            'state' => $City->toArray()
        ]);
    }
}
