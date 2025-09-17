@extends('layouts.app')
@section('title', 'Categorías')
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
                    <i class="fas fa-list-alt me-2"></i> Categorías
                </h1>
                <a href="{{ route('categorias.create') }}"
                    class="btn btn-success shadow-sm px-3 py-2 d-flex align-items-center gap-2">
                    <i class="fas fa-plus"></i> Nueva Categoría
                </a>
            </div>

            {{-- Tabla de categorías --}}
            <div class="card shadow border-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categorias as $categoria)
                                    <tr class="align-middle">
                                        <td class="fw-semibold">{{ $categoria->id }}</td>
                                        <td class="fw-semibold text-dark">{{ $categoria->nombre }}</td>
                                        <td class="text-muted">{{ $categoria->descripcion }}</td>
                                        <td>
                                            {{-- Botón editar --}}
                                            <a href="{{ route('categorias.edit', $categoria) }}"
                                                class="btn btn-sm btn-outline-warning me-1 mb-1" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            {{-- Botón eliminar --}}
                                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('¿Eliminar esta categoría?')">
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
                                        <td colspan="4" class="text-muted py-4">
                                            <i class="fas fa-info-circle me-2"></i> No hay categorías registradas.
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