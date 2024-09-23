@extends('admin.layouts.default')


@section('content')

<div class="container mx-auto">
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
      <div class="flex flex-col justify-center gap-2">
        <h1 class="text-xl font-semibold leading-none text-gray-900">
          Dashboard
        </h1>
        <div class="flex items-center gap-2 text-sm font-medium text-gray-600">
          <!-- Additional content can be added here -->
        </div>
      </div>
      <div class="flex items-center gap-2.5">
        <a class="btn btn-sm bg-gray-200 text-gray-700 hover:bg-gray-300 py-1 px-4 rounded" 
           href="html/demo1/public-profile/profiles/default.html">
          View Profile
        </a>
      </div>
    </div>
  </div>
  
    
@endsection