@extends('layouts.app')
@section('title', 'Productos')
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
                    <i class="fas fa-boxes me-2"></i> Productos
                </h1>
                <a href="{{ route('productos.create') }}"
                    class="btn btn-success shadow-sm px-3 py-2 d-flex align-items-center gap-2">
                    <i class="fas fa-plus"></i> Nuevo Producto
                </a>
            </div>

            {{-- Tabla de productos --}}
            <div class="card shadow border-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Categoría</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($productos as $producto)
                                    <tr class="align-middle">
                                        <td class="fw-semibold">{{ $producto->id }}</td>
                                        <td class="fw-semibold text-dark">{{ $producto->nombre }}</td>
                                        <td>{{ $producto->categoria->nombre }}</td>
                                        <td class="text-success fw-semibold">Bs. {{ $producto->precio_venta }}</td>
                                        <td>{{ $producto->stock }}</td>
                                        <td>
                                            @if($producto->imagen)
                                                <img src="{{ asset('storage/' . $producto->imagen) }}" class="img-thumbnail"
                                                    style="width:60px; height:60px; object-fit:cover;">
                                            @else
                                                <span class="text-muted fst-italic">Sin imagen</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- Botón editar --}}
                                            <a href="{{ route('productos.edit', $producto) }}"
                                                class="btn btn-sm btn-outline-warning me-1 mb-1" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {{-- Botón eliminar --}}
                                            <form action="{{ route('productos.destroy', $producto) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('¿Eliminar producto?')">
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
                                        <td colspan="7" class="text-muted py-4">
                                            <i class="fas fa-info-circle me-2"></i> No hay productos registrados.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection