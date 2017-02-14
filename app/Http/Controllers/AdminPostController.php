<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{

    public function index()
    {
        $posts['posts']=Post::all();
        return view("admin.posts.index",$posts);
    }


    public function create()
    {
        $cats['cats']=Category::lists("name","id")->all();
        return view("admin.posts.create",$cats);
    }


    public function store(PostCreateRequest $request)
    {
        $input=$request->all();
        $user=Auth::user();
        if($file=$request->file("photo_id"))
        {
            echo $name=time().$file->getClientOriginalName();
            $file->move("images",$name);
            $photo=Photo::create(["photo"=>$name]);
            $input['photo_id']=$photo->id;
        }
        $user->posts()->create($input);
        return redirect("admin/post");

    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        return view("admin.posts.edit");
    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
