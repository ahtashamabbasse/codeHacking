<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    public function index()
    {
        $users['users']=User::all();
        return view("admin.users.index",$users);
    }


    public function create()
    {
        $roles["roles"]=Role::pluck('name','id')->all();
        return view("admin.users.create",$roles);
    }

    public function store(UserRequest $request)
    {
        $input=$request->all();
        if($file=$request->file('photo_id'))
        {
            $name=Time().$file->getClientOriginalName();
            $file->move("images",$name);
            $photo=Photo::create(["photo"=>$name]);
            $input['photo_id']=$photo->id;
        }
        $input['password']=bcrypt($request->password);
        User::create($input);
        Session::flash("class","success");
        Session::flash("heading","Success");
        Session::flash("noty","User Has Been Created Successfully");
        return redirect("admin/user");
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $data["roles"]=Role::pluck('name','id')->all();
        $data['user']=User::findOrFail($id);
        return view("admin.users.edit",$data);
    }


    public function update(UserEditRequest $request, $id)
    {


        $user=User::findOrFail($id);
        $input=$request->all();
        if($file=$request->file('photo_id'))
        {
            $name=Time().$file->getClientOriginalName();
            $file->move("images",$name);
            $photo=Photo::create(["photo"=>$name]);
            $input['photo_id']=$photo->id;
        }
        $input['password']=bcrypt($request->password);
        $user->update($input);
        Session::flash("class","success");
        Session::flash("heading","Success");
        Session::flash("noty","User Has Been Updated Successfully");
        return redirect("admin/user");
    }


    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $photo=$user->photo->photo;
        unlink(public_path().$photo);
        $user->delete();
        Session::flash("class","success");
        Session::flash("heading","Success");
        Session::flash("noty","User Has Been Deleted Successfully");
        return redirect("admin/user");
    }
}
