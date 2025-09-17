@extends('layouts.app')
@section('title', 'Clientes')
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
                    <i class="fas fa-list-alt me-2"></i> Clientes
                </h1>
                <a href="{{ route('clientes.create') }}"
                    class="btn btn-success shadow-sm px-3 py-2 d-flex align-items-center gap-2">
                    <i class="fas fa-plus"></i> Nuevo Cliente
                </a>
            </div>

            {{-- Tabla de Clientes --}}
            <div class="card shadow border-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Celular</th>
                                    <th>Email</th>
                                    <th>Dirección</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($clientes as $cliente)
                                    <tr class="align-middle">
                                        <td class="fw-semibold">{{ $cliente->id }}</td>
                                        <td class="fw-semibold text-dark">{{ $cliente->nombre }} {{ $cliente->apellido }}</td>
                                        <td class="text-muted">{{ $cliente->celular}}</td>
                                        <td class="text-muted">{{ $cliente->email}}</td>
                                        <td class="text-muted">{{ $cliente->direccion}}</td>
                                        <td>
                                            {{-- Botón editar --}}
                                            <a href="{{ route('clientes.edit', $cliente) }}"
                                                class="btn btn-sm btn-outline-warning me-1 mb-1" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            {{-- Botón eliminar --}}
                                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('¿Eliminar esta Cliente?')">
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
                                            <i class="fas fa-info-circle me-2"></i> No hay Clientes registrados.
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