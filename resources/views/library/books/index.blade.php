{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="container mx-auto px-6 pt-6 pb-24">

        @if(session()->has('success'))
            @include('elements.alert')
        @endif

        <div class="w-full h-full flex justify-between items-center mb-6">
            <h2 class="w-full flex flex-col text-slate-800 font-bold text-md">Hello {{$name}}, <span class="text-xs font-normal text-gray-700">What book do you like to summarize?</span></h2>
            
            <div class="w-[14%] flex rounded-full overflow-hidden">
                <img src="{{url('/assets/images/profile.jpeg')}}" alt="Profile" >
            </div>
        </div>
        
        <form class="flex items-center mb-6">   
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required="">
            </div>
        </form>

        @if(!empty($recent_book))
        <div class="w-full h-full flex justify-between items-center mb-4">
            <h2 class="text-slate-700 text-sm font-semibold">Recent Summary</h2>
            <a href="#" class="text-xs font-normal text-gray-700">See all</a>
        </div>


        <a href="/book/{{$recent_book->id}}" class="w-full h-full bg-white border border-gray-200 rounded-xl p-2 flex mb-6">
            <div class="w-[20%] flex rounded-xl overflow-hidden">
                <img src="{{asset('storage/'.$recent_book->cover)}}" alt="{{$recent_book->title}}" >
            </div>
            
            <div class="w-[80%] flex flex-col pl-4 justify-center">
                <h4 class=" text-sm text-slate-800 font-bold line-clamp-2 mb-2">{{$recent_book->title}}</h4>
                <p class="text-xs text-gray-700 line-clamp-1">{{$recent_book->writer}}</p>
                <!-- <div class="w-full flex flex-col">
                    <div class="w-full bg-gray-200 rounded-full h-1 dark:bg-gray-700 mb-1">
                        <div class="bg-blue-500 h-1 rounded-full" style="width: 45%"></div>
                    </div>
                    <div class="flex justify-between mb-1">
                        <span class="text-xs font-light text-gray-700">10 Chapter</span>
                        <span class="text-xs font-light text-gray-700">45%</span>
                    </div>
                </div> -->
                

            </div>
        </a>
        @endif

        <div class="w-full h-full flex justify-between items-center mb-4">
            <h2 class="text-slate-700 text-sm font-semibold">Library</h2>
            <a href="#" class="text-xs font-normal text-gray-700">See all</a>
        </div>

        <div class="w-full h-full grid grid-cols-2 gap-6">
        @if(!empty($books))
            @foreach ($books as $item)
            <a href="/book/{{$item->id}}" class="w-full h-full flex flex-col items-center justify-between">
                <div class="w-[70%] bg-cover rounded-xl shadow-lg overflow-hidden flex mb-2">
                    <img src="{{asset('storage/'.$item->cover)}}" alt="Getting Things Done" class="">
                </div>
                <div class="w-full px-6">
                    <h4 class="text-sm text-slate-800 line-clamp-2 font-semibold">{{$item->title}}</h4>
                    <p class="text-xs text-gray-700 line-clamp-1">{{$item->writer}}</p>
                </div>
            </a>
            @endforeach
        @endif
            <!-- <div class="w-full h-full flex flex-col items-center justify-between">
                <div class="w-[70%] bg-cover rounded-xl shadow-lg overflow-hidden flex mb-2">
                    <img src="{{url('/assets/images/win.jpg')}}" alt="Getting Things Done" class="">
                </div>
                <div class="w-full px-6">
                    <h4 class=" text-sm text-slate-800 line-clamp-2 font-semibold">How To Win Friends & Influence People</h4>
                    <p class="text-xs text-gray-700 line-clamp-1">Dale Carnegie</p>
                </div>
            </div> -->
            <a href="{{ url('/book/create') }}" class="w-full h-full flex flex-col items-center justify-between">
                <div class="w-[70%] h-44 bg-cover rounded-xl overflow-hidden flex items-center bg-white border-2 border-gray-500 border-dashed">
                    <!-- <img src="{{url('/assets/images/win.jpg')}}" alt="Getting Things Done" class="border border-gray-700"> -->
                    <div class="w-full px-6 text-center">
                        <p class=" text-sm text-slate-800 line-clamp-2 font-semibold">Add Book</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection