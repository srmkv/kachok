@extends('auth.layouts.user_type.auth')
@section('page')
    Создать программу питания

    @isset($energy)
        <div class="d-flex align-items-center">
            <button class="btn-head mb-0" data-bs-toggle="modal" data-bs-target="#modalNutrition">
                <i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Добавить день
            </button>
        </div>

    @else
        <a href="{{route('tools')}}" class="btn btn-info">
            Чтобы использовать прогамму питания, вам нужно пройти через калкулятор калорий и БЖУ в разделе "Полезные
            инструменты"
        </a>
    @endisset

@endsection
@section('content')


    @isset($dishes)
        <div class="row card p-2">
            <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
                <div class="d-flex align-items-center">
                    <p class="btn-head mb-0 text-dark">
                        {{date("d.m.Y", strtotime($date->date))}} г.
                    </p>
                    <a href="{{route('food')}}" class="btn-head ql-size-large">
                        Добавить все
                    </a>
                </div>

                <p class="tools-description mt-4"> Расчет потребления калорий: {{ $energy->energy }} ККАЛ</p>

                <p class="tools-description">
                    Расчет потребления БЖУ:
                    {{ $energy->protein }} г. белка
                    {{ $energy->fat }} г. жиров
                    {{ $energy->carbohydrate }} г. углеводов
                </p>

                <p class="tools-description">
                    Вам осталось:
                    {{$differenceEnergy}} ККАЛ
                </p>
                <div class="dishes">
                    @foreach($dishes as $dish)
                        <div class="dish-card">
                            <div class="image-wrapper" data-bs-toggle="modal" data-bs-target="#modalDish{{$dish->id}}" style="background-image: url('{{ asset($dish->photo) }}')">

                            </div>
                            <div class="name" data-bs-toggle="modal"
                                 data-bs-target="#modalDish{{$dish->id}}">{{ $dish->name }}</div>
                            <div class="energy mb-4">1 порция / {{ $dish->energy }} ККАЛ</div>
                            <div class="count-dish">
                                {{-- <button class="btn">-</button> --}}
                                <input type="number" min="1" data-id="{{ $dish->fid }}" class="input-group-text count_dish" value="{{ $dish->count }}" />
                                {{-- <button class="btn">+</button> --}}
                            </div>
                            <a href="{{route('nutrition', ['dish_id' => $dish->id] )}}" class="btn btn-info">
                                Изменить
                            </a>

                            <a href="{{route('nutrition', ['del_dish_id' => $dish->id] )}}" class="btn btn-danger">
                                Удалить
                            </a>

                        </div>

                        <div class="modal fade" id="modalDish{{$dish->id}}" tabindex="-1"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-3">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ $dish->name }}</h5>
                                    </div>
                                    <p class="mt-3 mb-3">
                                        {{ $dish->description }}
                                    </p>
                                    <img src="{{ asset($dish->photo) }}" width="100%">
                                    <div class="d-flex justify-content-between mt-3">
                                        <div>Время приготовления</div>
                                        <span class="fw-bold">{{ $dish->cooking_time }}</span>
                                    </div>
                                    <div class="line"></div>
                                    <div class="">
                                        <h4>Ингредиенты</h4>
                                        <div class="ingredients">
                                            @foreach($dish->ingredients as $ingredient)
                                                <div class="d-flex justify-content-between p-2 border-bottom">
                                                    <span>{{ $ingredient->name }} {{$ingredient->pivot->information}}</span>
                                                    <span>{{ $ingredient->pivot->quantity }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="">
                                        <h4 class="mb-2 mt-3">Приготовление</h4>
                                        @foreach($dish->steps as $step)
                                            <div class="border-bottom p-3">
                                                <h3>{{ $loop->index + 1 }}.</h3>
                                                {!! $step !!}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                        <div class="d-flex justify-content-center">
                            <a href="{{route('nutrition', ['add_dish' => $date->id] )}}"
                               class="btn btn-success m-6" style="height: 40px;">
                                Добавить
                            </a>
                        </div>
                </div>
            </div>
        </div>
    @endisset


    <!-- Modal modalNutrition  -->
    <div class="modal fade" id="modalNutrition" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Добавить день</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('nutrition')}}" method="get">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="ForDate" class="form-label">Дата</label>
                            <input type="date" name="date" class="form-control" id="ForDate" placeholder="Дата">
                        </div>
                        <div class="mb-3">
                            <label for="FormWeight" class="form-label">Количество приёма пиши</label>
                            <input required type="number" name="dishCount" min="1" max="8" class="form-control"
                                   id="FormWeight" placeholder="Количество приёма пиши">
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
        let count_dish = document.getElementsByClassName('count_dish');

        Array.from(count_dish).forEach(element => {
            element.addEventListener('input', (el) => {
                if(el.target.value > 0) {
                    document.location.href = `/user/food-dishes/${el.target.dataset.id}/count/${el.target.value}`;
                }
            })
        });
    </script>

@endsection
