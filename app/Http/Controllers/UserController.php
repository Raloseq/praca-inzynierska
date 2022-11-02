<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserDataRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index', [
            'user' => auth()->user()
        ]);
    }

    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(UserDataRequest $request, User $user)
    {
        $user->fill($request->validated());
    
        $user->save();

        return redirect()->route('user.index')->with('status','Twoje dane zostały zaktualizowane!');
    }
}
