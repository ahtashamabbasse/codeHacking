@extends('layouts.admin')
@section('title')
    Edit User
@endsection
@section('content')

        <div class="col-sm-3">
            <img src="{{$user->photo->photo}}" class="pull-right img-responsive img-thumbnail"  height="200px"  alt="">
        </div>
        <div class="col-sm-9">
            {!! Form::model($user,["method"=>"patch",'route'=>["admin.user.update",$user->id],"class"=>"form-horizontal","files"=>"true"]) !!}

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
                    {!! Form::password('password',["type"=>"password",'class'=>"col-xs-10 col-sm-5","Placeholder"=>"Enter the Password","required"=>"required"]) !!}
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
                {!! Form::label("is_active","Status : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
                <div class="col-sm-9">
                    {!! Form::select('is_active',[""=>"Select Status","0"=>"Not Active","1"=>"Active"],$user->is_active,['class'=>"col-xs-10 col-sm-5","required"=>"required"]) !!}
                    <span class="help-block">{{$errors->first("status")}}</span>
                </div>
            </div>
            <div class="form-group {{$errors->has('name')?'has-error':''}}">
                {!! Form::label("photo_id","Photo: ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
                <div class="col-sm-9">
                    {!! Form::file('photo_id',['class'=>"col-xs-10 col-sm-5","Placeholder"=>"Enter User Name" ]) !!}
                    <span class="help-block">{{$errors->first("photo")}}</span>
                </div>

            </div>

                <div class="col-sm-9">
                    {!! Form::submit('Update User',['class'=>"btn btn-success col-sm-6"]) !!}
                </div>
        {!! Form::close() !!}
        {!! Form::open(["method"=>"DELETE","route"=>["admin.user.destroy",$user->id]]) !!}
                <div class="form-group  ">
                    <div class="col-sm-9">
                        {!! Form::submit('Delete User',['class'=>"btn btn-danger col-sm-6"]) !!}
                    </div>
                </div>
                {!! Form::close() !!}


            </div>
</div>


            @endsection

