@extends('admin.layouts.default')

@section('content')
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-8">
            <div class="flex flex-col gap-2">
                <h1 class="text-2xl font-semibold text-gray-600">
                    @if (@$TransportUrl)
                        Update Transport Company Urls
                    @else
                        Transport Company Urls
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
                    @if (@$TransportUrl)
                    Update Transport Company Url
                    @else
                        Create Transport Company Url
                    @endif
                </h3>
            </div>

            <form method="POST" action="@if (@$TransportUrl) {{ route('admin.tc-city-url.update', $TransportUrl) }} @else  {{ route('admin.tc-city-url.store') }} @endif">

                {{-- method="POST" action="@if (@$states) {{route('admin.states.update', $states)}} @else {{ route('admin.states.store') }} @endif" --}}

                <!-- Input Fields Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                    @csrf
                    @if (@$TransportUrl)
                        {{ method_field('PUT') }}
                    @endif
                    <div>
                        <label for="id" class="block text-sm font-medium text-gray-500 mb-2">City Name</label>
                        <select
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            id="city_id" name="city_id" type="text" data-url="{{ route('admin.find.city') }}">
                            <option value="">Select City</option>
                            @foreach ($City as $city)
                                <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('city_id'))
                            <p class="p-2 text-sm font-bold text-red-800 rounded-lg  dark:text-red-400" role="alert">
                                {{ $errors->first('city_id') }}</p>
                        @endif
                    </div>


                    <div>
                        <label for="company_icon" class="block text-sm font-medium text-gray-500 mb-2">Company Icon</label>
                        <input
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            id="company_icon" name="company_icon" type="file" value="{{ old('company_icon', @$TransportUrl->company_icon) }}"/> 
                        @if ($errors->has('company_icon'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('company_icon') }}</p>
                    @endif
                    </div>


                    <div>
                        <label for="page_title" class="block text-sm font-medium text-gray-500 mb-2">Page
                            title</label>
                        <input
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            id="page_title" name="page_title" type="text" value="{{ old('page_title', @$TransportUrl->page_title) }}"/> 
                        @if ($errors->has('page_title'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('page_title') }}</p>
                    @endif
                    </div>


                    <div>
                        <label for="meta_title" class="block text-sm font-medium text-gray-500 mb-2">Meta
                            Title</label>
                        <input
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            id="meta_title" name="meta_title" type="text" value="{{ old('meta_title', @$TransportUrl->meta_title) }}"/> 
                        @if ($errors->has('meta_title'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('meta_title') }}</p>
                    @endif
                    </div>


                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-gray-500 mb-2">Meta
                            Description</label>
                        <input
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            id="meta_description" name="meta_description" type="text" value="{{ old('meta_description', @$TransportUrl->meta_description) }}"/> 
                        @if ($errors->has('meta_description'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('meta_description') }}</p>
                    @endif
                    </div>


                    <div>
                        <label for="transport_area" class="block text-sm font-medium text-gray-500 mb-2">Transport
                            Area</label>
                        <input
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            id="transport_area" name="transport_area" type="text" value="{{ old('transport_area', @$TransportUrl->transport_area) }}"/> 
                        @if ($errors->has('transport_area'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('transport_area') }}</p>
                    @endif
                    </div>


                    <div>
                        <label for="is_popular" class="block text-sm font-medium text-gray-500 mb-2">Is
                            popular</label>
                        <select
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            id="is_popular" name="is_popular" type="text" value="{{ old('is_popular', @$TransportUrl->is_popular) }}">
                            <option value="">yes</option>
                            <option value="">no</option>
                        </select> 
                        @if ($errors->has('is_popular'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('is_popular') }}</p>
                    @endif
                    </div>


                    <div class="w-full">
                        <label for="content"
                            class="block text-sm font-medium w-full text-gray-500 mb-2">Content</label>
                        <textarea
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            id="content" name="content" type="text" value="{{ old('content', @$TransportUrl->content) }}"></textarea> 
                        @if ($errors->has('content'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('content') }}</p>
                    @endif
                    </div>


                    <div>
                        <label for="city_heading" class="block text-sm font-medium text-gray-500 mb-2">City
                            heading</label>
                        <input
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            id="city_heading" name="city_heading" type="text" value="{{ old('city_heading', @$TransportUrl->city_heading) }}"/> 
                        @if ($errors->has('city_heading'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('city_heading') }}</p>
                    @endif
                    </div>


                    <div>
                        <label for="city_image" class="block text-sm font-medium text-gray-500 mb-2">City
                            Image</label>
                        <input
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm  focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            id="city_image" name="city_image" type="file" value="{{ old('city_image', @$TransportUrl->city_image) }}"/> 
                        @if ($errors->has('city_image'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('city_image') }}</p>
                    @endif
                    </div>


                    <div>
                        <label for="city_content" class="block text-sm font-medium text-gray-500 mb-2">City
                            content</label>
                        <textarea
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            id="city_content" name="city_content" type="text" value="{{ old('city_content', @$TransportUrl->city_content) }}"></textarea> 
                        @if ($errors->has('city_content'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('city_content') }}</p>
                    @endif
                    </div>


                </div>

                <!-- Action Buttons Section -->
                <div class="mt-6">
                    <div class="flex gap-3">
                        <button type="submit"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save
                        </button>
                        <a  href="{{ route('admin.tc-city-url.index') }}"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                            Back
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
