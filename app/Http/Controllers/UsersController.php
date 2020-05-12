<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfileRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
        return view('users.index',[
            'users' => User::all()
        ]);
    }

    public function makeAdmin(User $user){
        $user->update([
            'role' => 'admin'
        ]);
        session()->flash('success','User made admin successfully.');
        return redirect(route('users.index'));
    }

    public function edit(){
        return view('users.edit',[
            'user' => auth()->user()
        ]);
    }

    public function update(UpdateProfileRequest $request){
$user = auth()->user();
$user->update([
    'name' => $request->name,
    'about' => $request->about
]);
session()->flash('success' ,'Profile Updated successfully.');
return redirect()->back();
    }
}
