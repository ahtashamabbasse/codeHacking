@extends('layouts.admin')
@section('title')
    View Users
@endsection
@section('subDesc')
    View All the List of Users
@endsection
@section('content')
    <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th>S.No</th>
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
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td ><span class="label label-sm label-{{$user->is_active == 1?"success":"danger"}}">{{$user->is_active == 1?"Active":"Not Active"}}</span></td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
            </tr>
            @empty
                <tr>
                    <td colspan="5"><h2 class="alert alert-info">No User Is Register</h2></td>
                </tr>
            @endforelse

            </tbody>
        </table>
@endsection
