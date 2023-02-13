<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function view()
    {
        return view('admin.auth.login');
    }

    public function store(LoginRequest $request)
    {
        $validator = $request->validated();

        $data=$request->only('email','password');

        if(Auth::guard('admin')->attempt($data) )
        {
            return redirect()->route('admin.home');
        }else{
            Session()->flash('error', 'User Not registered');
            return redirect()->route('admin.login');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
