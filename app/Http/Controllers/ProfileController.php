<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('pages.profile', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'login' => [
                'required',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'full_name' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        $user = Auth::user();
        $user->edit($request->all());
        $user->generatePassword($request->get('password'));

        return redirect()->back()->with('status', 'Профиль успешно обновлён');
    }
}
