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
        $states = new StateMaster();
        $states->state_name = $request->state_name;
        // $State->state_name_alias = $request->state_name_alias; 
        $states->state_abbreviation = $request->state_abbreviation; 
        $states->save();

        return redirect()->route('admin.states.index');
    }

    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        // dd('ss');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $states = StateMaster::findOrFail($id);
        return view('admin.states.create',[
            'states' => $states,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $states = StateMaster::find($id);
    
    if (!$states) {
        return redirect()->route('admin.states.index')->with('error', 'State not found.');
    }

    $request->validate([
        'state_name' => 'required|string|max:255',
        'state_abbreviation' => 'required|string|max:10',
    ]);

    $states->state_name = $request->state_name;
    $states->state_abbreviation = $request->state_abbreviation;
    $states->save();

    return redirect()->route('admin.states.index')->with('success', 'State updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        // Find the state by its ID
        // $states = StateMaster::find($id);
        //     if (!$states) {
        //     return redirect()->route('states.index')->with('error', 'State not found.');
        // }
        // try {
        //     $states->delete($id);
        //     return redirect()->route('states.index')->with('success', 'State deleted successfully.');
        // } catch (\Exception $e) {
        //     return redirect()->route('states.index')->with('error', 'Failed to delete the state. Please try again.');
        // }

        $states = StateMaster::find($id);
        $states->delete($request->all());
        return redirect()->route('admin.states.index')->with("vehicle deleted successfully");
    }

    public function search(Request $request) {
        $states = $this->search($request);

        $param = [];
        foreach($states as $key => $value){
            $param[$key]['id'] = $value['id'];
            $param[$key]['text'] =  $value->state_name ;
        }
        $results['results'] =  $param;
        return $results;

    }

    public function findState(Request $request)
    {
        $state = StateMaster::findState($request);

        if (empty($state)) {
            return response()->json([
                'success' => false,
            ]);
        }
        return response()->json([
            'success' => true,
            'state' => $state->toArray()
        ]);
    }
    
}
