@extends('admin.layouts.app')

@section('content')

    <!-- BEGIN: Login Info -->
    <div class="hidden xl:flex flex-col min-h-screen">
        <a href="" class="-intro-x flex items-center pt-5">
            <img alt="Admin" class="w-6" src="{{asset('dist/images/logo.svg')}}">
            <span class="text-white text-lg ml-3"> Admin </span>
        </a>
        <div class="my-auto">
            <img alt="Admin" class="-intro-x w-1/2 -mt-16" src="{{asset('dist/images/illustration.svg')}}">

        </div>
    </div>
    <!-- END: Login Info -->
    <!-- BEGIN: Login Form -->
    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
        <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                {{__('messages.sign-in')}}
            </h2>
            <form method="POST" action="{{ route('adminAuthenticate') }}">
                @csrf
            <div class="intro-x mt-8">
                <input type="text" name="email" class="intro-x login__input form-control py-3 px-4 block" placeholder="{{__('messages.email')}}">
                <input type="password" name="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="{{__('messages.password')}}">
            </div>

            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">{{__('messages.login')}}</button>
            </div>
            </form>

        </div>
    </div>
    <!-- END: Login Form -->

@endsection
