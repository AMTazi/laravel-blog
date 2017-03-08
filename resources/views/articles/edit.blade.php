@extends('layouts.app')

@section('content')

    <h1>Update {{$posts->title}}</h1>
    <hr>
    {!! Form::model($posts,['method' => 'PATCH','action' =>['PostsController@update',$posts->id]]) !!}

    @include('articles.partial',['submitText' => 'Update Post'])

    {!! Form::close() !!}


    @include('errors.list')

@stop


