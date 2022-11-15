{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="container mx-auto px-6 pt-20 pb-20">

    @if(session()->has('success'))
        @include('elements.alert')
    @endif

    <h2 class="text-xl text-center text-slate-800 font-bold mb-8">{{$chapter->title}}</h2>
    <p class="text-justify">{!! $chapter->body !!}</p>

    <div class="w-full h-full grid grid-cols-2 place-items-center text-center gap-2 mb-2 px-2 mt-14">
        <a href="/chapter/{{$chapter->id}}/edit" class="w-full bg-blue-600 text-white p-3 text-sm rounded-full focus:rounded-full focus:ring-2">Edit</a>
        <form action="/chapter/{{$chapter->id}}" method="post" class="w-full border border-pink-600 text-pink-600 text-sm p-3 rounded-full focus:bg-pink-100">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Are you sure you want to delete this chapter?')" type="submit" class="w-full">Delete</button>
        </form>
    </div>
</div>

@endsection