<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionModel;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductModel;
use App\Models\TransactionDetailsModel;
use App\Models\User;


class TransactionController extends Controller
{
    public function process(Request $request) {
        $credentials = $request->validate([
            'product_id' => 'required',
            'user_id' => 'required',
            'harga' => 'required',
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->harga,
            ), 
            'customer_details' => array(
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $credentials['snap_token'] = $snapToken;

        $transaction = TransactionModel::create($credentials);

        if($transaction) {
        $transactionId = $transaction->id;

        return redirect('product/checkout/' . $request->product_id . '?transaction_id=' . $transactionId);
        }
    }
    public function checkout(Request $request, $productId) {
        $product = ProductModel::find($productId);
        $transactionId = $request->query('transaction_id');
        $transaction = TransactionModel::where('id', $transactionId)->pluck('snap_token');
                $credentials = [
            'transaction_id' => $transactionId,
            'alamat' => auth()->user()->alamat,
            'no_telp' => auth()->user()->no_telp,
            'email' => auth()->user()->email,
        ];
        TransactionDetailsModel::create($credentials);

        return view('product.checkout', compact('product', 'transaction', 'transactionId'));
    }


    public function success($transactionId, $productId) {
        $product = ProductModel::findOrFail($productId);
        $product->stock -= 1;
        $product->save();
        $transaction = TransactionModel::findOrFail($transactionId);
        $transaction->status = 'success';
        $transaction->save();
        $transactionDetail = TransactionDetailsModel::where('transaction_id', $transactionId)->first();
        $user = User::where('id', $transaction->user_id)->first();

        return view('product.success', compact('transaction', 'product', 'transactionDetail', 'user'));
    }

}
