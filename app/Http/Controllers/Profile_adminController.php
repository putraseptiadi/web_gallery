<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Profile_adminController extends Controller
{
    public function uploadProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Hapus foto profil sebelumnya jika ada
        if ($user->profile_picture) {
            Storage::delete('public/' . $user->profile_picture);
        }

        // Simpan foto profil baru
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->profile_picture = $path;
        $user->save();

        return redirect()->route('profile_admin')->with('success', 'Foto profil berhasil diunggah');
    }
}
