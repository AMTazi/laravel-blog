@extends('layouts.app')


@section('content')

     <h1>Write New Post</h1>
     <hr>
     {!! Form::model($posts = new \App\Post() ,['url' =>'articles']) !!}

        @include('articles.partial',['submitText' => 'Add Post'])

     {!! Form::close() !!}

    @include('errors.list')

@stop
