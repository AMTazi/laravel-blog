<div class="form-group">
    {!! Form::label('title' ,'Title :') !!}
    {!! Form::text('title' ,null,['class' => 'form-control col-sm-6']) !!}
</div>
<div class="form-group">
    {!! Form::label('body' ,'Content :') !!}
    {!! Form::textarea('body' ,null,['class' => 'form-control col-sm-6']) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at' ,'Published On :') !!}
    {!! Form::input('date' , 'published_at', $posts->published_at,['class' => 'form-control col-sm-6']) !!}
</div>
<div class="form-group">
    {!!  Form::label('tag_list' ,'Tags :') !!}
    {!!  Form::select('tag_list[]' ,$tags ,null,['id' =>'tag_list','class' => 'form-control col-sm-6 select' ,'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitText ,['class' => 'btn btn-primary form-control']) !!}
</div>

@include('errors.list')