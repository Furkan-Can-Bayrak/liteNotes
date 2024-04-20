@extends('front.layouts.master')

@section('content')



    <div class="d-flex justify-content-between align-items-center">
        <h1>Detay Sayfası</h1>

        <button class="btn btn-primary">Güncelle</button>
    </div>

    <br>

    <div class="bg-white p-3 rounded-3">
        <h2>{{$note->title}}</h2>
        <hr>
        <p>{{$note->content}}</p>
        <span class="text-muted">{{$note->updated_at->diffForHumans()}}</span>

    </div>

@endsection
