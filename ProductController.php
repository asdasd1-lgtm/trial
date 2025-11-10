<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Jika ada input query, filter data produk, jika tidak tampilkan semua
        $products = Product::when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('name', 'ILIKE', "%{$query}%")
                                    ->orWhere('code', 'ILIKE', "%{$query}%");
            })
            ->latest()
            ->paginate(5); // Sesuaikan dengan pagination yang diinginkan

        return view('products.index', compact('products', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request) : RedirectResponse
    {
        // Cek apakah produk dengan kode yang sama sudah ada
        $product = Product::where('code', $request->input('code'))->first();

        if ($product) {
            // Jika produk sudah ada, tambahkan quantity produk tersebut
            $product->quantity += $request->input('quantity');
            $product->save();

            return redirect()->route('products.index')
                    ->withSuccess('Quantity updated successfully for existing product.');
        } else {
            // Jika produk belum ada, buat produk baru
            Product::create($request->validated());
        }

        return redirect()->route('products.index')
                ->withSuccess('New product is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) : View
    {
        return view('products.show', compact('product'));
    }

    public function exportPDF($id)
    {
        // Mengambil semua data produk
        $product = Product::FindOrFail($id);

        // Membuat PDF dengan tampilan 'products.pdf'
        $pdf = PDF::loadView('products.pdf', compact('product'));

        // Mengunduh PDF dengan nama 'products.pdf'
        return $pdf->download('products-'. $product->name .'.pdf');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) : View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
    {
        $product->update($request->validated());

        return redirect()->back()
                ->withSuccess('Product is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) : RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
                ->withSuccess('Product is deleted successfully.');
    }

    
}