<?php

namespace App\Http\Controllers\Authentication;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(StoreUserRequest $request) {
        $password = Hash::make($request->password);

        // $picture = $request->avatar;
        // $picName = $picture->getClientOriginalName();

        DB::table('users')->insert([
            // 'avatar' => $picName,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'created_at' => Carbon::now()
        ]);

        // Ini geraknya dari storage/app <- di folder sini
        // $request->file('avatar')->storeAs('./public/img', $picName);

        Session::flash('success', 'Registration Success');

        return redirect()->to('/login');
    }
}
