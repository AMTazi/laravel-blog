@extends('layouts.app')

@section('content')

    <h1>{{$tags->name}}</h1>
    <hr>
    <article>
        <div class="col-sm-10">
            @unless($posts->isEmpty())
                <h4>Tags</h4>
                <ul>
                    @foreach($posts as $post)
                        <h1>{!! link_to_action('PostsController@show' ,$post->title,[$post->id]) !!} </h1>
                        <i>{{date("H-i-s", strtotime($post->created_at))}}</i>
                        <p>{{$post->body}}</p>
                    @endforeach
                </ul>
            @endunless
           
        </div>
    </article>
    @include('errors.list')

@stop