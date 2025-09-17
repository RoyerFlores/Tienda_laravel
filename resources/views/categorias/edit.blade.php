@extends('layouts.app')
@section('title', ' Dashboard')
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
                    <i class="fas fa-edit me-2"></i> Editar Categoría
                </h1>
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary shadow-sm px-3 py-2">
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
                    <form action="{{ route('categorias.update', $categoria) }}" method="POST" class="row g-4">
                        @csrf
                        @method('PUT')

                        <div class="col-12">
                            <label class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                            <input type="text" name="nombre" value="{{ old('nombre', $categoria->nombre) }}"
                                class="form-control shadow-sm @error('nombre') is-invalid @enderror" required>
                            @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Descripción</label>
                            <textarea name="descripcion" rows="4"
                                class="form-control shadow-sm @error('descripcion') is-invalid @enderror"
                                placeholder="Opcional">{{ old('descripcion', $categoria->descripcion) }}</textarea>
                            @error('descripcion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-3">
                            <a href="{{ route('categorias.index') }}" class="btn btn-outline-secondary px-4">
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