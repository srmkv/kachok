@extends('auth.layouts.user_type.auth')
@section('page')
    Дневник питания
@endsection
@section('content')



    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">

            @foreach($days as $day)

                <a href="{{route('food.day',$day->id)}}">
                    <div class="card mb-4" id="tools">
                        <div class="card-body">
                            <h3 class="tools-title"> {{date("d.m.Y", strtotime($day->date))}} г.</h3>
                            <p class="tools-description">
                                {{ $energy->energy }} ККАЛ
                            </p>
                            <p class="tools-description">
                                {{ $energy->protein }} г. белка
                                {{ $energy->fat }} г. жиров
                                {{ $energy->carbohydrate }} г. углеводов
                            </p>
                        </div>
                    </div>
                </a>

            @endforeach


        </div>
    </div>


    <!-- Modal modalDayForFood  -->
    <div class="modal fade" id="modalDayForFood" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Добавить день</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('DayForFood.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="FormWeight" class="form-label">ККАЛ</label>
                            <input type="number" name="kkal" class="form-control" id="FormWeight" placeholder="kkal">
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

@endsection
