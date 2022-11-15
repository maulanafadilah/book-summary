{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="container h-full flex justify-center items-center px-4 bg-slate-100">

    <div class="w-full bg-white rounded-xl border border-gray-200 dark:bg-gray-800 dark:border-gray-700 mb-4">
        <div class="flex flex-col p-4">
            @if(session()->has('failed'))
                @include('elements.alert-danger')
            @endif
            <h5 class="text-xl font-bold text-gray-900 dark:text-white mt-2 mb-6">Register to our platform</h5>

            <form action="{{ url('/register/') }}" method="post" class="mb-4">
                @csrf
                <div class="mb-3">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your name</label>
                    <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name..." required>
                </div>
                <div class="mb-3">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>

                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register your account</button>

            </form>

            <div class="w-full flex justify-between mb-2">
                <h4 class="text-sm text-gray-900 font-medium">Already registered?</h4>
                <a href="/login" class="text-blue-700 hover:underline dark:text-blue-500 text-sm">Sign In Account</a>
            </div>

        </div>
    </div>

</div>

@endsection