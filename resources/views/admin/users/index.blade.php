@extends('layouts.admin')
@section('title')
    View Users
@endsection
@section('subDesc')
    View All the List of Users
@endsection
@section('content')
    @if(Session::has('noty'))
    <div class="alert alert-{{Session('class')}}">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong>{{Session('heading')}}</strong>
        {{Session("noty")}}
        <br>
    </div>
    @endif
    <table class="table table-responsive ">
            <thead>
            <tr>
                <th>S.No</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th><span class="fa fa-clock-o"></span> Creation</th>
                <th><span class="fa fa-clock-o"></span> Updation</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1?>

            @forelse($users as $user)
            <tr>
                <td>{{$i++}}</td>
                <td><img src="{{$user->photo ? $user->photo->photo:""}}" width="50" class="img-thumbnail" alt="{{$user->name}}'s Photo "></td>
                <td><a href="{{route('admin.user.edit',$user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td ><span class="label label-sm label-{{$user->is_active == 1?"success":"danger"}}">{{$user->is_active == 1?"Active":"Not Active"}}</span></td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
            </tr>
            @empty
                <tr>
                    <td colspan="7"><h2 class="alert alert-info">No User Is Register</h2></td>
                </tr>
            @endforelse

            </tbody>
        </table>
@endsection
