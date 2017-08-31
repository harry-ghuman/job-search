<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function show()
    {
        $user = User::findOrFail(1);

        return View::make('admin.show')->with('user', $user);
    }

    public function edit()
    {
        $user = User::findOrFail(1)->first();

        return View::make('admin.edit')->with('user', $user);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|max:100',
            'email' => 'required|email',
        ]);

        $user       = User::where('id', 1)->first();
        $user->name = Input::get('name');
        $user->save();

        return redirect('/admin/1');
    }
}
