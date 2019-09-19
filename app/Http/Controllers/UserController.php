<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user', $user));
    }

    public function update_avatar(Request $request)
    {
    	//valida la extension y el tamaño de la imagen
        $request->validate(
            [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );
        //identifica el usuario autenticado
        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('public/avatars', $avatarName);

        $user->avatar = $avatarName;

        $user->save();

        return back()
            ->with('success', 'cargo su imagen correctamente.');
    }
}
