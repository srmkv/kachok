@extends('auth.layouts.app')


 <style>
        .card-body:hover {
            cursor: pointer;
            background: yellow;
        }
    </style>

<div class="container">
    <h1>Обучение</h1>
  <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            @foreach($schools as $sch)
            
            <div class="card mb-4" id="tools">
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#modalbzu">
                    <h5 class="tools-title">{{ $sch->doc_name }}</h5>
                    <p class="tools-description">{{ $sch->doc_opisanie }}</p>
                    <div class="embed-responsive embed-responsive-16by9">
 
<video class="video-js" width="100%" height="300"  autoplay="false" preload="none" controls>
      <source src="{{URL::asset($sch->path)}}" type="video/mp4">
    Ваш браузер не поддерживает данный формат
</video>
</div>
                  
                </div>
            </div>
            
             @endforeach
           

        </div>
    </div>

    @include('auth.layouts.footers.auth.footer')
 </div>
 @section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var videos = document.querySelectorAll('.video-js');
        videos.forEach(function(video) {
            video.autoplay = false; // Отключаем автовоспроизведение для каждого видео
        });
    });
</script>
@endsection