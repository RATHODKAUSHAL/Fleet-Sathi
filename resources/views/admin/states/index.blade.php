@extends('admin.layouts.default')

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
                    href="{{ route('states.create') }}">Create State</a>
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
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto border text-gray-600  text-sm">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-4 py-2  text-left w-5">
                                            <span class="cursor-pointer">
                                                #
                                            </span>
                                        </th>
                                        <th class="px-4 py-2  text-left border min-w-[150px]">
                                            <span class="cursor-pointer">
                                                State Name
                                            </span>
                                        </th>
                                        <th class="px-4 py-2  text-left border min-w-[150px]">
                                            <span class="cursor-pointer">
                                                State Abbreviation
                                            </span>
                                        </th>
                                        <th class="px-4 py-2  w-24  text-left">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($states) == 0)
                                        <tr>
                                            <td colspan="9" class="text-center">There is no record available.</td>
                                        </tr>
                                    @else
                                        @foreach ($states as $key=>$state)
                                            <tr>
                                                <td  class="px-4 py-2 border-b  text-left w-5">
                                                    {{ $state->id }}
                                                </td>
                                                <td class="px-4 py-2  text-left border  min-w-[150px]">
                                                    {{ $state->state_name }}
                                                </td>
                                                <td class="px-4 py-2  text-left border min-w-[150px]">
                                                    {{ $state->state_abbreviation }}
                                                </td>
                                                <td class="px-4 py-2  w-4 border text-left">
                                                    <button><img class="w-5"  src="{{ asset('assets/front/media/dots.png') }}" alt=""></button>
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
