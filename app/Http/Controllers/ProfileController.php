<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    //
    function profile()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    function profileUpdate(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')->ignore($user->id)],
            'password' =>  'nullable',
            'user_image' => 'nullable'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }


        if ($request->user_image) {
            if(File::exists($user->user_image)){
                File::delete($user->user_image);
            }

            $imageName = time() . '.' . $request->user_image->extension();
            $request->user_image->move(public_path('profileimg'), $imageName);
            $user->user_image = 'profileimg/'.$imageName;

        }

        $user->save();

        return redirect()->back()->with('success','Profile updated successfully');

    }
}
