<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Routing\Controller;
use App\Http\Requests\{StoreUserRequest, UpdateUserRequest};
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

    /**
     * Display the specified resource.
     */
    public function show(User $user, $id, $nama)
    {
        $user = DB::table('users')->where('id', $id)->orWhere('firstName', $nama)->first();

        return view('user.detail', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $id, $nama)
    {
        $user = DB::table('users')->where('id', $id)->orWhere('firstName', $nama)->first();

        return view('user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $password = Hash::make($request->password);

        $picture = $request->avatar;
        $picName = $picture->getClientOriginalName();

        if($request->file('avatar')) {
            if($request->oldPic) {
                Storage::delete('public/img'. $picName);
            }
            $request->file('avatar')->storeAs('./public/img', $picName);
        }

        DB::table('users')->where('id', $id)->update([
            'avatar' => $picName,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'created_at' => Carbon::now()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if(Storage::exists('public/img/' . $user->avatar)) {
            Storage::delete('public/img/' . $user->avatar);
        }

        DB::table('users')->where('id', $id)->delete();

        return redirect()->to('/user')->with('success', 'This user successfully deleted');
    }
}
