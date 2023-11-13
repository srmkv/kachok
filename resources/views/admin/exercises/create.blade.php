@extends('admin.layouts.master')

@section('content')

    <!-- BEGIN: Content -->
    <div class="content">
        @include('admin.layouts.navbar')
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                {{__('messages.exercises')}}
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
                <form action="{{route('exercise.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="intro-y box p-5">


                        <div class="mt-3">
                            <label for="crud-form-name" class="form-label">{{__('messages.name')}} </label>
                            <input id="crud-form-name" name="name" type="text" class="form-control w-full"
                                   placeholder="{{__('messages.name')}}" />
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-trigger" class="form-label">{{__('messages.trigger')}} </label>
                            <input id="crud-form-trigger" name="trigger" type="text" class="form-control w-full"
                                   placeholder="{{__('messages.trigger')}}" />
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-description" class="form-label">{{__('messages.description')}} </label>
                            <textarea id="crud-form-description" name="description" type="text" class="form-control w-full"
                                   placeholder="{{__('messages.description')}}"></textarea>
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-hint" class="form-label">{{__('messages.type')}} </label>
                            <input id="crud-form-hint" name="type" type="text" class="form-control w-full"
                                   placeholder="{{__('messages.type')}}" />
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-hint" class="form-label">{{__('messages.type_train')}} </label>
                            <input id="crud-form-hint" name="type_train" type="text" class="form-control w-full"
                                   placeholder="{{__('messages.type_train')}}" />
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-hint" class="form-label">{{__('messages.apparatus')}} </label>
                            <select name="apparatus_id" id="apparatus_id" class="form-control w-full">
                                <option value="">-- select --</option>
                                @forelse (App\Models\Apparatus::get() as $apparat)
                                    <option value="{{ $apparat->id }}">{{ $apparat->name }}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                            {{-- <input id="crud-form-hint" name="apparatus" type="text" class="form-control w-full"
                                   placeholder="{{__('messages.apparatus')}} " value="{{$exercise->apparatus}}"> --}}
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-hint" class="form-label">{{__('messages.experience')}} </label>
                            <input id="crud-form-hint" name="experience" type="text" class="form-control w-full"
                                   placeholder="{{__('messages.experience')}}" />
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-hint" class="form-label">{{__('messages.room')}} </label>
                            <input id="crud-form-hint" name="room" type="text" class="form-control w-full"
                                   placeholder="{{__('messages.room')}}" />
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-photo" class="form-label">{{__('messages.photo')}} </label>
                            <input id="crud-form-photo" name="photo" type="file" class="form-control w-full"
                                   placeholder="{{__('messages.photo')}}" tabindex="1" />
                        </div>


                        <div class="text-right mt-5">
                            <a href="{{route('exercises.index')}}"
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
