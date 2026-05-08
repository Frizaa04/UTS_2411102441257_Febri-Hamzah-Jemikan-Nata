<?php

namespace App\Http\Controllers;

// IMPORT file Controller utama dari folder parent
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Method untuk menampilkan tabel daftar user (Halaman Index)
    public function index()
    {
        // Mengambil semua data user dari database
        $users = User::all();

        // Mengirim data ke view index
        return view('pages.admin.index', compact('users'));
    }

    // Method untuk menampilkan form tambah user (Halaman Create)
    public function create()
    {
        return view('pages.admin.create');
    }

    // Method untuk menyimpan data user baru
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'roles' => 'required'
        ]);

        // 2. Simpan ke database menggunakan Model User yang sudah di-import
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Password wajib di-hash
            'roles' => $request->roles,
        ]);

        // 3. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'User berhasil ditambahkan!');
    }

        // Halaman Form Edit
    public function edit(string $id)
    {
        $item = User::findOrFail($id);
        return view('pages.admin.edit', compact('item'));
    }

    // Proses Update Data
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'roles' => 'required'
        ]);

        $item = User::findOrFail($id);
        $data = $request->all();

        // Jika password diisi, maka update. Jika kosong, biarkan password lama.
        if($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $item->update($data);

        return redirect()->route('admin.index')->with('success', 'User berhasil diupdate!');
    }

    // Proses Hapus Data
    public function destroy(string $id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.index')->with('success', 'User berhasil dihapus!');
    }
}