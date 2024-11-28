<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; // Untuk log error

class AdminController extends Controller
{
    // Menampilkan halaman Manage Admin
    public function index()
    {
        // Mengambil semua admin yang terdaftar
        $admins = User::where('role', 'admin')->get();

        // Menampilkan halaman dengan data admin
        return view('admin.manage_admin', compact('admins'));
    }

    public function edit($id)
    {
        // Mencari admin berdasarkan ID
        $admin = User::findOrFail($id);

        return view('admin.edit_admin', compact('admin'));
    }

    // Menyimpan admin baru
    public function store(Request $request)
    {
        try {
            // Validasi data input
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Membuat admin baru
            $admin = new User();
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->password = Hash::make($request->input('password'));
            $admin->role = 'admin';  // Mengatur role sebagai admin
            $admin->save();

            // Redirect dengan pesan sukses
            return redirect()->route('manage_admin')->with('success', 'Admin baru berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Log error
            Log::error('Error while adding new admin: ' . $e->getMessage());

            // Jika terjadi error, kembali dengan pesan error
            return redirect()->route('manage_admin')->with('error', 'Terjadi kesalahan saat menambahkan admin. Coba lagi.');
        }
    }

    // Update admin
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
            ]);

            // Update data admin
            $admin = User::findOrFail($id);
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');

            if ($request->filled('password')) {
                $request->validate([
                    'password' => 'required|string|min:8|confirmed',
                ]);
                $admin->password = Hash::make($request->input('password'));
            }

            $admin->save();

            return redirect()->route('manage_admin')->with('success', 'Admin berhasil diperbarui.');
        } catch (\Exception $e) {
            // Log error
            Log::error('Error while updating admin: ' . $e->getMessage());

            // Jika terjadi error, kembali dengan pesan error
            return redirect()->route('manage_admin')->with('error', 'Terjadi kesalahan saat memperbarui admin. Coba lagi.');
        }
    }

    // Menghapus admin
    public function destroy($id)
    {
        try {
            // Menghapus admin berdasarkan ID
            $admin = User::findOrFail($id);
            $admin->delete();

            return redirect()->route('manage_admin')->with('success', 'Admin berhasil dihapus.');
        } catch (\Exception $e) {
            // Log error
            Log::error('Error while deleting admin: ' . $e->getMessage());

            // Jika terjadi error, kembali dengan pesan error
            return redirect()->route('manage_admin')->with('error', 'Terjadi kesalahan saat menghapus admin. Coba lagi.');
        }
    }
}
