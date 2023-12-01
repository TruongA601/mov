<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class accountController extends Controller
{
    public function account()
    {
        $users = User::all();
        return view('admin.users.account', compact('users'));
    }
    public function delete($UserID)
    {
        DB::table('users')->where('id', $UserID)->delete();
    }
    public function viewupdate($UserID)
    {
        $users = User::where('id', $UserID)->get();
        return view('admin.users.update', compact('users'));
    }
    public function update($UserID, Request $request)
    {

        $data = $request->all();
        $user = User::find($UserID);

        if ($request->hasFile('avatar')) {
            $destination = public_path('uploads/avatars/' . $user->avatar);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $avatarname = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('uploads/avatars'), $avatarname);
            $user->avatar = $avatarname;
        }

        if (!empty($data['password'])) {
            if ($data['password'] === $data['old_password']) {
                $user->update([
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'phone' => $data['phone']
                ]);
            } else {
                $user->update([
                    'username' => $data['username'],
                    'password' => bcrypt($data['password']),
                    'email' => $data['email'],
                    'phone' => $data['phone']
                ]);
            }
        } else {
            $user->update([
                'username' => $data['username'],
                'email' => $data['email'],
                'phone' => $data['phone']
            ]);
        }

        return back()->with('success', 'User successfully updated');
    }
}
