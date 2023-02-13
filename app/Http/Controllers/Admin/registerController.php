<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\registerAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function view()
    {
        return view('admin.auth.register');
    }

    public function store(RegisterAdminRequest $request)
    {
        // $validator = $request->validated();

        $admin= Admin::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        //login after register
        if($admin)
        {
            Auth::guard('admin')->attempt(['name'=> $request->name , 'password' => $request->password]);
            return redirect()->route('admin.home');
        }








    }


}
