@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="row">
                         <div class="col-xs-12">
                             Tags
                             <a href="{{action('TagsController@create')}}" class="btn btn-success pull-right">Add Tag</a>
                         </div>
                      </div>
                    </div>
                    @foreach($tags as $tag)
                    <div class="panel-body">
                        <h2 class="col-sm-8"><a href="{{action('TagsController@show',[$tag->id])}}">{{$tag->name}}</a></h2>
                        @if(Auth::user())
                            <div class="col-sm-2">
                                {!! Form::open(['method' => 'DELETE',"action" => ['TagsController@destroy',$tag->id]]) !!}
                                {!! Form::submit('DELETE',['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-sm-2"><a href="{{action('TagsController@edit' , [$tag->id])}}" class="btn btn-info">EDIT</a></div>
                        @endif

                    </div>
                        <hr>

                    @endforeach

                </div>
            </div>
        </div>

@stop