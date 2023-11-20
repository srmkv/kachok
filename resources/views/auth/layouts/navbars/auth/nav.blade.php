<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
       <div class="d-flex align-items-center">
               <p class="head-txt"> @yield('page')</p>
       </div>
        <div class="d-block d-md-none" onclick="openNav()">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </div>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">

            <div class="ms-md-3 pe-md-3 d-flex align-items-center">
            {{-- <div class="input-group">
               <span class="tarif-txt">
                   <span class="tarif-head">{{auth()->user()->traffic}}</span>
                   до 27 февраля, 2023
               </span>
            </div> --}}
            <div class="avatar avatar-xl position-relative">
                      <a href="/user/profile" > <img
                            @if(Auth::user()->photo)
                            src="{{asset('photo/'.Auth::user()->photo)}}"
                            @else
                            src="{{asset('assets/img/team-2.jpg')}}"
                            @endif
                            alt="..." class="w-100 border-radius-lg shadow-sm">
                          </a>
                    </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <a href="{{ route('logout') }}" class="nav-link text-body font-weight-bold px-0"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">Выйти</span>
                </a>
            </li>


            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->

  <!-- Modal Новая цель -->
  <div class="modal fade" id="modaltarget" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Новая цель</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{route('statistics.store')}}" method="post" enctype="multipart/form-data">
          @csrf
      <div class="modal-body">
        <div class="mb-3">
          <label for="ForNameStatistics" class="form-label">Названия графика</label>
          <select class="form-control" name="name" id="ForNameStatistics">
            @php
              $objectives = App\Models\Objective::all();
            @endphp
            @foreach ($objectives as $obj)
              <option value="{{ $obj->name_obj }}">{{ $obj->name_obj }}</option>
            @endforeach
          </select>
          
        </div>
       {{-- <div class="mb-3">
         <label for="ForNameStatistics" class="form-label">Названия графика</label>
          <input type="text" name="name" class="form-control" id="ForNameStatistics" placeholder="Названия графика">
        </div>
      
        <div class="mb-3">
         <label for="ForVariable" class="form-label">Переменная</label>
          <input type="text" name="variable" class="form-control" id="ForVariable" placeholder="Переменная">
        </div> --}}
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

  <!-- Modal modalImage  -->
  <div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Новое фото</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{route('photo.store')}}" method="post" enctype="multipart/form-data">
          @csrf
      <div class="modal-body">
       <div class="mb-3">
         <label for="FormImage" class="form-label">фото</label>
           <input type="hidden" name="type" value="single" >
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

  <!-- Modal modalImageAfter  -->
  <div class="modal fade" id="modalImageAfter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Новое фото</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{route('photo.store')}}" method="post" enctype="multipart/form-data">
          @csrf
      <div class="modal-body">
       <div class="mb-3">
         <label for="FormImage" class="form-label">фото</label>
           <input type="hidden" name="type" value="after" >
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



 <!-- Modal modalImageBefore  -->
  <div class="modal fade" id="modalImageBefore" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Новое фото</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{route('photo.store')}}" method="post" enctype="multipart/form-data">
          @csrf
      <div class="modal-body">
       <div class="mb-3">
         <label for="FormImage" class="form-label">фото</label>
           <input type="hidden" name="type" value="before" >
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

<!-- Modal modalWeight  -->
  <div class="modal fade" id="modalWeight" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Вес</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{route('weight.store')}}" method="post" enctype="multipart/form-data">
          @csrf
      <div class="modal-body">
       <div class="mb-3">
         <label for="FormWeight" class="form-label">Вес</label>
          <input type="number" name="weight" class="form-control" id="FormWeight" placeholder="Вес">
        </div>
          <div class="mb-3">
         <label for="ForDate" class="form-label">Дата</label>
          <input type="date" name="date" class="form-control" id="ForDate" placeholder="Дата">
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

<!-- Modal modalWaist  -->
  <div class="modal fade" id="modalWaist" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Обхват талии</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{route('waist.store')}}" method="post" enctype="multipart/form-data">
          @csrf
      <div class="modal-body">
       <div class="mb-3">
         <label for="FormWeight" class="form-label">Обхват талии</label>
          <input type="number" name="waist" class="form-control" id="FormWeight" placeholder="Сантиметры">
        </div>
       <div class="mb-3">
         <label for="ForDateWaist" class="form-label">Дата</label>
          <input type="date" name="date" class="form-control" id="ForDateWaist" placeholder="Дата">
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



@isset($statistic)
<!-- Modal modalWaist  -->
  <div class="modal fade" id="modalStatistic" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">{{$statistic->variable}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{route('value.store')}}" method="post" enctype="multipart/form-data">
          @csrf
      <div class="modal-body">
       <div class="mb-3">
         <label for="FormWeight" class="form-label">{{$statistic->variable}}</label>
          <input type="number" name="value" class="form-control" id="FormWeight" placeholder="Ед.изм">
        </div>
       <div class="mb-3">
         <label for="ForDateWaist" class="form-label">Дата</label>
          <input type="date" name="date" class="form-control" id="ForDateWaist" placeholder="Дата">
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
@endisset

 <!-- Modal modalProfilPhoto  -->
  <div class="modal fade" id="modalProfilPhoto" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Новое фото</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{route('profile.photo.store')}}" method="post" enctype="multipart/form-data">
          @csrf
      <div class="modal-body">
       <div class="mb-3">
         <label for="FormImage" class="form-label">фото</label>
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


