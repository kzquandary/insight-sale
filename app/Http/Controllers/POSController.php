<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\Penjualan;
class POSController extends Controller
{
    public function index(){
        $product = Produk::all();
        return view('pos.index', compact('product'));
    }

    public function store(Request $request)
    {
        $cart = $request->input('cart');
    
        foreach ($cart as $item) {
            Penjualan::create([
                'id_produk' => $item['id'],
                'jumlah' => $item['qty'],
                'tanggal' => now()
            ]);
        }
    
        return response()->json(['success' => true]);
    }
        
}
