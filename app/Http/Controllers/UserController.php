<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        //
        $this->authorize('viewAny', User::class);
        $users = User::get();
        return view('user.index', compact('users'));
    }
    public function update($id)
    {
        //
        $this->authorize('update', User::class);
        $user=User::find($id);
        return view('user.update',compact('user'));
    }
    public function edit($id, Request $request)
    {
        //
        $this->authorize('update', User::class);
        $user=User::find($id);
        $user->update($request->all());
        return redirect()->route('user.index');
    }
    public function destroy($id)
    {
        //
        $this->authorize('delete', User::class);
        User::where('id',$id)->delete();
        return redirect()->route('user.index');
    }
}
