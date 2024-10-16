@extends('admin.layouts.default')

@section('page-script')
    <script src="{{ asset('assets/admin/js/custom/states.js') }}"></script>
@endsection


@section('content')
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7">
            <div class="flex flex-col gap-2">
                <h1 class="text-2xl font-semibold text-gray-900">
                    States
                </h1>
                <div class="flex items-center gap-2 text-sm font-medium text-gray-600">
                    <!-- Optional additional information can go here -->
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    href="{{ route('admin.tc-city-url.create') }}">Create State</a>
            </div>
        </div>

        <!-- Table Section -->
        <div class="grid gap-6 lg:gap-8 border rounded-md">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-800">
                        States
                    </h3>
                </div>
                <div class="p-4">
                    <div data-datatable="true" data-datatable-page-size="20" data-datatable-state-save="true">
                        <div>
                            <table class="min-w-full table-fixed font-normal border text-gray-600  text-sm">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-4 py-2 border text-left w-5">
                                            <span class="cursor-pointer">
                                                #
                                            </span>
                                        </th>
                                        <th class="px-4 py-2  text-left border min-w-[150px]">
                                            <span class="cursor-pointer">
                                                City Name
                                            </span>
                                        </th>
                                        <th class="px-4 py-2  text-left border min-w-[150px]">
                                            <span class="cursor-pointer">
                                                Page Title
                                            </span>
                                        </th>
                                        <th class="px-4 py-2  text-left border min-w-[150px]">
                                            <span class="cursor-pointer">
                                                Meta Title
                                            </span>
                                        </th>
                                        <th class="px-4 py-2  text-left border min-w-[150px]">
                                            <span class="cursor-pointer">
                                                Meta Description
                                            </span>
                                        </th>
                                        <th class="px-4 py-2  text-left border min-w-[150px]">
                                            <span class="cursor-pointer">
                                                City Heading
                                            </span>
                                        </th>
                                        <th class="px-4 py-2  text-left border min-w-[150px]">
                                            <span class="cursor-pointer">
                                                Transport Area
                                            </span>
                                        </th>
                                        <th class="px-4 py-2  w-24  text-left">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($TransportUrl) == 0)
                                        <tr>
                                            <td colspan="9" class="text-center">There is no record available.</td>
                                        </tr>
                                    @else
                                        @foreach ($TransportUrl as $key=>$trasnporturl)
                                            <tr>
                                                <td  class="px-7 py-4 border-b font-medium  text-left w-5">
                                                    {{ $key 
                                                    + 1 }}
                                                </td>
                                                <td class="px-7 py-4  text-left font-medium border  min-w-[150px]">
                                                    {{ $trasnporturl->city->city_name}}
                                                </td>
                                                <td class="px-7 py-4 text-left font-medium border min-w-[150px]">
                                                    {{ $trasnporturl->page_title }}
                                                </td>
                                                <td class="px-7 py-4 text-left font-medium border min-w-[150px]">
                                                    {{ $trasnporturl->meta_title }}
                                                </td>
                                                <td class="px-7 py-4 text-left font-medium border min-w-[150px]">
                                                    {{ $trasnporturl->meta_description }}
                                                </td>
                                                <td class="px-7 py-4 text-left font-medium border min-w-[150px]">
                                                    {{ $trasnporturl->city_heading }}
                                                </td>
                                                <td class="px-7 py-4 text-left font-medium border min-w-[150px]">
                                                    {{ $trasnporturl->transport_area }}
                                                </td>
                                                
                                                <td class="px-4 py-2 w-4 border text-left">
                                                    <div class="flex items-center gap-4 ">   
                                                        <div class="relative">
                                                            <button class="flex items-center focus:outline-none" onclick="toggleActions(event)">
                                                                <img class="w-5" src="{{ asset('assets/front/media/dots.png') }}" alt="">
                                                            </button>
                                                            <!-- Action buttons -->
                                                            <div class="absolute w-32 right-10 hidden bg-white shadow-lg rounded-md action-buttons">
                                                                <div class="flex flex-row p-3">
                                                                    <img class="w-5 hover:text-blue-600" src="{{ asset('assets/front/media/Edit.png') }}" alt="">
                                                                <button><a href="{{ route('admin.tc-city-url.edit', $trasnporturl->id) }}"  class="px-4 py-2 font-medium text-sm text-gray-800 hover:text-blue-600">Edit</a></button> 
                                                                </div>
                                                                <form   action="{{ route('admin.tc-city-url.destroy',$trasnporturl->id) }}" method="POST" class="block">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="flex flex-row p-3">
                                                                        <img class="w-4 h-5" src="{{ asset('assets/front/media/bin.png') }}" alt="">
                                                                        <button type="submit" class="w-full font-medium text-left px-4  text-sm text-gray-800 hover:text-blue-600">Remove</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="flex justify-between items-center p-4 text-gray-600 text-sm">
                            <div class="flex items-center gap-2">
                                <span>Show</span>
                                <select data-datatable-size="true"
                                    class="w-16 px-2 py-1 border border-gray-300 rounded focus:ring focus:ring-indigo-500">
                                </select>
                                <span>Per Page</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <span data-datatable-info="true">
                                    <!-- Info Text -->
                                </span>
                                <div class="pagination-sm">
                                    <!-- Pagination controls -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
