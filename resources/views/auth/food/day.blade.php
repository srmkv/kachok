@extends('auth.layouts.user_type.auth')
@section('page')
    {{date("d.m.Y", strtotime($day->date))}} г.
@endsection
@section('content')



    <div class="row card">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">

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
                        <div class="name" data-bs-toggle="modal" data-bs-target="#modalDish{{$dish->id}}">{{ $dish->name }}</div>
                        <div class="energy mb-4">1 порция / {{ $dish->energy }} ККАЛ</div>
                        <div class="count-dish">
                            {{-- <button class="btn">-</button> --}}
                            <input type="number" min="1" data-id="{{ $dish->fid }}" class="input-group-text count_dish" value="{{ $dish->count }}" />
                            {{-- <button class="btn">+</button> --}}
                        </div>
                        <a href="{{route('change.random.food', ['date_id' => $day->id, 'dish_id' => $dish->id] )}}" class="btn btn-info">
                            Изменить
                        </a>

                        <a href="{{route('delete.food', ['date_id' => $day->id, 'dish_id' => $dish->id] )}}" class="btn btn-danger">
                            Удалить
                        </a>

                    </div>

                    <div class="modal fade" id="modalDish{{$dish->id}}" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-3">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ $dish->name }}</h5>
                                </div>
                                <p class="mt-3 mb-3">
                                    @php
                                        //$prep = preg_split("/[\w\s\d]+/u", $dish->description);
                                        //$index = count($prep) - 1;
                                        //$delim = !$prep[$index] ? $prep[$index-1] : $prep[$index] ;
                                        //$dish->description = strrev(explode($delim, strrev($dish->description), 2)[1]) . $delim
                                    @endphp
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
                        <a href="{{route('add.random.food', ['date_id' => $day->id] )}}"
                           class="btn btn-success m-6" style="height: 40px;">
                            Добавить
                        </a>
                    </div>
            </div>


        </div>
    </div>


    <!-- Modal modalPeriodDay  -->
    <div class="modal fade" id="modalPeriodDay" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Добавить прием пищи</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('PeriodDay.store', $day->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="FormName" class="form-label">Имя</label>
                            <input type="text" name="name" class="form-control" id="FormName" placeholder="Завтрак">
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

    <!-- Modal modalDish  -->
    <div class="modal fade" id="modalDish" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Добавление блюда</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('dish.store', $day->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="period_day_id" id="period_day_id">
                            <label for="ForName" class="form-label">Блюдо</label>
                            <input type="text" name="name" class="form-control" id="ForName" placeholder="Блюдо">
                        </div>
                        <div class="mb-3">
                            <label for="ForGram" class="form-label">Грамм</label>
                            <input type="number" name="gram" class="form-control" id="ForGram" placeholder="0">
                        </div>
                        <div class="mb-3">
                            <label for="ForGram" class="form-label">Белки</label>
                            <input type="number" name="protein" class="form-control" id="ForGram" placeholder="0">
                        </div>
                        <div class="mb-3">
                            <label for="ForGram" class="form-label">Жиры</label>
                            <input type="number" name="fat" class="form-control" id="ForGram" placeholder="0">
                        </div>
                        <div class="mb-3">
                            <label for="ForGram" class="form-label">Углеводы</label>
                            <input type="number" name="energy" class="form-control" id="ForGram" placeholder="0">
                        </div>
                        <div class="mb-3">
                            <label for="FormImage" class="form-label">фото</label>
                            <input type="hidden" name="type" value="before">
                            <input type="file" name="photo" class="form-control" id="FormImage" placeholder="фото">
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
            document.getElementById('period_day_id').value = element.value;
        }

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
