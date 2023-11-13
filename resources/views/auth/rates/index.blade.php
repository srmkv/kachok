@extends('auth.layouts.user_type.auth')
@section('page')
    Тарифы
@endsection
@section('content')
<div class="row">

    @foreach($rates as $rate)

          <div class="col-xs-12 col-sm-3 mb-2">
              <div class="tarif_card card text-center">
                <p class="tarif-card-txt"><span class="tarif-head">{{$rate->name}}</span></p>
                <p class="tarif-price-txt"><span class="tarif-price">{{$rate->price}} ₽</span> / день</p>
                <p class="tarif-card-content">{{$rate->hint}}</p>
                <p class="tarif-card-content">Действует до:</p>
                <p class="tarif-card-date">27 февраля, 2023</p>
                <a href="{{route('rates.change', $rate->id )}}" class="tarif-card-btn">Купить</a>
              </div>
            </div>
    @endforeach


</div>

@endsection




