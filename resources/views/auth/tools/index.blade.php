@extends('auth.layouts.user_type.auth')
@section('page')
    Полезные инструменты
@endsection
@section('content')
    <style>
        .card-body:hover {
            cursor: pointer;
            background: yellow;
        }
    </style>
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="card mb-4" id="tools">
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#modalbzu">
                    <h5 class="tools-title">Калькулятор расчета нормы потребления калорий и БЖУ</h5>
                    <p class="tools-description">Подсчет калорий и БЖУ. Правильный расчет количества калорий, белков, жиров и
                        углеводов для достижения целей (похудение,
                        набор или поддержание веса)</p>
                </div>
            </div>

            <div class="card mb-4" id="tools">
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#modalOperatingWeight">
                    <h5 class="tools-title">Рабочий вес</h5>
                    <p class="tools-description">Вычислить ваш рабочий вес в упражнениях</p>
                </div>
            </div>

            {{-- <div class="card mb-4" id="tools">
        <div class="card-body">
            <h5 class="tools-title">Вычислить пульс для кардио</h5>
            <p class="tools-description">Значения пульса и описание пульсовых зон</p>
        </div>
      </div>

      <div class="card mb-4" id="tools">
        <div class="card-body">
            <h5 class="tools-title">Идеальный вес</h5>
            <p class="tools-description">Идеальный вес тела</p>
        </div>
      </div> --}}

            <div class="card mb-4" id="tools">
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#modalWater">
                    <h5 class="tools-title">Расчет потребления воды</h5>
                    <p class="tools-description">Сколько воды нужно пить в день</p>
                </div>
            </div>


            {{-- <div class="card mb-4" id="tools">
        <div class="card-body">
            <h5 class="tools-title">Индекс массы тела</h5>
            <p class="tools-description">Калькулятор расчета индекса массы тела (имт) и идеального веса для женщин и мужчин с учетом возраста</p>
        </div>
      </div> --}}

            <div class="card mb-4" id="tools">
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#modalShtangWeight">
                    <h5 class="tools-title">Калькулятор для штанги</h5>
                    <p class="tools-description">Краткое описание калькулятора, буквально пара предложений</p>
                </div>
            </div>

        </div>
    </div>



    <!-- Modal modalbzu  -->
    <div class="modal fade" id="modalbzu" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Калькулятор расчета нормы потребления калорий и БЖУ
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('bzu.calc') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <select class="form-select" name="goal" aria-label="Default select example">
                                <option value="0.7"
                                    @isset($bjuParametres) {{ $bjuParametres->goal == 0.7 ? 'selected' : '' }} @endisset>
                                    Снижение веса</option>
                                <option value="1"
                                    @isset($bjuParametres) {{ $bjuParametres->goal == 1 ? 'selected' : '' }} @endisset>
                                    Поддержание веса</option>
                                <option value="1.3"
                                    @isset($bjuParametres) {{ $bjuParametres->goal == 1.3 ? 'selected' : '' }} @endisset>
                                    Набор массы</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="FormBZU" class="form-label">Вес сейчас</label>
                            <input type="number" step="0.1"
                                @isset($bjuParametres) value="{{ $bjuParametres->weight_now }}" @endisset
                                name="weight_now" class="form-control" id="#" placeholder="Вес сейчас">
                        </div>
                        <div class="mb-3">
                            <label for="FormBZU" class="form-label">Рост</label>
                            <input type="number" step="0.1"
                                @isset($bjuParametres) value="{{ $bjuParametres->height }}" @endisset
                                name="height" class="form-control" id="#" placeholder="Рост">
                        </div>
                        <div class="mb-3">
                            <label for="FormBZU" class="form-label">Возраст</label>
                            <input type="number"
                                @isset($bjuParametres) value="{{ $bjuParametres->age }}" @endisset
                                name="age" class="form-control" id="#" placeholder="Возраст">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="gender" aria-label="Default select example">
                                <option selected="">Пол</option>
                                <option value="men"
                                    @isset($bjuParametres) {{ $bjuParametres->gender == 'men' ? 'selected' : '' }} @endisset>
                                    Мужчина</option>
                                <option value="women"
                                    @isset($bjuParametres) {{ $bjuParametres->gender == 'women' ? 'selected' : '' }} @endisset>
                                    Женщина</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <p class="calculate-h">Активность</p>
                        </div>
                        <div class="mb-3">
                            <input class="form-check-input calculate-check"
                                @isset($bjuParametres) {{ $bjuParametres->activity == 1.2 ? 'checked' : '' }} @endisset
                                name="activity" type="radio" value="1.2" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Практически полное отсутствие
                                активности</label>
                            <p class="calculate-p">Сюда относятся люди с сидячим образом жизни, не занимающиеся спортом. .
                            </p>
                        </div>
                        <div class="mb-3">
                            <input class="form-check-input calculate-check"
                                @isset($bjuParametres) {{ $bjuParametres->activity == 1.375 ? 'checked' : '' }}@endisset
                                name="activity" type="radio" value="1.375" id="flexCheckDefault2">
                            <label class="form-check-label" for="flexCheckDefault2">Слабая активность</label>
                            <p class="calculate-p">Это либо сидячий образ жизни в купе с небольшими тренировками 1-3 раза в
                                неделю,
                                либо занятия, требующие регулярной длительной ходьбы. </p>
                        </div>
                        <div class="mb-3">
                            <input class="form-check-input calculate-check"
                                @isset($bjuParametres) {{ $bjuParametres->activity == 1.55 ? 'checked' : '' }}@endisset
                                name="activity" type="radio" value="1.55" id="flexCheckDefault3">
                            <label class="form-check-label" for="flexCheckDefault3">Средняя активность</label>
                            <p class="calculate-p">Этот коэффициент выбирают те, кто занимается спортом 3-4 раза в неделю
                                по 30-60 минут. </p>
                        </div>
                        <div class="mb-3">
                            <input class="form-check-input calculate-check"
                                @isset($bjuParametres) {{ $bjuParametres->activity == 1.7 ? 'checked' : '' }}@endisset
                                name="activity" type="radio" value="1.7" id="flexCheckDefault4">
                            <label class="form-check-label" for="flexCheckDefault4">Высокая активность</label>
                            <p class="calculate-p">Это ежедневные или практически ежедневные тренировки, либо занятость
                                в сфере строительства, сельского хозяйства и т.д. </p>
                        </div>
                        <div class="mb-3">
                            <input class="form-check-input calculate-check"
                                @isset($bjuParametres) {{ $bjuParametres->activity == 1.9 ? 'checked' : '' }}@endisset
                                name="activity" type="radio" value="1.9" id="flexCheckDefault5">
                            <label class="form-check-label" for="flexCheckDefault5">Экстремальная активность</label>
                            <p class="calculate-p">Сюда относятся спортсмены с ежедневными многоразовыми тренировками и
                                люди
                                с длительным рабочим днем, например, в угольных шахтах. </p>
                        </div>
                        <div class="mb-3">
                            <label for="FormBZU" class="form-label">Желаемый вес</label>
                            <input type="number" step="0.1"
                                @isset($bjuParametres) value="{{ $bjuParametres->desired_weight }}" @endisset
                                name="desired_weight" class="form-control" id="#" placeholder="Желаемый вес">
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

    <!-- Modal modalWater  -->
    <div class="modal fade" id="modalWater" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Калькулятор расчета нормы потребления воды</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('water.calc') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="FormBZU" class="form-label">Рост</label>
                            <input type="number" step="0.1"
                                @isset($waterParametres) value="{{ $waterParametres->height }}" @endisset
                                name="height" class="form-control" id="#" placeholder="Рост">
                        </div>
                        <div class="mb-3">
                            <label for="FormBZU" class="form-label">Время активности (в часах) </label>
                            <input type="number" step="0.25"
                                @isset($waterParametres) value="{{ $waterParametres->active_time }}" @endisset
                                name="active_time" class="form-control" id="#" placeholder="(в часах)">
                        </div>
                        <div class="mb-3">
                            <label for="FormBZU" class="form-label">Пол </label>
                            <select class="form-select" name="gender" aria-label="Default select example">
                                <option value="men"
                                    @isset($waterParametres) {{ $waterParametres->gender == 'men' ? 'selected' : '' }} @endisset>
                                    Мужчина</option>
                                <option value="women"
                                    @isset($waterParametres) {{ $waterParametres->gender == 'women' ? 'selected' : '' }} @endisset>
                                    Женщина</option>
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


    <!-- Modal modalOperatingWeight  -->
    <div class="modal fade" id="modalOperatingWeight" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Калькулятор расчета рабочего веса </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('operating.weight.calc') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="FormBZU" class="form-label">Одноповторный максимум (кг)</label>
                            <input type="number" step="1" name="weight" class="form-control" id="#"
                                placeholder="10кг">
                        </div>
                        <p>
                            Одноповторный максимум - это вес в котором ты может сделать 1 чистый повтор.
                        </p>
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

    <!-- Modal modalShtangWeight  -->
    <div class="modal fade" id="modalShtangWeight" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Калькулятор штанги</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="shtangWeight" class="form-label">Вес (кг)</label>
                        <input type="number" step="1" min="0" max="1000" name="weight"
                            class="form-control" id="shtang_weight_input" placeholder="100" />
                    </div>

                    <div id="buttons">
                        <div class="mb-3">
                            <label for="">Гриф </label>
                            <div class="grifi-weight calc-button">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Блины </label>
                            <div class="blini-weight calc-button">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 text-center">
                        <div class="text-lg">
                            <span id="grif_weight">0</span>
                            <span>КГ ГРИФ</span>
                        </div>
                        <div class="grey">+ блины на каждой стороне:</div>
                        <div id="blini_weight"></div>
                    </div>
                </div>

                <script>
                    let grif_weight = 0;
                    let blini_weight = null;
                    let shtang_weight = null;
                    let barbell = @json($barbell);

                    let grif_weights = barbell.filter(b => b.type === 2).map(b => b.kg);
                    let blin_weights = barbell.filter(b => b.type === 1).map(b => b.kg);
                    let blin_weights_disabled = [];
                    let blin_colors = ['#5D9B9B', '#77DD77', '#E4717A', '#FCE883', '#A18594', '#E6E6FA', ' #3EB489', '#FFE4C4', '#DDE4C4']

                    let shtang_weight_input = document.querySelector('#shtang_weight_input')
                    let grif_weight_spot = document.querySelector('#grif_weight')
                    let blini_weight_spot = document.querySelector('#blini_weight')
                    let buttons_spot = document.querySelector('#buttons');
                    let grifi_btns = buttons_spot.querySelector('.grifi-weight');
                    let blini_btns = buttons_spot.querySelector('.blini-weight');

                    let initCalc = () => {
                        addButtons(grifi_btns, grif_weights, ['btn', 'btn-weight', 'disable', 'color'])
                        addButtons(blini_btns, blin_weights, ['btn', 'btn-weight', 'color'])
                    }

                    let addButtons = (spot, weights, classList) => {
                        for (let i = 0; i < weights.length; i++) {
                            let kg = document.createElement('button')
                            kg.innerText = weights[i]
                            if (weights[i] == 0) {
                                classList = classList.filter(c => c != 'disable')
                            }
                            kg.classList.add(...classList)
                            if (classList.includes('color')) {
                                kg.style.backgroundColor = blin_colors[i]
                            }
                            spot.append(kg);
                        }
                    }

                    let setWeight = () => {
                        grif_weight_spot.innerText = grif_weight

                        if (shtang_weight > 0) {
                            blini_weight = (shtang_weight - grif_weight) / 2
                            blini_weight_spot.innerText = ''
                            if (blini_weight > 0) {
                                let coef = 3;
                                let size = 50;
                                let blins = getBlins(blini_weight);
                                if (!blins.length)
                                    blini_weight_spot.innerText = 'Расчет математически невозможен, необходимо изменить вес'
                                let blinsHtml = document.createElement('div');
                                for (let i = 0; i < blins.length; i++) {
                                    let blin = document.createElement('div')
                                    blin.classList.add('blin')
                                    blin.style.width = blins[i][0] * coef + size + 'px';
                                    blin.style.height = blins[i][0] * coef + size + 'px';
                                    blin.style.backgroundColor = blins[i][2]
                                    blin.innerText = blins[i][1] > 1 ?
                                        blins[i][1] + 'x' + blins[i][0] + 'кг' :
                                        blins[i][0] + 'кг';
                                    blinsHtml.append(blin)
                                }
                                blini_weight_spot.append(blinsHtml)
                            } else {
                                blini_weight_spot.innerText = ''
                            }
                        }
                    }

                    let getBlins = (weight) => {
                        let blini = []
                        for (let i = 0; i < blin_weights.length; i++) {
                            if (blin_weights_disabled.includes(blin_weights[i].toString())) {
                                continue
                            }

                            let kg = blin_weights[i]
                            let blin_qty = parseInt(weight / kg)
                            weight = weight % kg
                            if (blin_qty) {
                                blini.push([kg, blin_qty, blin_colors[i]])
                            }
                            if (!weight) {
                                break
                            }
                        }
                        return blini
                    }

                    initCalc()

                    buttons_spot.addEventListener('click', (btn) => {
                        if (btn.target.nodeName == 'BUTTON') {
                            if (btn.target.parentElement.classList.contains('grifi-weight')) {

                                if (active = btn.target.parentElement.querySelector(':not(.disable)')) {
                                    active.classList.add('disable')
                                }
                                grif_weight = btn.target.innerText
                                btn.target.classList.remove('disable')

                            } else if (btn.target.parentElement.classList.contains('blini-weight')) {
                                btn.target.classList.toggle('disable')
                                if (blin_weights_disabled.includes(btn.target.innerText)) {
                                    blin_weights_disabled = blin_weights_disabled.filter(b => b !== btn.target.innerText)
                                } else {
                                    blin_weights_disabled.push(btn.target.innerText)
                                }
                            }

                            setWeight()

                        }

                    })

                    shtang_weight_input.addEventListener('input', (input) => {
                        shtang_weight = input.target.value
                        setWeight()
                    })
                </script>

                <style>
                    .calc-button .btn {
                        padding-left: 5px;
                        padding-right: 5px;
                        margin-left: 2px;
                        margin-right: 2px;
                        min-width: 40px;
                    }

                    #buttons .disable {
                        opacity: .5;
                    }

                    #blini_weight>div {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        padding: 30px 0 0;
                    }

                    #blini_weight .blin {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 50%;
                        margin: 0 3px
                    }
                </style>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    {{-- <button type="submit" class="btn btn-form">Сохранить</button> --}}
                </div>
            </div>
        </div>
    </div>
    <!--modal-->
@endsection
