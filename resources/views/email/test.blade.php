@component('mail::message')
    # Добро пожаловать
    Дорогой {{$data}},
    @component('mail::button', ['url' => 'http://protrenerovki.ru/'])
        Cайт
    @endcomponent
    Спасибо,<br>
    {{ config('app.name') }}
@endcomponent
