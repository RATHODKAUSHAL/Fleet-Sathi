<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CityMaster;
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
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $cities = new CityMaster();
        $cities->city_name = $request->city_name;
        $cities->state_name = $request->state_name;
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request) {
        $cities = $this->search($request);

        $param = [];
        foreach($cities as $key => $value){
            $param[$key]['id'] = $value['id'];
            $param[$key]['text'] =  $value->city_full_name ;
        }
        $results['results'] =  $param;
        return $results;

    }
}
