<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProductModel;
use App\Models\CommentModel;


class PageController extends Controller
{
    public function homepage() {
        $products = ProductModel::all();

        return view('home', compact('products'));
    }
    public function adminpage() {
        return view('admin');
    }
    public function userpage() {
        return view('user');
    }
    public function statuspage() {
        return view('auth.status');
    }

    public function showLoginForm() {
        return view('auth.login');
    }

    public function showRegisterForm() {
        return view('auth.register');
    }

    public function changeUserRoleForm(Request $request, $userId) {
        $usercrole = User::find($userId);
        $users = User::orderByRaw("CASE WHEN roles = 'admin' THEN 1 WHEN roles = 'user' THEN 2 ELSE 3 END")
        ->paginate(6);
        return view('auth.changerole', compact('usercrole','users'))->with('modal-approve', 'p');
    }

    public function changerolepage() {
        $users = User::orderByRaw("CASE WHEN roles = 'admin' THEN 1 WHEN roles = 'user' THEN 2 ELSE 3 END")
        ->paginate(6);

        return view('auth.changerole', compact('users')); // Mengirim data pengguna ke view
    }   
    public function createProductForm() {
        return view('admin.createproduct');
    }
    
    public function showDetailProduct(Request $request, $productId) {
        $product = ProductModel::find($productId);
        $comments = CommentModel::where('product_id', $productId)
        ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan tanggal pembuatan (paling baru).
        ->get();
        $totalComments = $comments->count();
        return view('product.product', compact('product', 'comments', 'totalComments'));
    }

}
