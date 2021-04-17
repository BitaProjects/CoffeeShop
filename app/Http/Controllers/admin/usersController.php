<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Traits\checkbox;

class usersController extends Controller
{
    use checkbox;
    public function index()
    {
        $users = User::all();
        return view('admin.user.users',compact('users'));
    }

    public function edit($userID)
    {
        $user = User::where('id',$userID)->first();
        return view('admin.user.edit',compact('user'));
    }

    public function store(Request $request,$userID)
    {
        $isAdmin = $this->checkboxValue($request->isAdmin);
        User::where('id',$userID)->update(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'isAdmin'=>$isAdmin

            ]);
        $users = User::all();
          return view('admin.user.users',compact('users'));
    }
}
