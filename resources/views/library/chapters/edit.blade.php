{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="container mx-auto px-6 pt-16 pb-16">
    
    <form method="post" action="{{ url('/chapter/'.$chapter->id) }}">
        @method('put')
        @csrf
        <div class="mb-4">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
            <input type="text" name="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Chapter title..." value="{{$chapter->title}}" required>
        </div>
        <div class="mb-8">
            <label for="editor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Body</label>
            <input id="editor" type="hidden" name="body">
            <trix-editor input="editor">{!!$chapter->body!!}</trix-editor>

        </div>
        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
    </form>



</div>
@endsection