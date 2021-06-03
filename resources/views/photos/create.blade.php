@extends('layouts.app')

@section('content')
    <h3>Upload Album</h3>
    {!! Form::open(['action' => 'App\Http\Controllers\PhotosController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
    {{ Form::text('title','',['placeholder'=>'Photo Title'])}}
    {{ Form::textarea('description','',['placeholder'=>'Photo Description'])}}
    {{Form::hidden('album_id',$album_id)}}
    {{ Form::file('photo') }}
    {{ Form::submit('Submit') }}
    {!! Form::close() !!}
@endsection
