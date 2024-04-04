@extends('front.layouts.master')





@section('content')

    <a class="btn btn-success" href="{{route('createNote')}}"> Not oluştur </a>




    @if($notlar->count() > 0)
        @foreach($notes as $note)
            <div class="card mt-3">
                <div class="card-header">
                    {{$note->title}}
                </div>
                <div class="card-body ">
                    {{$note->content}}
                </div>
            </div>

            @else
                Kayıtlı Not Bulunmamaktadır
        @endforeach


    @endif




@endsection

