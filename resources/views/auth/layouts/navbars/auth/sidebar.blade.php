<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 mt-10" id="sidenav-main">


  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <span class="position-absolute top-3 d-block d-md-none" style="right: 10px" onclick="closeNav()">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
              <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
            </svg>
      </span>
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('progress') ? 'active':' ' }}" href="{{ route('progress') }}">
          <span class="nav-link-text ms-1">Мой прогресс</span>
        </a>
      </li>

    @if(Auth::user()->traffic == 'Premium+')
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('tools') ? 'active':' ' }}" href="{{ route('tools') }}">
          <span class="nav-link-text ms-1">Полезные инструменты</span>
        </a>
      </li>
    @endif

{{--    @if(Auth::user()->traffic == 'Premium+')--}}
{{--      <li class="nav-item">--}}
{{--        <a class="nav-link {{ request()->routeIs('consultations') ? 'active':' ' }}" href="{{ route('consultations') }}">--}}
{{--          <span class="nav-link-text ms-1">Мои консультации</span>--}}
{{--        </a>--}}
{{--      </li>--}}
{{--    @endif--}}

      {{-- <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('rates') ? 'active':' ' }}" href="{{ route('rates') }}">
          <span class="nav-link-text ms-1">Тарифы</span>
        </a>
      </li> --}}

    @if(Auth::user()->traffic == 'Premium+')
        <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('workouts') ? 'active':' ' }}" href="{{ route('workouts') }}">
          <span class="nav-link-text ms-1">Мои программы тренировок</span>
        </a>
      </li>
    @endif

    @if(Auth::user()->traffic == 'Premium+')
         <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('nutrition') ? 'active':' ' }}" href="{{ route('nutrition') }}">
          <span class="nav-link-text ms-1">Создать программу питания</span>
        </a>
      </li>
    @endif

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('training') ? 'active':' ' }}" href="{{ route('training') }}">
          <span class="nav-link-text ms-1">Дневник тренировок</span>
        </a>
      </li>

    @if(Auth::user()->traffic == 'Premium+')
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('food') ? 'active':' ' }}" href="{{ route('food') }}">
          <span class="nav-link-text ms-1">Дневник питания</span>
        </a>
      </li>
    @endif



      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('profile') ? 'active':' ' }}" href="{{ route('profile') }}">
          <span class="nav-link-text ms-1">Мои данные</span>
        </a>
      </li>

    </ul>
  </div>
</aside>
