<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\{DB, Hash, Session, Storage};

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(5);

        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $password = Hash::make($request->user_password);

        $picture = $request->user_picture;
        $picName = $picture->getClientOriginalName();

        DB::table('users')->insert([
            'user_picture' => $picName,
            'user_firstName' => $request->user_firstName,
            'user_lastName' => $request->user_lastName,
            'user_email' => $request->user_email,
            'user_born' => $request->user_born,
            'user_address' => $request->user_address,
            'user_city' => $request->user_city,
            'user_state' => $request->user_state,
            'user_password' => $password,
            'created_at' => Carbon::now()
        ]);

        // Ini geraknya dari storage/app <- di folder sini
        $request->file('user_picture')->storeAs('./public/img', $picName);

        Session::flash('success', 'New user sucessfully added');

        return redirect()->to('/user');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, $id, $nama)
    {
        $user = DB::table('users')->where('id', $id)->orWhere('user_firstName', $nama)->first();

        return view('user.detail', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $id, $nama)
    {
        $user = DB::table('users')->where('id', $id)->orWhere('user_firstName', $nama)->first();

        return view('user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if(Storage::exists('public/img/' . $user->user_picture)) {
            Storage::delete('public/img/' . $user->user_picture);
        }

        DB::table('users')->where('id', $id)->delete();

        return redirect()->to('/user')->with('success', 'This user successfully deleted');
    }
}
