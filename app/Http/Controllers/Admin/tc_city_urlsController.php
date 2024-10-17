<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CityMaster;
use App\Models\TcUrlMaster;
use Illuminate\Http\Request;

class tc_city_urlsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $TransportUrl = TcUrlMaster::get();
        return view('admin.tc-city-url.index', compact('TransportUrl'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $City = CityMaster::get();
        return view('admin.tc-city-url.create', [
            'City'=>$City
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $TransportUrl = new TcUrlMaster();
        $TransportUrl->city_id = $request->city_id; 
        $TransportUrl->company_icon = $request->company_icon; 
        $TransportUrl->page_title = $request->page_title; 
        $TransportUrl->meta_title = $request->meta_title; 
        $TransportUrl->meta_description = $request->meta_description; 
        $TransportUrl->transport_area = $request->transport_area; 
        $TransportUrl->is_popular = $request->is_popular; 
        $TransportUrl->content = $request->content; 
        $TransportUrl->city_heading = $request->city_heading; 
        $TransportUrl->city_image = $request->city_image; 
        $TransportUrl->city_content = $request->city_content; 
        $TransportUrl->save();
        return redirect()->route('admin.tc-city-url.index');
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
        $City = CityMaster::get();
        $TransportUrl = TcUrlMaster::find($id);
        return view('admin.tc-city-url.create', [
            'City'=>$City,
            'TransportUrl'=>$TransportUrl
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $TransportUrl = TcUrlMaster::find($id);
        if(!$TransportUrl){
            return redirect()->route('admin.tc-city-url.index')->with('error', "TransportUrl not found");
        }

        $request->validate([
            'city_heading' => 'required|string|max:255',
        ]);
        $TransportUrl->city_id = $request->city_id; 
        $TransportUrl->company_icon = $request->company_icon; 
        $TransportUrl->page_title = $request->page_title; 
        $TransportUrl->meta_title = $request->meta_title; 
        $TransportUrl->meta_description = $request->meta_description; 
        $TransportUrl->transport_area = $request->transport_area; 
        $TransportUrl->is_popular = $request->is_popular; 
        $TransportUrl->content = $request->content; 
        $TransportUrl->city_heading = $request->city_heading; 
        $TransportUrl->city_image = $request->city_image; 
        $TransportUrl->city_content = $request->city_content; 
        $TransportUrl->save();
        return redirect()->route('admin.tc-city-url.index')->with('success', 'TransportUrl Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        $TransportUrl =  TcUrlMaster::find($id);
        $TransportUrl->delete($request);
        return redirect()->route('admin.tc-city-url.index')->with('Transport Url deleted succesfully');
    }
}
