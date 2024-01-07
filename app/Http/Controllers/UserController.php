<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\rayons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginAuth(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = $request->only(['email', 'password']);
        if (Auth::attempt($user)) {
            return redirect('/dashboard')->with('success', 'Selamat datang');
        } else {
            return redirect()->back()->with('failed', 'Mohon Pastikan email/password sudah sesuai'); 
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function index() {
        $users = User::orderBy('name', 'ASC')->simplePaginate(5);
        return view('admin.user.index', compact('users'));
    }

    public function edit($id) {
        $user = User::find($id);
        return view('admin.user.update', compact('user'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
            
        ]);

        $password = $request->password;

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($password),
        ]);

        return redirect()->route('admin.user.index')->with('success', 'Berhasil mengubah data user!');
    
    }

    public function create() {
        return view('admin.user.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
        ]);

        $defaultPassword = substr($request->email, 0, 3) . substr($request->name, 0, 3);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($defaultPassword)
        ]);

        return redirect()->route('admin.user.index')->with('success', 'Berhasil menambahkan User!');
    }
}
