<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Flasher\Prime\FlasherInterface;


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

        if($request->file('profile_image')) {
            $file = $request->file('profile_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $storeData['profile_image'] = $filename;
        }

        $storeData->save();

        if($storeData) {
            $flasher->addSuccess('Admin profile updated successfully.');
            return redirect()->route('admin.profile');
        } else {
            $flasher->addError('Admin data is not updated.');
            return back();
        }
    }
}
