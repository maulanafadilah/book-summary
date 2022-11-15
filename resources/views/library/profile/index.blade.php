{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="container w-full h-full mx-auto px-6 pt-6 pb-24">
    
    <div class="w-full bg-white rounded-xl border border-gray-200 dark:bg-gray-800 dark:border-gray-700 mb-4">
        <div class="flex items-center p-4">
            <img class="w-16 h-w-16 rounded-full shadow-lg" src="{{url('/assets/images/profile.jpeg')}}" alt="Bonnie image">
            <div class="flex flex-col ml-4">
                <h5 class="mb-1 text-base md:text-xl font-medium text-gray-900 dark:text-white">{{$name}}</h5>
                <span class="text-xs md:text-sm text-gray-500 dark:text-gray-400">Personal Account</span>
            </div>
        </div>
    </div>

    <div class="w-full rounded-xl border border-pink-600 flex justify-center overflow-hidden">
            <form action="/logout" method="post" class="w-full h-full">
                @csrf
                <button type="submit" class="w-full h-full flex items-center justify-center p-2.5 focus:bg-pink-50 ">
                    <h4 class="text-sm md:text-base text-pink-600">Logout</h4>
                </button>

            </form>
    </div>

    <!-- <div class="flex mt-4 space-x-3 md:mt-6">
        <a href="#" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add friend</a>
        <a href="#" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Message</a>
    </div> -->
    
</div>
@endsection