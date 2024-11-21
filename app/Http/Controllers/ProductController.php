<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.form', [
            'action' => route('products.store'), // Ruta al método store
            'method' => null,                   // Método POST por defecto
            'product' => null                   // No hay producto al crear
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
        'stock' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
    ]);

    Product::create($validated);
    return redirect()->route('products.index')->with('success', 'Producto registrado correctamente.');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $product = Product::findOrFail($id); // Buscar el producto o lanzar un error 404

        return view('products.form', [
            'action' => route('products.update', $product->id), // Ruta al método update
            'method' => 'PUT', // Método PUT para actualizar
            'product' => $product // Pasar el producto existente
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);
    
        $product = Product::findOrFail($id); // Buscar el producto o lanzar un error 404
        $product->update($validated); // Actualizar con los datos validados
    
        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id); // Buscar el producto o lanzar un error 404
        $product->delete(); // Eliminar el producto
    
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
}
