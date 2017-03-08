@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{$tags->name}}</div>
                <div class="panel-body form-group">
                    {!! Form::model($tags,['method' => 'PATCH' , 'action' =>['TagsController@update',$tags->id]]) !!}
                    @include('tags.partial',['action' => 'UPDATE'])
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
     @include('errors.list')
@stop