@extends('admin.layouts.master')

@section('content')

    <!-- BEGIN: Content -->
    <div class="content">
        @include('admin.layouts.navbar')
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                {{ __('messages.documents') }}
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
                <form action="{{ route('documents.update', $document->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="intro-y box p-5">


                        <div class="mt-3">
                            <label for="crud-form-name" class="form-label">{{ __('messages.doc_name') }} </label>
                            <input id="crud-form-name" name="doc_name" type="text" class="form-control w-full"
                                placeholder="{{ __('messages.doc_name') }} " value="{{ $document->doc_name }}" />
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-trigger" class="form-label">{{ __('messages.doc_opisanie') }} </label>
                            <input id="crud-form-trigger" name="doc_opisanie" type="text" class="form-control w-full"
                                placeholder="{{ __('messages.doc_opisanie') }} " value="{{ $document->doc_opisanie }}" />
                        </div>

                        

                        <div class="mt-3">
                            <label for="crud-form-photo" class="form-label">{{ __('messages.path') }} </label>
                            <input id="crud-form-photo" name="path" type="file" class="form-control w-full"
                                placeholder="{{ __('messages.path') }}" tabindex="1">
                            <img src="{{ asset('doc/' . $document->path) }}" class="w-32 mt-5">
                        </div>


                        <div class="text-right mt-5">
                            <a href="{{ route('documents.index') }}"
                                class="btn btn-danger w-24">{{ __('messages.cancel') }}</a>
                            <button type="submit" class="btn btn-primary w-24">{{ __('messages.save') }}</button>
                        </div>


                    </div>
                </form>
                <!-- END: Form Layout -->
            </div>
        </div>

    </div>
    <!-- END: Content -->

@endsection
