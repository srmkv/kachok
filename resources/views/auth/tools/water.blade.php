@extends('auth.layouts.user_type.auth')
@section('page')
    Полезные инструменты
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">


            <div class="card mb-4" id="tools">
                <div class="card-body">
                    <h5 class="tools-title">День тренировки</h5>
                    <p class="tools-description"> {{$water['water_with_train']}} мл</p>
                </div>
            </div>

            <div class="card mb-4" id="tools">
                <div class="card-body">
                    <h5 class="tools-title">День без тренировки</h5>
                    <p class="tools-description"> {{$water['water_without_train']}} мл</p>
                </div>
            </div>

            <div class="card mb-4" id="tools">
                <div class="card-body">
                    <h5 class="tools-title">
                        В расчетах не учитывается объем жидкости, куда входит вода, чай, кофе, компот, супы, соки (и фрукты).
                        И еще важные моменты, которые надо учитывать при расчете:
                    </h5>
                    <p class="tools-description">
                        — Алкоголь, а также сладкие газированные напитки приравниваются не к жидкости, а к еде.
                    </p>
                    <p class="tools-description">
                        — При некоторых заболеваниях, например, при патологии почек, гипертонии, сердечной недостаточности, врач может порекомендовать другой объем воды.
                    </p>
                    <p class="tools-description">
                        — При ОРВИ и обострении инфекционных заболеваниях пить надо больше.
                    </p>
                    <p class="tools-description">
                        — Кофе способствует выведению жидкости, поэтому любителям кофе рекомендуется увеличить количество выпиваемой воды.
                    </p>
                </div>
            </div>

            <div class="card mb-4" id="tools">
                <div class="card-body">
                    <p class="tools-description"> Результат расчета имеет погрешность и носит ознакомительный характер, для точного расчета потребление жидкости необходимо проконсультироваться с лечащим врачом.</p>
                </div>
            </div>

        </div>
    </div>



@endsection




