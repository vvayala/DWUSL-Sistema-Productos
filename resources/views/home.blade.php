@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sistema de Inventario') }}</div>

                <div class="card-body">
                    @guest
                        <p>Debes iniciar sesión para acceder al sistema de inventario.</p>
                    @else
                        <p>Bienvenido al sistema de inventario, {{ Auth::user()->name }}.</p>
                        <p>Su rol es: {{Auth::user()->role}}.</p>
                    @endguest
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
