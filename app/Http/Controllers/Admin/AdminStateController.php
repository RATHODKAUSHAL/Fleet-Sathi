<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StateMaster;
use Illuminate\Http\Request;

class AdminStateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd("hello");
        $states = StateMaster::get();
        return view('admin.states.index', compact("states"));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.states.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $State = new StateMaster();
        $State->state_name = $request->state_name;
        // $State->state_name_alias = $request->state_name_alias; 
        $State->state_abbreviation = $request->state_abbreviation; 
        $State->save();

        return redirect()->route('states.index');
    }

    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // dd('ss');
        
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
}
