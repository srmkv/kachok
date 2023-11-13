@extends('auth.layouts.app')


 <style>
        .card-body:hover {
            cursor: pointer;
            background: yellow;
        }
    </style>

<div class="container">
	<h1>Список документов</h1>
  <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
        	@foreach($documents as $document)
        	<a target="_blank" href="/doc/{{ $document->path }}">
            <div class="card mb-4" id="tools">
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#modalbzu">
                    <h5 class="tools-title">{{ $document->doc_name }}</h5>
                    <p class="tools-description">{{ $document->doc_opisanie }}</p>
                </div>
            </div>
       		 </a>
             @endforeach
           

        </div>
    </div>

    @include('auth.layouts.footers.auth.footer')
 </div>