@extends('admin.layouts.master')

@section('content')

    <!-- BEGIN: Content -->
    <div class="content">
        @include('admin.layouts.navbar')
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                {{__('messages.comments')}}
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
                <form action="{{route('comments.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="intro-y box p-5">
                        <div class="mt-3">
                            <label for="crud-form-sort" class="form-label">{{__('messages.sort')}} </label>
                            <input id="crud-form-sort" name="sort" type="number" class="form-control w-full"
                                   placeholder="{{__('messages.sort')}} ">
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-name" class="form-label">{{__('messages.name')}} </label>
                            <input id="crud-form-name" name="name" type="text" class="form-control w-full"
                                   placeholder="{{__('messages.name')}} ">
                        </div>
                        <div class="mt-3">
                            <label for="crud-form-surname" class="form-label">{{__('messages.surname')}} </label>
                            <input id="crud-form-surname" name="surname" type="text" class="form-control"
                                   data-single-mode="true" placeholder="{{__('messages.surname')}} ">
                        </div>
                        <div class="mt-3">
                            <label for="crud-form-city" class="form-label">{{__('messages.city')}} </label>
                            <input id="crud-form-city" name="city" type="text" class="form-control"
                                   data-single-mode="true" placeholder="{{__('messages.city')}} ">
                        </div>
                        <div class="mt-3">
                            <label for="crud-form-education" class="form-label">{{__('messages.comment')}} </label>
                            <textarea name="comment" id="editorcomment"></textarea>
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-photo" class="form-label">{{__('messages.photo')}} </label>
                            <input id="crud-form-photo" name="photo" type="file" class="form-control w-full"
                                   placeholder="{{__('messages.photo')}}">
                        </div>

                        <div class="rating">
                            <input type="radio" name="rating" value="5" id="rating-5">
                            <label for="rating-5"></label>
                            <input type="radio" name="rating" value="4" id="rating-4">
                            <label for="rating-4"></label>
                            <input type="radio" name="rating" value="3" id="rating-3">
                            <label for="rating-3"></label>
                            <input type="radio" name="rating" value="2" id="rating-2">
                            <label for="rating-2"></label>
                            <input type="radio" name="rating" value="1" id="rating-1">
                            <label for="rating-1"></label>
                        </div>


                        <div class="text-right mt-5">
                            <a href="{{route('comments.index')}}"
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
