@extends('auth.layouts.user_type.auth')
@section('page')
    Полезные инструменты
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">


            <div class="card mb-4" id="tools">
                <div class="card-body">
                    <h5 class="tools-title">Рабочий вес:</h5>
                    <p class="tools-description"> {{$weight}} кг</p>
                </div>
            </div>

        </div>
    </div>



@endsection




