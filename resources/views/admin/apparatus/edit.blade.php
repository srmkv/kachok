@extends('admin.layouts.master')

@section('content')

    <!-- BEGIN: Content -->
    <div class="content">
        @include('admin.layouts.navbar')
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                {{__('messages.apparatus')}}
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
                <form action="{{route('apparatus.update', $apparatus->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="intro-y box p-5">

                        <div class="mt-3">
                            <label for="crud-form-hall" class="form-label">{{__('messages.in_hall')}} </label> 
                            <input id="crud-form-hall" name="hall" type="checkbox" class="form-control w-full"
                                   placeholder="{{__('messages.in_hall')}} " {{ $apparatus->hall ? 'checked' : '' }} value="1" />
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-name" class="form-label">{{__('messages.title')}} </label>
                            <input id="crud-form-name" name="name" type="text" class="form-control w-full"
                                   placeholder="{{__('messages.title')}} " value="{{$apparatus->name}}">
                        </div>

                        <div class="mt-3">
                            <label for="editortrainer" class="form-label">{{__('messages.description')}} </label>
                            <textarea id="editortrainer" name="description" type="text" class="form-control w-full"
                                   placeholder="{{__('messages.description')}} ">
                                {{$apparatus->description}}
                            </textarea>
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-photo" class="form-label">{{__('messages.photo')}} </label>
                            <input id="crud-form-photo" name="photo" type="file" class="form-control w-full"
                                   placeholder="{{__('messages.photo')}}" tabindex="1">
                            <img src="{{asset('photo/'.$apparatus->photo)}}" class="w-32 mt-5">
                        </div>


                        <div class="text-right mt-5">
                            <a href="{{route('apparatus.index')}}"
                               class="btn btn-danger w-24">{{__('messages.cancel')}}</a>
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
