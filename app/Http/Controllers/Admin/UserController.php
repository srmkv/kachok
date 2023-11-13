<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('user_type', 'client')->OrderBy('id', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        request()->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'traffic' => 'required',
            ]
        );

        User::create($request->all());


        return redirect()->route('users.index')
            ->with('success', 'Пользователь успешно создан.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        request()->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'traffic' => 'required',
            ]
        );

        $user->update($request->all());


        return redirect()->route('users.index')
            ->with('success', 'Пользователь успешно изменен.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success','Пользователь успешно удален.');
    }


}
