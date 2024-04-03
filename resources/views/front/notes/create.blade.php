@extends('front.layouts.master')

@section('content')

    <form action="{{route('storeNote')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Başlık</label>
            <input type="text" name="title" class="form-control" id="title" >
             </div>
        <div class="form-group">
            <label for="content">İçerik</label>
            <textarea class="form-control" name="content" id="content" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Gönder</button>
    </form>


@endsection
