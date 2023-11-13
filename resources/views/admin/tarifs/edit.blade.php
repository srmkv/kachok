@extends('admin.layouts.master')

@section('content')

    <!-- BEGIN: Content -->
    <div class="content">
        @include('admin.layouts.navbar')
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                {{__('messages.tarifs')}}
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
                <form action="{{route('tarifs.update', $tarif->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="intro-y box p-5">
                        <div class="mt-3">
                            <label for="crud-form-sort" class="form-label">{{__('messages.sort')}} </label>
                            <input id="crud-form-sort" name="sort" value="{{$tarif->sort}}" type="number" class="form-control w-full" placeholder="{{__('messages.sort')}} ">
                        </div>

                        <div class="mt-3">
                            <label for="crud-form-name" class="form-label">{{__('messages.name')}} </label>
                            <input id="crud-form-name" name="name" type="text" class="form-control w-full"
                                   placeholder="{{__('messages.name')}} " value="{{$tarif->name}}">
                        </div>
                        <div class="mt-3">
                            <label for="crud-form-hint" class="form-label">{{__('messages.hint')}} </label>
                            <input id="crud-form-hint" name="hint" type="text" class="form-control w-full"
                                   placeholder="{{__('messages.hint')}} " value="{{$tarif->hint}}">
                        </div>
                        <div class="mt-3">
                            <label for="crud-form-price" class="form-label">{{__('messages.price')}} </label>
                            <input id="crud-form-price" name="price" type="number" class="form-control"
                                   data-single-mode="true" placeholder="{{__('messages.price')}} " value="{{$tarif->price}}">
                        </div>
                          <div class="mt-3">
                            <label for="crud-form-status_1" class="form-label">Стоимость день </label>
                            <input id="crud-form-status_1" value="{{$tarif->status_1}}" name="status_1" type="text" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="crud-form-status_2" class="form-label">Калькуляторы </label>
                            <input id="crud-form-status_2" value="{{$tarif->status_2}}" name="status_2" type="text" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="crud-form-status_3" class="form-label">Дневник тренировок (Самостоятельное
                                заполнение) </label>
                            <input id="crud-form-status_3" value="{{$tarif->status_3}}" name="status_3" type="text" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="crud-form-status_4" class="form-label">Дневник тренировок (Автоматическое
                                заполнение)</label>
                            <input id="crud-form-status_4" value="{{$tarif->status_4}}" name="status_4" type="text" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="crud-form-status_5" class="form-label">Дневник питания (Без цели БЖУ +
                                калории) </label>
                            <input id="crud-form-status_5" value="{{$tarif->status_5}}" name="status_5" type="text" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="crud-form-status_6" class="form-label">Дневник питания (Выбор блюд по
                                целям)</label>
                            <input id="crud-form-status_6" value="{{$tarif->status_6}}" name="status_6" type="text" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="crud-form-status_7" class="form-label">Прогресс-бар (цели)</label>
                            <input id="crud-form-status_7" value="{{$tarif->status_7}}" name="status_7" type="text" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="crud-form-status_8" class="form-label">3*30 минутные консультации</label>
                            <input id="crud-form-status_8" value="{{$tarif->status_8}}" name="status_8" type="text" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="crud-form-status_9" class="form-label">Кол-во подходов и веса рассчитываются
                                самостоятельно </label>
                            <input id="crud-form-status_9" value="{{$tarif->status_9}}" name="status_9" type="text" class="form-control">

                        </div>
                        <div class="mt-3">
                            <label for="crud-form-status_10" class="form-label">Результаты калькуляторов сохраняются в лк и
                                участвуют в составлении планов </label>
                            <input id="crud-form-status_10" value="{{$tarif->status_10}}" name="status_10" type="text" class="form-control">
                        </div>


                        <div class="text-right mt-5">
                            <a href="{{route('tarifs.index')}}"
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
