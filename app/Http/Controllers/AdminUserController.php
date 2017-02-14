<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users['users']=User::all();
        return view("admin.users.index",$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles["roles"]=Role::pluck('name','id')->all();
        return view("admin.users.create",$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        session([
            "class"=>"success",
            "heading"=>"Success",
            "noty"=>"User Has Been Created Successfully"
        ]);
        return redirect("admin/user");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["roles"]=Role::pluck('name','id')->all();
        $data['user']=User::findOrFail($id);
        return view("admin.users.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        session([
            "class"=>"success",
            "heading"=>"Success",
            "noty"=>"User Has Been Updated Successfully"
        ]);
        return redirect("admin/user");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        session([
            "class"=>"success",
            "heading"=>"Success",
            "noty"=>"User Has Been Deleted Successfully"
        ]);
        return redirect("admin/user");
    }
}
