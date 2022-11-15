{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="container mx-auto px-6 pt-16 pb-16">

    @if(session()->has('success'))
        @include('elements.alert')
    @endif

    <div class="w-full h-full flex p-2 mb-4 justify-between">

        <div class="w-[50%] flex rounded-xl overflow-hidden shadow-sm">
            <img src="{{asset('storage/'.$book->cover)}}" alt="{{$book->title}}">
        </div>

        <div class="w-[50%] flex flex-col ml-4">
            <div class="w-full h-full flex items-center bg-slate-100 rounded-xl p-2 mb-4">
                <div class="flex items-center justify-center">
                    <span class="material-symbols-rounded text-sky-600">apartment</span>
                </div>
                <div class="flex flex-col mx-2">
                    <span class="text-xs text-gray-600">Publisher</span>
                    <h5 class="text-xs font-medium line-clamp-1">{{$book->publisher}}</h5>
                </div>
            </div>
            <div class="w-full h-full flex items-center bg-slate-100 rounded-xl p-2 mb-4">
                <div class="flex items-center justify-center">
                    <span class="material-symbols-rounded text-sky-600">category</span>
                </div>
                <div class="flex flex-col mx-2">
                    <span class="text-xs text-gray-600">Category</span>
                    <h5 class="text-xs font-medium line-clamp-1">{{$book->category}}</h5>
                </div>
            </div>
            <div class="w-full h-full flex items-center bg-slate-100 rounded-xl p-2">
                <div class="flex items-center justify-center">
                    <span class="material-symbols-rounded text-sky-600">event</span>
                </div>
                <div class="flex flex-col mx-2">
                    <span class="text-xs text-gray-600">Year Published</span>
                    <h5 class="text-xs font-medium line-clamp-1">{{$book->year_published}}</h5>
                </div>
            </div>
        </div>

    </div>

    <div class="w-full h-full flex flex-col p-2 justify-between mb-4">
        <div class="w-full h-[50%] flex flex-col mb-6">
            <h2 class="text-lg text-slate-800 line-clamp-2 font-bold mb-2">{{$book->title}}</h2>
            <p class="text-sm font-medium text-sky-700 line-clamp-1">Book by {{$book->writer}}</p>
        </div>
        <div class="w-full h-[50%]">
            <p class="text-sm text-justify line-clamp-6" id="description">{{$book->description}}</p>
            <a href="#" class="text-sm text-blue-600">Show all</a>
        </div>
    </div>

    <div class="w-full h-full flex justify-between items-center p-2 mb-4">
        <h2 class="text-slate-700 text-md font-semibold">Chapters</h2>
        <a href="/chapter/create/{{$book->id}}" class="text-sm font-normal text-blue-600">Add</a>
    </div>
    
    @if(!empty($chapters))
    <hr class="mb-4 mx-2">

    <div class="w-full h-full flex flex-col justify-between mb-6">
        @foreach($chapters as $item)
        <a href="/chapter/{{$item->id}}" class="w-full h-full text-center text-gray-500 mb-4 rounded-xl">
            <div class="flex items-center justify-between">
                <span class="text-sm text-left font-medium text-gray-600 ml-2">{{$item->title}}</span>
                <span class="material-symbols-rounded text-gray-600  text-sm mr-2">arrow_forward_ios</span>
            </div>
        </a>
        <hr class="mb-4 mx-2">
        @endforeach
    </div>
    @endif

    <div class="w-full h-full grid grid-cols-2 place-items-center text-center gap-2 mb-2 px-2">
        <a href="/book/{{$book->id}}/edit" class="w-full bg-blue-600 text-white p-3 text-sm rounded-full focus:rounded-full focus:ring-2">Edit</a>
        <form action="/book/{{$book->id}}" method="post" class="w-full border border-pink-600 text-pink-600 text-sm p-3 rounded-full focus:bg-pink-100">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Are you sure you want to delete this book?')" type="submit" class="w-full">Delete</button>
        </form>
    </div>

</div>



@endsection