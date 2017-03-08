@extends('layouts.app')


@section('content')
    <article>
        <h1>{{$posts->title}}</h1>
        <p>{{$posts->body}}</p>
        @unless($posts->tags->isEmpty())
            <h4>Tags</h4>
            <ul>
                @foreach($posts->tags as $tag)
                    <li>{!! link_to_action('TagsController@show' , $tag->name , [$tag->id]) !!}</li>
                @endforeach
            </ul>
        @endunless
    </article>


@stop