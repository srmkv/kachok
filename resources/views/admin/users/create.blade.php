@extends('admin.layouts.master')

@section('content')

    <!-- BEGIN: Content -->
    <div class="content">
        @include('admin.layouts.navbar')
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                {{__('messages.users')}}
            </h2>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                @if (count($errors) > 0)
                    <div class="alert alert-outline-danger alert-dismissible show flex items-center mb-2" role="alert">
                        <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"> </i>
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                        <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
            @endif
            <!-- BEGIN: Form Layout -->
                <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="intro-y box p-5">

                        <div class="mt-3">
                            <label for="crud-form-name" class="form-label">{{__('messages.name')}} </label>
                            <input id="crud-form-name" name="name" type="text" class="form-control w-full"
                                   placeholder="{{__('messages.name')}} ">
                        </div>
                        <div class="mt-3">
                            <label for="crud-form-email" class="form-label">{{__('messages.email')}} </label>
                            <input id="crud-form-email" name="email" type="email" class="form-control"
                                   data-single-mode="true" placeholder="{{__('messages.email')}} ">
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-traffic" class="form-label">{{__('messages.traffic')}} </label>
                            <input id="crud-form-traffic" name="traffic" type="text" class="form-control"
                                   data-single-mode="true" placeholder="{{__('messages.traffic')}} ">
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-password" class="form-label">{{__('messages.password')}} </label>
                            <input id="crud-form-password" name="password" type="password" class="form-control"
                                   data-single-mode="true" placeholder="{{__('messages.password')}} ">
                        </div>

                        <div class="text-right mt-5">
                            <a href="{{route('users.index')}}" class="btn btn-danger w-24">{{__('messages.cancel')}}</a>
                            <button type="submit" class="btn btn-primary w-24">{{__('messages.save')}}</button>
                        </div>


                    </div>
                </form>
                <!-- END: Form Layout -->
            </div>
        </div>

    </div>
    <!-- END: Content -->

@endsection
