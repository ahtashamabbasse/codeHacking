@extends('layouts.admin')
@section('title')
    View Posts
@endsection
@section('subDesc')
    View All the List of Posts
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
            <th>User</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Category</th>

            <th><span class="fa fa-clock-o"></span> Creation</th>
            <th><span class="fa fa-clock-o"></span> Updation</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1?>
        @forelse($posts as $post)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$post->user->name}}</td>
            <td><img src="{{$post->photo?$post->photo->photo:"/images/placeholder.png"}}" class="img-thumbnail" width="60px" height="60px" alt="Post photo"></td>
            <td>{{$post->title}}</td>
            <td>{{$post->category_id}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
        </tr>
        @empty()
            <tr class="bg-info">
                <td colspan="7"> No Post Exist</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
