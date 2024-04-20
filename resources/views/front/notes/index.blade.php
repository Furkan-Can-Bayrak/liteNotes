@extends('front.layouts.master')





@section('content')

    <a class="btn btn-dark" href="{{route('createNote')}}"> Not oluştur </a>

    <br>

    <h1>Notlar</h1>

    <br>

    @if($notes->count() > 0)
        @foreach($notes as $note)
            <div class="border-bottom shadow-sm p-3 mb-5 bg-body rounded-3 mb-3 p-3">
                <h2 class="fs-2 fw-bold"><a href="{{route('showNote',$note->id)}}" class="text-black text-decoration-none">{{$note->title}}</a></h2>
                <p class="mt-3">{{Str::limit($note->content,130)  }}</p>
               <span class="block fs-6 text-muted opacity-50"> {{$note->updated_at->diffForHumans()}}</span>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
        {{$notes->links()}}
        </div>

    @else
        Kayıtlı Not Bulunmamaktadır

    @endif




@endsection

