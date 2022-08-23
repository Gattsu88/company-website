<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function destroy(Request $request, FlasherInterface $flasher)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $flasher->addSuccess('You have successfully logged out.');

        return redirect('/login');
    }

    public function profile()
    {
        $id = Auth::id();
        $adminData = User::find($id);

        return view('admin.admin_profile', compact('adminData'));
    }

    public function editProfile()
    {
        $id = Auth::id();
        $editData = User::find($id);

        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function storeProfile(Request $request, FlasherInterface $flasher)
    {
        $id = Auth::id();
        $storeData = User::find($id);

        $storeData->name = $request->name;
        $storeData->username = $request->username;
        $storeData->email = $request->email;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $storeData['profile_image'] = $filename;
        }

        $storeData->save();

        if ($storeData) {
            $flasher->addSuccess('Admin profile updated successfully.');
            return redirect()->route('admin.profile');
        } else {
            $flasher->addError('Admin data is not updated.');
            return back();
        }
    }

    public function editPassword()
    {
        return view('admin.admin_password_edit');
    }

    public function storePassword(Request $request, FlasherInterface $flasher)
    {
        $validateData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password'
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->new_password);
            $user->save();
            $flasher->addSuccess('Password successfully changed.');
            return back();
        } else {
            return back();
        }
    }
}
