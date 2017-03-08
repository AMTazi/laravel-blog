@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add tag</div>
                <div class="panel-body form-group">
                    {!! Form::open(['url' => 'tags/']) !!}
                    @include('tags.partial',['action' => 'Add'])
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
    @include('errors.list')

@stop