@extends('admin.layouts.default')

@section('content')
<div class="container mx-auto px-4">
    <!-- Header Section -->
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-8">
        <div class="flex flex-col gap-2">
            <h1 class="text-2xl font-semibold text-gray-600">
                @if(@$company)
                            Update Company
                        @else
                            Create Company
                        @endif
            </h1>
            <div class="flex items-center gap-2 text-sm font-medium text-gray-600">
                <!-- Add any additional information here -->
            </div>
        </div>
        <div class="flex items-center gap-3">
            <!-- Add optional buttons or links here -->
        </div>
    </div>

    <!-- State Form Section -->
    <div class="bg-white border shadow-lg rounded-lg p-6">
        <div class="mb-6">
            <h3 class="text-lg font-medium text-gray-600">
                @if(@$company)
                    Update Company
                @else
                    Create Company
                @endif
            </h3>
        </div>

        <form method="POST" action="@if(@$company) {{route('admin.Company.update', $company)}} @else {{ route('admin.company.store') }} @endif">
             
            <!-- Input Fields Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                @csrf
            @if (@$company)
            {{ method_field('PUT') }}
        @endif
                <div>
                    <label for="company_name" class="block text-sm font-medium text-gray-500 mb-2">Company Name</label>
                    <input class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="company_name" name="company_name" type="text" value="{{ old('company_name', @$company->company_name) }}" />
                    @if ($errors->has('company_name'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('company_name') }}</p>
                    @endif
                </div>

                <div>
                    <label for="contact_number" class="block text-sm font-medium text-gray-500 mb-2">Contact Number</label>
                    <input class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="contact_number" name="contact_number" type="text"  value="{{ old('contact_number', @$company->contact_number) }}" />
                    @if ($errors->has('contact_number'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('contact_number') }}</p>
                    @endif
                </div>
                <div>
                    <label for="company_address" class="block text-sm font-medium text-gray-500 mb-2">Company Address</label>
                    <input class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="company_address" name="company_address" type="text"  value="{{ old('company_address', @$company->company_address) }}" />
                    @if ($errors->has('company_address'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('company_address') }}</p>
                    @endif
                </div>
                <div>
                    <label for="gst_number" class="block text-sm font-medium text-gray-500 mb-2">GST Number</label>
                    <input class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="gst_number" name="gst_number" type="text"  value="{{ old('gst_number', @$company->gst_number) }}" />
                    @if ($errors->has('gst_number'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('gst_number') }}</p>
                    @endif
                </div>
                <div>
                    <label for="co_pan_number" class="block text-sm font-medium text-gray-500 mb-2">Pan Number</label>
                    <input class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="co_pan_number" name="co_pan_number" type="text"  value="{{ old('co_pan_number', @$company->co_pan_number) }}" />
                    @if ($errors->has('co_pan_number'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('co_pan_number') }}</p>
                    @endif
                </div>
                <div>
                    <label for="website" class="block text-sm font-medium text-gray-500 mb-2">Website</label>
                    <input class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="website" name="website" type="text"  value="{{ old('website', @$company->website) }}" />
                    @if ($errors->has('website'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('website') }}</p>
                    @endif
                </div>
                <div>
                    <label for="logoFile" class="block text-sm font-medium text-gray-500 mb-2">Company Logo</label>
                    <input class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="logoFile" name="logoFile" type="file"  value="{{ old('logoFile', @$company->logoFile) }}" />
                    @if ($errors->has('logoFile'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('logoFile') }}</p>
                    @endif
                </div>
                <div>
                    <label for="id" class="block text-sm font-medium text-gray-500 mb-2">City Name</label>
                    <select class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="city_id" name="city_id" type="text" data-url="{{ route('admin.find.city') }}"> 
                           <option value=""></option>
                           @foreach ($City as $city)
                           <option value="{{ $city->id }}">{{ $city->city_name }}</option>  
                               
                           @endforeach
                        </select>

                    @if ($errors->has('city_id'))
                    <p class="p-2 text-sm font-bold text-red-800 rounded-lg  dark:text-red-400" role="alert">{{ $errors->first('city_id') }}</p>
                    @endif
                </div>
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-500 mb-2" data-url="{{ route('admin.users.search') }}">User</label>
                    <select class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="select_user" name="user_id" type="text" > 
                           <option value=""></option>
                           @foreach ($users as $user)
                           <option value="{{ $user->id }}">{{ $user->first_name }}</option>  
                               
                           @endforeach
                        </select>

                    @if ($errors->has('user_id'))
                    <p class="p-2 text-sm font-bold text-red-800 rounded-lg  dark:text-red-400" role="alert">{{ $errors->first('user_id') }}</p>
                    @endif
                </div>
            
            </div>

            <!-- Action Buttons Section -->
            <div class="mt-6">
                <div class="flex gap-3">
                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                        Back
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
