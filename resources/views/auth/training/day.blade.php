@extends('auth.layouts.user_type.auth')
@section('page')
    {{date("d.m.Y", strtotime($day->date))}} г.
@endsection
@section('content')



    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">

            @foreach($periods as $period)
                <div class="card mb-4" id="tools">
                    <div class="card-body">
                        <h3 class="tools-title" role="button" data-bs-toggle="modal"
                            data-bs-target="#modalPeriod{{$period->id}}" >{{$period->name}}
                            <a href="{{route('period.delete', $period->id )}}" class="text-danger m-2">
                                <span class="fas fa-trash-alt"></span>
                            </a>
                        </h3>

                        <div class="modal fade" id="modalPeriod{{$period->id}}" tabindex="-1"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-3">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ $period->name }}</h5>
                                    </div>
                                    <!--<p class="mt-3 mb-3">
                                        {{ $period->exercise($period->name)->experience }}
                                    </p>-->
                                    <img
                                        @if($period->exercise($period->name)->photo)
                                        src="{{ asset('/photo/' . $period->exercise($period->name)->photo) }}"
                                        @else
                                        src="{{ asset('dist/images/illustration.svg') }}"
                                        @endif
                                        width="100%">
                                    <div class="d-flex justify-content-between mt-3">
                                        <div>Тип тренировки</div>
                                        <span class="fw-bold">{{ $period->exercise($period->name)->type }}</span>
                                    </div>
                                    <div class="line"></div>
                                    <!--<div class="">
                                        <h4>Помещение</h4>
                                        <div class="ingredients">

                                                <div class="d-flex justify-content-between p-2 border-bottom">
                                                    <span>{{$period->exercise($period->name)->room}}</span>
                                                </div>

                                        </div>
                                    </div>-->
                                    <div class="">
                                        <h4 class="mb-2 mt-3">Описание</h4>

                                            <div class="border-bottom p-3">
                                                {{ $period->exercise($period->name)->description }}
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">

                            <div class="d-flex flex-lg-row flex-column">

                                <img
                                    @if($period->exercise($period->name)->photo)
                                    src="{{ asset('/photo/' . $period->exercise($period->name)->photo) }}"
                                    @else
                                    src="{{ asset('dist/images/illustration.svg') }}"
                                    @endif
                                    height="150px">
                                @foreach($period->approaches as $approach)

                                    <div class="col-sm mt-4">
                                        <h6 class="text-center">{{$approach->kg}} кг</h6>
                                        <h6 class="text-center">{{$approach->repeat}} пвт</h6>
                                        <div class="d-flex justify-content-center">
                                            {{--                                            <a href="#" class="text-warning m-2"--}}
                                            {{--                                                data-bs-toggle="modal"--}}
                                            {{--                                                data-bs-target="#modalApp{{$approach->id}}">--}}
                                            {{--                                                <span class="fa fa-pencil"></span>--}}
                                            {{--                                            </a>--}}
                                            <a href="{{route('approach.delete', $approach->id )}}" class="text-danger m-2">
                                                <span class="fas fa-trash-alt"></span>
                                            </a>
                                        </div>
                                    </div>


                                    <!-- Modal #modalAppPer -->
                                    <div class="modal fade" id="#modalApp{{$approach->id}}" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Изминения подхода</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{route('approach.edit', $approach->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="ForGram" class="form-label">kg</label>
                                                            <input type="number" name="kg" class="form-control" id="ForGram" placeholder="0">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="ForGram" class="form-label">Павтор</label>
                                                            <input type="number" name="repeat" class="form-control" id="ForGram" placeholder="0">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                        <button type="submit" class="btn btn-form">Сохранить</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!--modal-->


                                @endforeach

                                <div class="col-sm">
                                    <div class="dropbox" role="button" onclick="show({{$period->id}})"
                                         data-bs-toggle="modal"
                                         data-bs-target="#modalApproach">
                                        <data value="{{$period->id}}" id="{{$period->id}}"></data>
                                    </div>
                                </div>

                            </div>



                        </div>


                    </div>
                </div>
            @endforeach

            <div class="card mb-4" id="tools">
                <div class="card-body">
                    <div class="dropbox" role="button" data-bs-toggle="modal" data-bs-target="#modalPeriodTraining">
                    </div>
                </div>
            </div>


        </div>
    </div>


    <!-- Modal modalPeriodTraining  -->
    <div class="modal fade" id="modalPeriodTraining" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Добавить тренировку</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('periodTraining.store', $day->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="FormName" class="form-label">Упражнения</label>

                            <select class="form-select" name="name" aria-label="Default select example">
                                @foreach($exercises as $exercise)
                                <option
                                    value="{{$exercise->name}}">
                                    {{$exercise->name}}
                                </option>
                                @endforeach
                            </select>
                           </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-form">Сохранить</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--modal-->

    <!-- Modal modalApproach  -->
    <div class="modal fade" id="modalApproach" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Добавление подхода</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('approach.store', $day->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="period_training_id" id="period_training_id">
                            <label for="ForGram" class="form-label">kg</label>
                            <input type="number" name="kg" class="form-control" id="ForGram" placeholder="0">
                        </div>
                        <div class="mb-3">
                            <label for="ForGram" class="form-label">Повтор</label>
                            <input type="number" name="repeat" class="form-control" id="ForGram" placeholder="0">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-form">Сохранить</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--modal-->

    <script>
        let show = id => {
            let element = document.getElementById(id);
            document.getElementById('period_training_id').value = element.value;
        }
    </script>


@endsection
