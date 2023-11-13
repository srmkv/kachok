@extends('auth.layouts.user_type.auth')
@section('page')
    Полезные инструменты
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">


            <div class="card mb-4" id="tools">
                <div class="card-body">
                    <h5 class="tools-title">Расчет потребления калорий</h5>
                    <p class="tools-description"> {{$kkal}} ккал</p>
                </div>
            </div>

            <div class="card mb-4" id="tools">
                <div class="card-body">
                    <h5 class="tools-title">Расчет потребления белка</h5>
                    <p class="tools-description"> {{$bzu['protein']}} г. белка</p>
                </div>
            </div>

            <div class="card mb-4" id="tools">
                <div class="card-body">
                    <h5 class="tools-title">Расчет потребления жиров</h5>
                    <p class="tools-description"> {{$bzu['fat']}} г. жиров</p>
                </div>
            </div>

            <div class="card mb-4" id="tools">
                <div class="card-body">
                    <h5 class="tools-title">Расчет потребления углеводов</h5>
                    <p class="tools-description"> {{$bzu['carbohydrate']}} г. углеводов</p>
                </div>
            </div>

        </div>
    </div>



@endsection




