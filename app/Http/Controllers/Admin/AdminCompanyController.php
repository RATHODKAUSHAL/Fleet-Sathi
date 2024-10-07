<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CityMaster;
use App\Models\CompanyMaster;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = CompanyMaster::get();
        return view('admin.company.index',  compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $company = new CompanyMaster;
        $City = CityMaster::get();
        $users = User::get();
        return view('admin.company.create', [
            'City' => $City,
            'users' => $users
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $company = new CompanyMaster();
        $company->company_name = $request->company_name;
        $company->contact_number = $request->contact_number;
        $company->company_address = $request->company_address;
        $company->gst_number = $request->gst_number;
        $company->logo_path = $request->logo_path;
        $company->co_pan_number = $request->co_pan_number;
        $company->website = $request->website;
        $company->city_id = $request->city_id;
        $company->user_id = $request->user_id->first_name;
        $company->save();
        return redirect()->route('admin.company.index');
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
}
