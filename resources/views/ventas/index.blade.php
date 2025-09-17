@extends('layouts.app')
@section('title', 'Ventas')
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
                    <i class="fas fa-shopping-cart me-2"></i> Ventas
                </h1>
                <a href="{{ route('ventas.create') }}"
                    class="btn btn-success shadow-sm px-3 py-2 d-flex align-items-center gap-2">
                    <i class="fas fa-plus"></i> Nueva Venta
                </a>
            </div>

            {{-- Tabla de ventas --}}
            <div class="card shadow border-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unit.</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ventas as $venta)
                                    <tr class="align-middle">
                                        <td class="fw-semibold">{{ $venta->id }}</td>
                                        <td class="fw-semibold text-dark">{{ $venta->cliente->nombre }} {{ $venta->cliente->apellido }}</td>
                                        <td>{{ $venta->producto->nombre }}</td>
                                        <td>{{ $venta->cantidad }}</td>
                                        <td class="text-success fw-semibold">Bs. {{ number_format($venta->precio_unitario, 2) }}</td>
                                        <td class="text-success fw-bold">Bs. {{ number_format($venta->total, 2) }}</td>
                                        <td>{{ $venta->fecha->format('d/m/Y H:i') }}</td>
                                        <td>
                                            {{-- Botón ver --}}
                                            <a href="{{ route('ventas.show', $venta) }}"
                                                class="btn btn-sm btn-outline-info me-1 mb-1" title="Ver">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            {{-- Botón editar --}}
                                            <a href="{{ route('ventas.edit', $venta) }}"
                                                class="btn btn-sm btn-outline-warning me-1 mb-1" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {{-- Botón eliminar --}}
                                            <form action="{{ route('ventas.destroy', $venta) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('¿Eliminar venta?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger mb-1"
                                                    title="Eliminar">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-muted py-4">
                                            <i class="fas fa-info-circle me-2"></i> No hay ventas registradas.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Paginación --}}
            @if($ventas->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $ventas->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection