@extends('admin.layouts.default')

@section('content')
<div class="container mx-auto px-4">
    <!-- Header Section -->
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-8">
        <div class="flex flex-col gap-2">
            <h1 class="text-2xl font-semibold text-gray-600">
                @if(@$cities)
                            Update City
                        @else
                            Create City
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
                @if(@$cities)
                    Update City
                @else
                    Create City
                @endif
            </h3>
        </div>

        <form method="POST" action="@if(@$cities) {{route('admin.cities.update', $cities)}} @else {{ route('admin.cities.store') }} @endif">
            
            <!-- Input Fields Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                @csrf
            @if (@$cities)
            {{ method_field('PUT') }}
        @endif
                <div>
                    <label for="city_name" class="block text-sm font-medium text-gray-500 mb-2">City Name</label>
                    <input class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="city_name" name="city_name" type="text" value="{{ old('city_name', @$cities->city_name) }}" />
                    @if ($errors->has('city_name'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('city_name') }}</p>
                    @endif
                </div>

                <div>
                    <label for="state_name" class="block text-sm font-medium text-gray-500 mb-2">State Name</label>
                    <input class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           id="state_name" name="state_name" type="text"  value="{{ old('state_name', @$cities->state_name) }}" />
                    @if ($errors->has('state_name'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('state_name') }}</p>
                    @endif
                </div>
            </div>

            <!-- Action Buttons Section -->
            <div class="mt-6">
                <div class="flex gap-3">
                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save
                    </button>
                    <a href="{{ route('admin.cities.index') }}" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                        Back
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
