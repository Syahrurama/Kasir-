<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stok_barang;
use Illuminate\Http\Request;

class DashboardStokController extends Controller
{   
    // untuk stock super admin
    public function index()
    {
        // Mengambil semua produk dari database
        $product = Stok_barang::all(); 
        
        // Mengirim data produk ke view
        return view('Page_Super_Admin.page_stok', compact('product'));
    }
    

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Membuat produk baru dan menyimpan data
        $product = Product::create([
            'name' => $request->input('name'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),
            'image' => $request->file('image')->store('images', 'public'),
            'created_at'=>now(),
        ]);
    
        return redirect()->route('page_stok.index');
    }
    
    
    // untuk stok admin
    public function StokAdmin(){
        

        return view('Page_Admin.page_stok_admin', [
          
        ]);
    }

    
    
}
