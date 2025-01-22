<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;


use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function index(){
        $users = User::all();
        return view('auth.index', compact('users'));
    }


    public function edit(User $user){
        return view('auth.edit', compact('user'));
    }

    public function update(User $user){


        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
         ]);

        $user->update([
            'name' => $validated['name'],
            'is_user' => request()->is_user,
        ]);
        return redirect()->route('auth.index')->with('success', 'تم تعديل البيانات بنجاح');
    }


    public function destroy(User $user){
        $user->delete();
        return redirect()->route('auth.index')->with('success', 'تم حذف المستخدم بنجاح');
    }


    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validated = request()->validate([
           'name' => 'required|min:3|max:40|unique:users,name',
           'password' => 'required|confirmed|min:8',
        ]);

        User::create([
            'name' => $validated['name'],
            'password' => Hash::make($validated['password'])
        ]);

        return redirect()->route('auth.index')->with('success', 'تم انشاء الحساب بنجاح');
    }



    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $validated = request()->validate([
            'name' => 'required',
            'password' => 'required|min:8'
        ]);

        if (auth()->attempt($validated)){
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', auth()->user()->name. " ,مرحبا");
        }
        return redirect()->route('login')->withErrors([
            'name' => 'اسم المستخدم او كلمة المرور غير صحيحة'
        ]);
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'تم تسجل الخروج بنجاح');
    }

}
