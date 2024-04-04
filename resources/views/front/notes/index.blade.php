@extends('front.layouts.master')





@section('content')

    <a class="btn btn-success" href="{{route('createNote')}}"> Not oluştur </a>




    @if($notes->count() > 0)
        @foreach($notes as $note)
            <div class="card mt-3">
                <div class="card-header">
                    {{$note->title}}
                </div>
                <div class="card-body ">
                    {{$note->content}}
                </div>
            </div>


        @endforeach
    @else
        Kayıtlı Not Bulunmamaktadır

    @endif




@endsection

