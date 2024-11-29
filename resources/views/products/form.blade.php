
@extends('layouts.app')

@section('title', 'Crear producto')

@section('content')
<div class="container mx-auto my-4">
    <form action="{{ $action }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8">
        @csrf
        @if($method)
            @method($method)
        @endif

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Nombre</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                value="{{ old('name', $product->name ?? '') }}" 
                required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Descripción</label>
            <textarea 
                name="description" 
                id="description" 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                rows="4">{{ old('description', $product->description ?? '') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-gray-700 font-bold mb-2">Stock</label>
            <input 
                type="number" 
                name="stock" 
                id="stock" 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                value="{{ old('stock', $product->stock ?? 0) }}" 
                required>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-bold mb-2">Precio</label>
            <input 
                type="number" 
                step="0.01" 
                name="price" 
                id="price" 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                value="{{ old('price', $product->price ?? 0) }}" 
                required>
        </div>

        <div class="flex justify-end">
            <button 
                type="submit" 
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Guardar
            </button>
        </div>
    </form>
</div>
