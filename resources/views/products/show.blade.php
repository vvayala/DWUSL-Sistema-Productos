@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <h1>Productos</h1>
    <h5>Listado de productos</h5>
    <hr>
    @auth
        @if(auth()->user()->role == 'admin')
    <a href="/products/create" class="btn btn-success btn-sm">Agregar Producto</a>
        @endif
    <a href="/pdf/products" class="btn btn-secondary btn-sm ml-3">Generar PDF</a>
    @endauth
    <table class="table table-hover table-bordered mt-2">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Marca</th>
                @auth
                    @if(auth()->user()->role == 'admin')
                        <th>Acciones</th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->codigo }}</td>
                    <td>{{ $product->nombre }}</td>
                    <td>{{ $product->precio }}</td>
                    <td>{{ $product->marca_nombre}}</td>
                    @auth
                        @if(auth()->user()->role == 'admin')
                            <td>
                                <a class="btn btn-warning btn-sm"
                                href="/products/edit/{{ $product->codigo }}">
                                    Editar
                                </a>

                                <button type="button"
                                        class="btn btn-danger btn-sm"
                                        url="/products/destroy/{{ $product->codigo }}"
                                        token="{{ csrf_token() }}"
                                        onclick="destroy(this)">
                                    Eliminar
                                </button>
                            </td>
                        @endif
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/product.js') }}"></script>
@endsection
