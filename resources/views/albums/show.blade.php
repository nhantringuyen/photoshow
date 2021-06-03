@extends('layouts.app')

@section('content')
    <h1>{{$album->name}}</h1>
    <a class="button secondary" href="/">{{__("Go Back")}}</a>
    <a class="button" href="/photos/create/{{$album->id}}">{{__("Upload Photo To Album")}}</a>
    <hr>

    @if(count($album->photos) > 0)
        <?php
        $colcount = count($album->photos);
        $i = 1;
        ?>
        <div id="photo">
            <div class="row text-center">
                @foreach($album->photos as $photo)
                    @if($i == $colcount)
                        <div class='medium-4 columns end'>
                            <a href="/photos/{{$photo->id}}">
                                <img class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
                            </a>
                            <br>
                            <h4>{{$album->title}}</h4>
                    @else
                        <div class='medium-4 columns'>
                            <a href="/photos/{{$photo->id}}">
                                <img class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
                            </a>
                            <br>
                            <h4>{{$album->title}}</h4>
                        </div>
                    @endif
                        @if(($i-1) % 3 == 0 && $i > 1)
                            </div><div class="row text-center">
                        @endif
                    <?php $i++; ?>
                @endforeach
            </div>
        </div>
    @else
        <p>No Albums To Display</p>
    @endif
@endsection
