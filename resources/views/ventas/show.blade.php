@extends('layouts.app')
@section('title', 'Venta')
@push('styles')
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
@endpush
@section('body_style', 'id=page-top')
@section('content')
    @include('layouts.partials.menu')
    <div class="pcoded-main-container">
        <div class="container py-4">

            {{-- Encabezado --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="fw-bold text-primary m-0">
                    <i class="fas fa-eye me-2"></i> Detalle de Venta #{{ $venta->id }}
                </h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('ventas.edit', $venta) }}" class="btn btn-warning shadow-sm px-3 py-2">
                        <i class="fas fa-edit me-1"></i> Editar
                    </a>
                    <a href="{{ route('ventas.index') }}" class="btn btn-outline-secondary px-3 py-2">
                        <i class="fas fa-arrow-left me-1"></i> Volver
                    </a>
                </div>
            </div>

            {{-- Información de la venta --}}
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <div class="row g-4">
                        
                        {{-- Información del Cliente --}}
                        <div class="col-12 col-lg-6">
                            <h5 class="fw-bold text-dark mb-3">
                                <i class="fas fa-user me-2 text-primary"></i> Información del Cliente
                            </h5>
                            <div class="bg-light rounded p-3">
                                <p class="mb-2"><strong>Nombre:</strong> {{ $venta->cliente->nombre }} {{ $venta->cliente->apellido }}</p>
                                <p class="mb-2"><strong>Celular:</strong> {{ $venta->cliente->celular }}</p>
                                <p class="mb-2"><strong>Email:</strong> {{ $venta->cliente->email }}</p>
                                @if($venta->cliente->direccion)
                                    <p class="mb-0"><strong>Dirección:</strong> {{ $venta->cliente->direccion }}</p>
                                @endif
                            </div>
                        </div>

                        {{-- Información del Producto --}}
                        <div class="col-12 col-lg-6">
                            <h5 class="fw-bold text-dark mb-3">
                                <i class="fas fa-box me-2 text-primary"></i> Información del Producto
                            </h5>
                            <div class="bg-light rounded p-3">
                                <p class="mb-2"><strong>Producto:</strong> {{ $venta->producto->nombre }}</p>
                                <p class="mb-2"><strong>Categoría:</strong> {{ $venta->producto->categoria->nombre }}</p>
                                @if($venta->producto->unidad_medida)
                                    <p class="mb-0"><strong>Unidad:</strong> {{ $venta->producto->unidad_medida }}</p>
                                @endif
                            </div>
                        </div>

                        {{-- Detalles de la Venta --}}
                        <div class="col-12">
                            <h5 class="fw-bold text-dark mb-3">
                                <i class="fas fa-shopping-cart me-2 text-primary"></i> Detalles de la Venta
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Total</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="fw-semibold">{{ $venta->cantidad }}</td>
                                            <td class="text-success fw-semibold">Bs. {{ number_format($venta->precio_unitario, 2) }}</td>
                                            <td class="text-success fw-bold fs-5">Bs. {{ number_format($venta->total, 2) }}</td>
                                            <td>{{ $venta->fecha->format('d/m/Y H:i:s') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Resumen --}}
                        <div class="col-12">
                            <div class="row justify-content-end">
                                <div class="col-12 col-md-4">
                                    <div class="card bg-success text-white">
                                        <div class="card-body text-center">
                                            <h4 class="mb-1">TOTAL VENTA</h4>
                                            <h2 class="fw-bold mb-0">Bs. {{ number_format($venta->total, 2) }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection