@extends('front.layouts.master')

@section('content')

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




    <form action="{{route('storeNote')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Başlık</label>
            <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" >
            @error('title')
                {{$message}}
            @enderror
             </div>
        <div class="form-group">
            <label for="content">İçerik</label>
            <textarea class="form-control" name="content" id="content" rows="3">{{old('content')}}</textarea>
            @error('content')
            {{$message}}
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-2">Gönder</button>
    </form>


@endsection
