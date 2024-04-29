@extends('auth.layouts.user_type.auth')
@section('page')
    Создать программу тренировок
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="tarif_card card text-center">
                <div class="offset-4 col-4 mt-12 mb-12">
                    <h3>Составьте индивидуальную программу тренировок</h3>
                    @if($bju)
                        <button class="btn btn-white text-success border border-success"
                                data-bs-toggle="modal" data-bs-target="#modalWorkouts">
                            Составить
                        </button>
                    @else
                        <a href="{{route('tools')}}" class="btn btn-info">
                            Чтобы использовать прогамму тренировок, вам нужно пройти через калкулятор калорий и БЖУ в разделе "Полезные
                            инструменты"
                        </a>

                    @endif


                </div>
            </div>
        </div>
    </div>

    <form action="{{route('train.program.create')}}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- Modal modalWorkouts  -->
        <div class="modal fade" id="modalWorkouts" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true" style="padding-left: 20%;">

            <div class="modal-dialog modal-dialog-centered">

                <img src="{{asset('dist/images/girlb.png')}}" height="490" style="
    position: absolute;
    z-index: -100;
    margin-left: -320px;
    margin-top: 20px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Создание персональной программы</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="FormBZU" class="form-label">Возраст</label>
                            <input type="number" name="age" @isset($bju) value="{{$bju->age}}" @endisset class="form-control" id="#" placeholder="Возраст">
                        </div>

                        <div class="mb-3">
                            <label for="FormBZU" class="form-label">Пол</label>
                            <select class="form-select" name="gender" aria-label="Default select example">
                                <option
                                    @isset($bju)
                                    {{$bju->gender == "men" ? 'selected' : ''}}
                                    @endisset
                                    value="men">
                                    Мужчина
                                </option>
                                <option
                                    @isset($bju)
                                    {{$bju->gender == "women" ? 'selected' : ''}}
                                    @endisset
                                    value="women">
                                    Женщина
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="FormBZU" class="form-label">Цель</label>
                            <select class="form-select" name="goal" aria-label="Default select example">
                                <option
                                    @isset($program)
                                    {{$program->goal == "weight_loss" ? 'selected' : ''}}
                                    @endisset
                                    value="weight_loss">
                                    Снижение веса
                                </option>
                                <option
                                    @isset($program)
                                    {{$program->goal == "weight_maintenance" ? 'selected' : ''}}
                                    @endisset
                                    value="weight_maintenance">
                                    Поддержание веса
                                </option>
                                <option
                                    @isset($program)
                                    {{$program->goal == "mass_gain" ? 'selected' : ''}}
                                    @endisset
                                    value="mass_gain">
                                    Набор массы
                                </option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
                        <button type="button" id="btn_modal_1" class="btn btn-form" data-bs-toggle="modal"
                                data-bs-target="#modalWorkouts2">
                            Далее
                        </button>
                    </div>


                </div>
            </div>


        </div>
        <!--modal-->

        <!-- Modal modalWorkouts2  -->
        <div class="modal" id="modalWorkouts2" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true" style="margin-left: 15%">
            <div class="modal-dialog modal-dialog-centered">
                <img src="{{asset('dist/images/girlb.png')}}" height="630" style="
    position: absolute;
    z-index: -100;
    margin-left: -420px;
    margin-top: 26px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Создание персональной программы</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <input type="hidden" name="number_of_workouts_per_week" class="form-control" min="1" max="5"
                                   id="number_of_workouts_per_week_input_id"
                                   @isset($program)
                                   value="{{$program->number_of_workouts_per_week}}"
                                   @endisset
                                   placeholder="от 1 до 5">
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <p class="calculate-h">Дни недели</p>
                                </div>
                                <div class="mb-3">
                                    <input class="form-check-input calculate-check"
                                           @isset($program)
                                           @isset(\GuzzleHttp\json_decode($program->day)->Mon)
                                           {{\GuzzleHttp\json_decode($program->day)->Mon == "Mon" ? 'checked' : ''}}
                                           @endisset
                                           @else
                                           checked 
                                           @endisset
                                           name="day[Mon]" value="Mon" type="checkbox" id="monday">
                                    <label class="form-check-label" for="monday">
                                        Понедельник
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <input class="form-check-input calculate-check"
                                           @isset($program)
                                           @isset(\GuzzleHttp\json_decode($program->day)->Tue)
                                           {{\GuzzleHttp\json_decode($program->day)->Tue == "Tue" ? 'checked' : ''}}
                                           @endisset
                                           @endisset
                                           name="day[Tue]" value="Tue" type="checkbox" id="tuesday">
                                    <label class="form-check-label" for="tuesday">
                                        Вторник
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <input class="form-check-input calculate-check"
                                           @isset($program)
                                           @isset(\GuzzleHttp\json_decode($program->day)->Wed)
                                           {{\GuzzleHttp\json_decode($program->day)->Wed == "Wed" ? 'checked' : ''}}
                                           @endisset
                                           @endisset
                                           name="day[Wed]" value="Wed" type="checkbox" id="wednesday">
                                    <label class="form-check-label" for="wednesday">
                                        Среда
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <input class="form-check-input calculate-check"
                                           @isset($program)
                                           @isset(\GuzzleHttp\json_decode($program->day)->Thu)
                                           {{\GuzzleHttp\json_decode($program->day)->Thu == "Thu" ? 'checked' : ''}}
                                           @endisset
                                           @endisset
                                           name="day[Thu]" value="Thu" type="checkbox" id="thursday">
                                    <label class="form-check-label" for="thursday">
                                        Четверг
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <input class="form-check-input calculate-check"
                                           @isset($program)
                                           @isset(\GuzzleHttp\json_decode($program->day)->Fri)
                                           {{\GuzzleHttp\json_decode($program->day)->Fri == "Fri" ? 'checked' : ''}}
                                           @endisset
                                           @endisset
                                           name="day[Fri]" value="Fri" type="checkbox" id="friday">
                                    <label class="form-check-label" for="friday">
                                        Пятница
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <input class="form-check-input calculate-check"
                                           @isset($program)
                                           @isset(\GuzzleHttp\json_decode($program->day)->Sat)
                                           {{\GuzzleHttp\json_decode($program->day)->Sat == "Sat" ? 'checked' : ''}}
                                           @endisset
                                           @endisset
                                           name="day[Sat]" value="Sat" type="checkbox" id="saturday">
                                    <label class="form-check-label" for="saturday">
                                        Суббота
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <input class="form-check-input calculate-check"
                                           @isset($program)
                                           @isset(\GuzzleHttp\json_decode($program->day)->Sun)
                                           {{\GuzzleHttp\json_decode($program->day)->Sun == "Sun" ? 'checked' : ''}}
                                           @endisset
                                           @endisset
                                           name="day[Sun]" value="Sun" type="checkbox" id="sunday">
                                    <label class="form-check-label" for="sunday">
                                        Воскресенье
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <p class="calculate-h">Тренировка</p>
                                </div>
                                <div class="mb-3">
                                    <input class="form-check-input calculate-check"
                                           @isset($program)
                                           {{$program->train_type == "in_hall" ? 'checked' : ''}}
                                           @else
                                           checked 
                                           @endisset
                                           name="train_type" value="in_hall" type="radio" id="trainOne">
                                    <label class="form-check-label" for="trainOne">
                                        В зале
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <input class="form-check-input calculate-check"
                                           @isset($program)
                                           {{$program->train_type == "in_home" ? 'checked' : ''}}
                                           @endisset
                                           name="train_type" value="in_home" type="radio" id="trainTwo">
                                    <label class="form-check-label" for="trainTwo">
                                        Дома
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <p class="calculate-h">Опыт тренировок</p>
                                </div>
                                <div class="mb-3">
                                    <input class="form-check-input calculate-check"
                                        @isset($program)
                                        {{$program->experience == "beginner" ? 'checked' : ''}}
                                        @else
                                        checked 
                                        @endisset
                                        name="experience" value="beginner" type="radio" id="beginner">
                                    <label class="form-check-label" for="beginner">
                                        Новичок (до 6 месяцев)
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <input class="form-check-input calculate-check"
                                        @isset($program)
                                        {{$program->experience == "experienced" ? 'checked' : ''}}
                                        @endisset
                                        name="experience" value="experienced" type="radio" id="experienced">
                                    <label class="form-check-label" for="experienced">
                                        Опытный (от 6 до 18 месяцев)
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <input class="form-check-input calculate-check"
                                        @isset($program)
                                        {{$program->experience == "pro" ? 'checked' : ''}}
                                        @endisset
                                        name="experience" value="pro" type="radio" id="pro">
                                    <label class="form-check-label" for="pro">
                                        Профи (от 18 до 36 месяцев)
                                    </label>
                                </div>
                                <div class="mb-3 d-flex">
                                    <input class="form-check-input calculate-check"
                                        @isset($program)
                                        {{$program->experience == "super_pro" ? 'checked' : ''}}
                                        @endisset
                                        name="experience" value="super_pro" type="radio" id="super_pro">
                                    <label class="form-check-label" for="super_pro">
                                        Супер профи (свыше 36 месяцев)
                                    </label>
                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="button" id="btn_modal_2" class="btn btn-form" data-bs-toggle="modal"
                                data-bs-target="#modalWorkouts3">
                            Далее
                        </button>
                    </div>


                </div>
            </div>
        </div>
        <!--modal-->

        <!-- Modal modalWorkouts3  -->
        <div class="modal" id="modalWorkouts3" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true" style="margin-left: 15%">
            <div class="modal-dialog modal-dialog-centered">

                <img src="{{asset('dist/images/girlb.png')}}" height="740" style="
    position: absolute;
    z-index: -100;
    margin-left: -420px;
    margin-top: 34px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Создание персональной программы</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <p class="calculate-h">Тренажеры в зале</p>
                                </div>
                            </div>
                            @forelse (App\Models\Apparatus::where('hall', 1)->get() as $apparat)
                                {{-- <option value="{{ $apparat->id }}" {{ $apparat->id == $exercise?->apparatus?->id ? 'selected' : '' }}>{{ $apparat->name }}</option> --}}
                                <div class="col-6">
                                    <div class="mb-3">
                                        <input class="form-check-input calculate-check"
                                               @isset($program)
                                               @isset($apparatus[$apparat->id])
                                               {{ $apparatus[$apparat->id] == "on" ? 'checked' : ''}}
                                               @endisset
                                               @else
                                               checked 
                                               @endisset 
                                               name="apparatus[{{ $apparat->id }}]" type="checkbox" id="apparat_{{ $apparat->id }}">
                                        <label class="form-check-label" for="apparat_{{ $apparat->id }}">
                                            {{ $apparat->name }}
                                        </label>
                                    </div>
                                </div>
                            @empty
                                
                            @endforelse
                            
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
                        <button type="button" id="btn_modal_3" class="btn btn-form" data-bs-toggle="modal"
                                data-bs-target="#modalWorkouts4">
                            Далее
                        </button>
                    </div>


                </div>
            </div>
        </div>
        <!--modal-->

        <!-- Modal modalWorkouts4  -->
        <div class="modal" id="modalWorkouts4" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true" style="margin-left: 15%;">
            <div class="modal-dialog modal-dialog-centered">
                <img src="{{asset('dist/images/girlb.png')}}" height="635" style="
    position: absolute;
    z-index: -100;
    margin-left: -420px;
    margin-top: 28px;">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Создание персональной программы</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
{{--                                    <p class="calculate-h">Оборудования дома</p>--}}
                                </div>
                            </div>
                                

                            @forelse (App\Models\Apparatus::where('hall', 0)->get() as $apparat)
                                {{-- <option value="{{ $apparat->id }}" {{ $apparat->id == $exercise?->apparatus?->id ? 'selected' : '' }}>{{ $apparat->name }}</option> --}}
                                <div class="col-12">
                                    <div class="mb-3">
                                        <input class="form-check-input calculate-check"
                                                @isset($program)
                                                @isset($apparatus[$apparat->id])
                                                {{ $apparatus[$apparat->id] == "on" ? 'checked' : ''}}
                                                @endisset
                                                @else
                                                checked 
                                                @endisset 
                                               name="apparatus[{{ $apparat->id }}]" type="checkbox" id="apparat_{{ $apparat->id }}">
                                        <label class="form-check-label" for="apparat_{{ $apparat->id }}">
                                            {{ $apparat->name }}
                                        </label>
                                    </div>
                                </div>
                            @empty
                                
                            @endforelse
{{--                            <div class="col-6">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <p class="calculate-h">Другое</p>--}}
{{--                                </div>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <textarea class="form-control"--}}
{{--                                              name="apparatus_comment" type="checkbox" id="apparatus_comment">Напишите список тренажеров--}}
{{--                                        @isset($program)--}}
{{--                                            {{$program->apparatus_comment}}--}}
{{--                                        @endisset--}}
{{--                                    </textarea>--}}

{{--                                </div>--}}


{{--                            </div>--}}
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>

                            <button type="submit" id="btn_modal_4" class="btn btn-form" data-bs-toggle="modal"
                                    data-bs-target="#modalWorkouts5">
                                Далее
                            </button>


{{--                        @if(Auth::user()->traffic == 'Free')--}}
{{--                            <button type="button" id="btn_modal_4" class="btn btn-form" data-bs-toggle="modal"--}}
{{--                                    data-bs-target="#modalWorkouts5">--}}
{{--                                Далее--}}
{{--                            </button>--}}
{{--                        @else--}}
{{--                            <button type="submit"  class="btn btn-form">--}}
{{--                                Далее--}}
{{--                            </button>--}}
{{--                        @endif--}}



                    </div>


                </div>
            </div>
        </div>
        <!--modal-->

        <!-- Modal modalWorkouts5  -->
{{--        <div class="modal" id="modalWorkouts5" tabindex="-1" aria-labelledby="exampleModalCenterTitle"--}}
{{--             aria-hidden="true" style="margin-left: 15%;">--}}
{{--            <div class="modal-dialog modal-dialog-centered">--}}
{{--                <img src="{{asset('dist/images/girlb.png')}}" height="660" style="--}}
{{--    position: absolute;--}}
{{--    z-index: -100;--}}
{{--    margin-left: -420px;--}}
{{--    margin-top: 24px;">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title" id="exampleModalCenterTitle">Создание персональной программы</h5>--}}
{{--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                    </div>--}}

{{--                    <div class="modal-body">--}}
{{--                        <div class="row" style="height:510px; overflow: scroll;">--}}
{{--                            @foreach($rates as $rate)--}}
{{--                                <div class="col-xs-12 col-sm-6 mb-2">--}}
{{--                                    <div class="tarif_card card text-center">--}}
{{--                                        <p class="tarif-card-txt"><span class="tarif-head">{{$rate->name}}</span></p>--}}
{{--                                        <p class="tarif-price-txt"><span class="tarif-price">{{$rate->price}} ₽</span> /--}}
{{--                                            день</p>--}}
{{--                                        <p class="tarif-card-content">{{$rate->hint}}</p>--}}
{{--                                        <p class="tarif-card-content">Действует до:</p>--}}
{{--                                        <p class="tarif-card-date">27 февраля, 2023</p>--}}
{{--                                        <button type="submit"--}}
{{--                                                class="tarif-card-btn">Купить--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!--modal-->


    </form>

    <script>

        // Hide last popups
        function hidePopup(button_id, popup_id) {
            document.getElementById(button_id).addEventListener("click", hideLastPopup);
        
            function hideLastPopup() {
                document.getElementById(popup_id).style.display = "none";
            }
        }

        hidePopup("btn_modal_1", "modalWorkouts");
        hidePopup("btn_modal_2", "modalWorkouts2");
        hidePopup("btn_modal_3", "modalWorkouts3");
        hidePopup("btn_modal_4", "modalWorkouts4");

        // validate days of week for train

        // validate days of week for train
        var daysCountObject = document.getElementById("number_of_workouts_per_week_input_id");
        daysCountObject.addEventListener("keyup", daysCount);
        var dayFromInput = parseInt(daysCountObject.value);
        function daysCount(){
            dayFromInput =  parseInt(daysCountObject.value);
            dayTrigger();
        }

        var daySum = 0;
        if(parseInt(daysCountObject.value)){
            var daySum = parseInt(daysCountObject.value);
        } else{
            var daySum = 0;
        }

        function dayEventListener(day){
            var checkbox = document.getElementById(day);
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    daySum +=1;
                } else {
                    daySum -=1;
                }
                dayTrigger();
            })
        }
        function dayTrigger(){
            if(daySum === 5){
                disabledAllDays();
            }else{
                openAllDays();
            }
        }
        function disabledAllDays(){

            function openCheckbox(day){
                var checkbox = document.getElementById(day);
                if(checkbox.checked){
                    checkbox.disabled = false;
                } else {
                    checkbox.disabled = true;
                }
            }

            openCheckbox("monday");
            openCheckbox("tuesday");
            openCheckbox("wednesday");
            openCheckbox("thursday");
            openCheckbox("friday");
            openCheckbox("saturday");
            openCheckbox("sunday");

        }
        function openAllDays(){
            document.getElementById("monday").disabled = false;
            document.getElementById("tuesday").disabled = false;
            document.getElementById("wednesday").disabled = false;
            document.getElementById("thursday").disabled = false;
            document.getElementById("friday").disabled = false;
            document.getElementById("saturday").disabled = false;
            document.getElementById("sunday").disabled = false;
        }
        dayTrigger();
        dayEventListener("monday");
        dayEventListener("tuesday");
        dayEventListener("wednesday");
        dayEventListener("thursday");
        dayEventListener("friday");
        dayEventListener("saturday");
        dayEventListener("sunday");

    </script>
@endsection
