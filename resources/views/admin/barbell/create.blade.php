@extends('admin.layouts.master')

@section('content')

    <!-- BEGIN: Content -->
    <div class="content">
        @include('admin.layouts.navbar')
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Создать блин или гриф
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
                <form action="{{route('barbell.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="intro-y box p-5">
                        <div class="mt-3">
                            <label for="crud-form-sort" class="form-label">{{__('messages.sort')}} </label>
                            <input id="crud-form-sort" name="sort" type="number" class="form-control w-full" placeholder="{{__('messages.sort')}} ">
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-kg" class="form-label">Вес </label>
                            <input id="crud-form-kg" name="kg" type="number" class="form-control w-full" placeholder="100">
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-active" class="form-label">Показывать </label>
                            <input id="crud-form-active" name="active" type="checkbox" class="form-control w-full" value="1" checked />
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-type" class="form-label">Тип </label>
                            <select name="type" id="crud-form-type">
                                <option value="1">Блин</option>
                                <option value="2">Гриф</option>
                            </select>
                        </div>

                        <div class="text-right mt-5">
                            <a href="{{route('barbell.index')}}"
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
