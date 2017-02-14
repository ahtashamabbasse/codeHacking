@extends('layouts.admin')
@section('title')
    Create Post
@endsection
@section('subDesc')
    Fill All the Fields to Create the New Post
@endsection

@section('content')
    {!! Form::open(['route'=>"admin.post.store","class"=>"form-horizontal","files"=>"true"]) !!}

    <div class="form-group {{$errors->has('title')?'has-error':''}}">
        {!! Form::label("title","Title : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
        <div class="col-sm-9">
            {!! Form::text('title',null,['class'=>"col-xs-10 col-sm-5","Placeholder"=>"Enter User Name" ,"required"=>"required"]) !!}
            <span class="help-block">{{$errors->first("title")}}</span>
        </div>
    </div>

    <div class="form-group {{$errors->has('category_id')?'has-error':''}}">
        {!! Form::label("category_id","Category : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
        <div class="col-sm-9">
            {!! Form::select('category_id',[''=>"Option",'1'=>"all"],null,['class'=>"col-xs-10 col-sm-5","Placeholder"=>"Enter an Email Address"]) !!}
            <span class="help-block">{{$errors->first("category_id")}}</span>
        </div>
    </div>

    <div class="form-group {{$errors->has('photo_id')?'has-error':''}}">
        {!! Form::label("photo_id","Photo : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
        <div class="col-sm-9">
            {!! Form::file('photo_id',null,['class'=>"col-xs-10 col-sm-5","required"=>"required"]) !!}
            <span class="help-block">{{$errors->first("photo_id")}}</span>
        </div>
    </div>
    <div class="form-group {{$errors->has('body')?'has-error':''}}">
        {!! Form::label("body","Body: ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
        <div class="col-sm-9">
            {!! Form::textarea('body',null,['class'=>"col-xs-10 col-sm-5","Placeholder"=>"Enter Body of the post" ,"required"=>"required","rows"=>3]) !!}
            <span class="help-block">{{$errors->first("body")}}</span>
        </div>
    </div>

    <div class="form-group  ">
        <div class="col-sm-9">
            {!! Form::submit('Create Post',['class'=>"btn btn-success pull-right"]) !!}
        </div>
    </div>

    {!! Form::close() !!}

@endsection