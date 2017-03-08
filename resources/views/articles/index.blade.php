@extends('layouts.app')


@section('content')
    @include('errors.list')

    <div class="row">
        <a href="{{url('./articles/create')}}" class="btn btn-success pull-right" > Add Article</a>
    </div>
        <article>
            @foreach($posts as $post)
                <div class="col-sm-9">
                  <h1><a href="{{url('/articles',[$post->id])}}">{{$post->title}}</a> </h1>
                  <i>{{date("H-i-s", strtotime($post->created_at))}}</i>
                  <p>{{$post->body}}</p>
                </div>
                <div class="col-sm-1">
                    <a href="{{url('./articles/'.$post->id.'/edit')}}" class="text-primary">Edit</a>
                </div>
                <div class="col-sm-2">
                    {!! Form::open(['method' =>'DELETE' , 'action'=>['PostsController@destroy',$post->id]]) !!}

                    {!! Form::submit('DELETE',['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>

                <hr>

            @endforeach

        </article>



@stop




