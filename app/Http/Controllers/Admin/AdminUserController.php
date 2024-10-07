<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::all();
        return view('admin.users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = User::get();
        return view('admin.users.create', [
            'user' =>  $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = new  User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->contact_number = $request->contact_number;
        $user->save();
        return redirect()->route('admin.users.index');

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
            $users = User::findOrFail($id);
            return view('admin.users.create',[
                'users' => $users,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $users = User::find($id);

        if(!$users) {
            return redirect()->route('admin.users.index')->with('error', 'User not found.');
        }

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' =>  'required|string|max:255',
            'email' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255'
        ]);

        $users->first_name = $request->first_name;
        $users->last_name = $request->last_name;
        $users->email = $request->email;
        $users->contact_number = $request->contact_number;
        $users->save();

        return redirect()->route('admin.users.index')->with('success', 'User Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        //
        $user = User::find($id);
        $user->delete($request->all());
        return redirect()->route('admin.users.index')->with('User Deleted Successfully');
    }

    public function search(Request $request) {
        $users = $this->search($request);
        if(empty($users)){
            return response()->json([
                'success' =>false,
            ]);
        }
        return response()->json([
            'success' => true,
            'users' =>  $users->toArray()
        ]);
    }
}
