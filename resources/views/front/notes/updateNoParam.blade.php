@extends('front.layouts.master')





@section('content')

    <h1>Güncelleme sayfası</h1>


    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @elseif(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif




    <form action="{{route('editNoteNoParameter')}}" method="post">
        @csrf

        <input type="hidden" name="note_id" value="{{$note->id}}" >

        <div class="form-group">
            <label for="title">Başlık</label>
            <input type="text" name="title" value="{{$note->title}}" class="form-control" id="title" >
        </div>
        <div class="form-group">
            <label for="content">İçerik</label>
            <textarea class="form-control" name="content" id="content" rows="3">{{$note->content}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Gönder</button>
    </form>


@endsection

