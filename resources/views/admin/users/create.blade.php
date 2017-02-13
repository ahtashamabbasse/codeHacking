@extends('layouts.admin')
@section('title')
    Create User
@endsection
@section('subDesc')
    Fill All the Fields to Create the New User
@endsection

@section('content')
            {!! Form::open(['route'=>"admin.user.store","class"=>"form-horizontal","files"=>"true"]) !!}

        <div class="form-group {{$errors->has('name')?'has-error':''}}">
                {!! Form::label("name","Name : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
                <div class="col-sm-9">
                    {!! Form::text('name',null,['class'=>"col-xs-10 col-sm-5","Placeholder"=>"Enter User Name" ,"required"=>"required"]) !!}
                    <span class="help-block">{{$errors->first("name")}}</span>
                </div>
        </div>

        <div class="form-group {{$errors->has('email')?'has-error':''}}">
            {!! Form::label("name","Email : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
            <div class="col-sm-9">
                {!! Form::email('email',null,['class'=>"col-xs-10 col-sm-5","Placeholder"=>"Enter an Email Address","required"=>"required"]) !!}
                <span class="help-block">{{$errors->first("email")}}</span>
            </div>
        </div>

    <div class="form-group {{$errors->has('password')?'has-error':''}}">
        {!! Form::label("name","Passwords : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
        <div class="col-sm-9">
            {!! Form::password('password',["type"=>"password",'class'=>"col-xs-10 col-sm-5","Placeholder"=>"Enter the Password" ,"required"=>"required"]) !!}
            <span class="help-block">{{$errors->first("password")}}</span>
        </div>
    </div>

    <div class="form-group {{$errors->has('password')?'has-error':''}}">
        {!! Form::label("password_confirmation","Confirm Password : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
        <div class="col-sm-9">
            {!! Form::password('password_confirmation',['class'=>"col-xs-10 col-sm-5","Placeholder"=>"Enter the Confirm Password" ,"required"=>"required"]) !!}
            <span class="help-block">{{$errors->first("password")}}</span>
        </div>
    </div>

    <div class="form-group {{$errors->has('role_id')?'has-error':''}}">
            {!! Form::label("role_id","Role : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
            <div class="col-sm-9">
                {!! Form::select('role_id',[''=>"Chose Options"]+$roles,null,['class'=>" col-xs-10 col-sm-5","required"=>"required"]) !!}
                <span class="help-block">{{$errors->first("role_id")}}</span>
            </div>
    </div>

    <div class="form-group {{$errors->has('status')?'has-error':''}}">
            {!! Form::label("status","Status : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
            <div class="col-sm-9">
                {!! Form::select('status',[""=>"Select Status","0"=>"Not Active","1"=>"Active"],0,['class'=>"col-xs-10 col-sm-5","Placeholder"=>"Name" ,"required"=>"required"]) !!}
                <span class="help-block">{{$errors->first("status")}}</span>
            </div>
    </div>
    <div class="form-group {{$errors->has('name')?'has-error':''}}">
                    {!! Form::label("photo_id","Photo: ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
                    <div class="col-sm-9">
                        {!! Form::file('photo_id',['class'=>"col-xs-10 col-sm-5","Placeholder"=>"Enter User Name" ,"required"=>"required"]) !!}
                        <span class="help-block">{{$errors->first("photo")}}</span>
                    </div>
    </div>
    <div class="form-group  ">
        <div class="col-sm-9">
            {!! Form::submit('Create User',['class'=>"btn btn-success pull-right"]) !!}
        </div>
    </div>

    {!! Form::close() !!}

@endsection