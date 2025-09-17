@extends('layouts.app')
@section('title', 'Editar Producto')
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
                    <i class="fas fa-boxes me-2"></i> Editar Cliente
                </h1>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary shadow-sm px-3 py-2">
                    <i class="fas fa-arrow-left me-2"></i> Volver
                </a>
            </div>

            {{-- Mensajes de éxito --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Errores de validación --}}
            @if ($errors->any())
                <div class="alert alert-danger shadow-sm">
                    <i class="fas fa-exclamation-triangle me-2"></i> Corrige los siguientes errores:
                    <ul class="mt-2 mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulario --}}
            <div class="card shadow border-0">
                <div class="card-body">
                    <form action="{{ route('clientes.update', $cliente) }}" method="POST" class="row g-4">
                        @csrf
                        @method('PUT')

                        {{-- Nombre --}}
                        <div class="col-12 col-lg-6">
                            <label class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                            <input type="text" name="nombre" value="{{ $cliente->nombre }}"
                                class="form-control shadow-sm @error('nombre') is-invalid @enderror"
                                placeholder="Ej: Juan, María..." required>
                            @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Apellido --}}
                        <div class="col-12 col-lg-6">
                            <label class="form-label fw-semibold">Apellido <span class="text-danger">*</span></label>
                            <input type="text" name="apellido" value="{{ $cliente->apellido }}"
                                class="form-control shadow-sm @error('apellido') is-invalid @enderror"
                                placeholder="Ej: Pérez, García..." required>
                            @error('apellido')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Celular --}}
                        <div class="col-12 col-lg-6">
                            <label class="form-label fw-semibold">Celular <span class="text-danger">*</span></label>
                            <input type="text" name="celular" value="{{ $cliente->celular }}"
                                class="form-control shadow-sm @error('celular') is-invalid @enderror"
                                placeholder="Ej: +591 12345678" required>
                            @error('celular')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="col-12 col-lg-6">
                            <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" value="{{ $cliente->email }}"
                                class="form-control shadow-sm @error('email') is-invalid @enderror"
                                placeholder="Ej: cliente@email.com" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Dirección --}}
                        <div class="col-12">
                            <label class="form-label fw-semibold">Dirección</label>
                            <input type="text" name="direccion" value="{{ $cliente->direccion }}"
                                class="form-control shadow-sm @error('direccion') is-invalid @enderror"
                                placeholder="Ej: Calle Murillo #123, Zona Centro">
                            @error('direccion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Botones --}}
                        <div class="col-12 d-flex justify-content-end gap-3 mt-3">
                            <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-times me-2"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                <i class="fas fa-save me-2"></i> Actualizar
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection