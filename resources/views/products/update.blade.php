
@extends('layouts.app')

@section('title', 'Actualizar Producto')

@section('content')
    <h1>Actualizar Producto</h1>
    <a href="/products/show" class="btn btn-warning btn-sm mb-3">Volver al listado</a>
    <h5>Formulario para actualizar un producto</h5>
    <div class="container">
        <form action="/products/update/{{ $product->codigo }}" method="POST">
            @csrf
            @method('PUT')
            <div class='row'>
                <div class='col-6'>
                    Nombre
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $product->nombre }}">
                    @error('nombre')
                        <span class="invalid-feedback d-block" role='alert'><strong>{{ $message }}</span>
                    @enderror
                </div>
                <div class='col-6'>
                    Precio
                    <input type="text" name="precio" id="precio" class="form-control" value="{{ $product->precio }}">
                    @error('precio')
                        <span class="invalid-feedback d-block" role='alert'><strong>{{ $message }}</span>
                    @enderror
                </div>
                <div class='col-12'>
                    Marca
                    <select name="marca" id="marca" class="form-control">
                        <option value="">Seleccione una marca</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->codigo }}" {{ (($brand->codigo == $product->marca)? 'selected' : '') }}> {{$brand->nombre}} </option>
                                {{ $brand->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('marca')
                        <span class="invalid-feedback d-block" role='alert'><strong>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class='col-12 mt-2'>
                <button type="submit" class="btn btn-primary">Actualizar</button>
@endsection



