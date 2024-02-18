<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductModel;
use App\Models\CommentModel;

class UserController extends Controller
{
    

    public function login(Request $request) {
        // Validasi data
        $request->validate([
        'email' => 'required',
        'password' => 'required',
        ]);

        // Proses autentikasi
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
        return redirect()->intended('/home');
        } else {
        return redirect()->back()->with('error', 'Login gagal. Periksa email atau password yang dimasukkan.');
        }
    }

    public function register(Request $request) {
     // Validasi data
     $request->validate([
     'name' => 'required|string|max:255',
     'email' => 'required|string|email|unique:users,email',
     'password' => 'required|string|min:8',
     ], [
        'email.unique' => 'Email sudah digunakan.',
        'password.min' => 'Mohon Masukkan Password lebih dari 8 Karakter.',
     ]);

     // Membuat user baru
     User::create([
     'name' => $request->name,
     'email' => $request->email,
     'password' => Hash::make($request->password),
     ]);

     // Redirect ke halaman setelah registrasi berhasil
     return redirect('/login')->with('success', 'Registrasi berhasil, silahkan Login.');
    }

    public function logout(Request $request) {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }

    public function changeUserRole(Request $request, $userId) {
       $user = User::find($userId);

       $request->validate([
       'roles' => 'required', 
       'status' => 'required', 
       ]);

       // Ubah peran pengguna
       $user->update([
       'roles' => $request->roles,
       'status' => $request->status,
       ]);

       $users = User::orderByRaw("CASE WHEN roles = 'admin' THEN 1 WHEN roles = 'user' THEN 2 ELSE 3 END")
       ->paginate(6);

       return view('auth.changerole', compact('users'))->with('success', 'Peran pengguna berhasil diubah.');
    }

    public function createProduct(Request $request) {
        $request->validate([
        'product_name' => 'required|string|max:255',
        'product_image' => 'image|file|max:1024',
        'desc' => 'required|string',
        'stock' => 'required|integer',
        'harga' => 'required',
        ], [
        'product_name.required' => 'Mohon isi nama produk.',
        'product_image.max' => 'Mohon masukkan ukuran gambar dibawah 1mb.',
        'desc.required' => 'Mohon isi deskripsi produk.',
        'stock.required' => 'Mohon isi stock produk.',
        'harga.required' => 'Mohon isi harga produk.',
        ]);

        $credentials = [
        'product_name' => $request->product_name,
        'desc' => $request->desc,
        'stock' => $request->stock,
        'harga' => $request->harga,
        'product_image' => $request->file('product_image')->store('productimg'),
        ];

        // Membuat user baru
        ProductModel::create($credentials);

        // Redirect ke halaman setelah registrasi berhasil
        return redirect('/product/createproduct')->with('success', 'Berhasil Menambahkan Product.');
    }

    public function editProduct(Request $request, $productId) {
        $request->validate([
        'product_name' => 'required|string|max:255',
        'product_image' => 'image|file|max:1024',
        'old_product_image' => 'required',
        'desc' => 'required|string',
        'stock' => 'required|integer',
        'harga' => 'required',
        ], [
        'product_name.required' => 'Mohon isi nama produk.',
        'product_image.max' => 'Mohon masukkan ukuran gambar dibawah 1mb.',
        'old_product_image.required' => 'Gambar tidak terdaftar.',
        'desc.required' => 'Mohon isi deskripsi produk.',
        'stock.required' => 'Mohon isi stock produk.',
        'harga.required' => 'Mohon isi harga produk.',
        ]);

        $credentials = [
        'product_name' => $request->product_name,
        'desc' => $request->desc,
        'stock' => $request->stock,
        'harga' => $request->harga,
        ];

        if($request->product_image) {
            Storage::delete($request->old_product_image);
            $credentials['product_image'] = $request->file('product_image')->store('productimg');
        } else {
            $credentials['product_image'] = $request->old_product_image;
        }

        // Membuat user baru
        ProductModel::where('id', $productId)->update($credentials);

        // Redirect ke halaman setelah registrasi berhasil
        return redirect('/product/' . $productId)->with('success', 'Berhasil Mengedit Product.');
    }

    public function editProfile(Request $request, $userId) {
        $request->validate([
        'name' => 'required|string|max:255',
        'user_image' => 'image|file|max:1024',
        'old_user_image' => 'required',
        'no_telp' => 'required',
        'jenis_kelamin' => 'required',
        ], [
        'name.required' => 'Mohon isi nama.',
        'user_image.max' => 'Mohon masukkan ukuran gambar dibawah 1mb.',
        'old_user_image.required' => 'Gambar tidak terdaftar.',
        'no_telp.required' => 'Mohon isi nomor telepon.',
        'jenis_kelamin.required' => 'Mohon isi jenis_kelamin.',
        ]);

        $credentials = [
        'name' => $request->name,
        'no_telp' => $request->no_telp,
        'jenis_kelamin' => $request->jenis_kelamin,
        ];

        if($request->user_image) {
            Storage::delete($request->old_user_image);
            $credentials['user_image'] = $request->file('user_image')->store('userimg');
        } else {
            $credentials['user_image'] = $request->old_user_image;
        }

        // Membuat user baru
        User::where('id', $userId)->update($credentials);

        // Redirect ke halaman setelah registrasi berhasil
        return redirect('user/profile')->with('success', 'Berhasil Mengedit Profile.');
    }


    public function comment(Request $request, $productId) {
        $credentials = $request->validate([
        'product_id' => 'required',
        'user_id' => 'required',
        'comment' => 'required',
        ], [
        'product_id.required' => 'Mohon isi id produk.',
        'user_id.required' => 'Mohon isi id user.',
        'comment.required' => 'Mohon isi komentar.',
        ]);

        if (CommentModel::create($credentials)) {
        return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

}
