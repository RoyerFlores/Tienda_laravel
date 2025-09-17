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
                    <i class="fas fa-boxes me-2"></i> Editar Producto
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
                    <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data"
                        class="row g-4">
                        @csrf
                        @method('PUT')

                        {{-- Nombre --}}
                        <div class="col-12 col-lg-6">
                            <label class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                            <input type="text" name="nombre" value="{{ $producto->nombre }}"
                                class="form-control shadow-sm @error('nombre') is-invalid @enderror"
                                placeholder="Ej: Leche, Camisa, Laptop..." required>
                            @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Categoría --}}
                        <div class="col-12 col-lg-6">
                            <label class="form-label fw-semibold">Categoría <span class="text-danger">*</span></label>
                            <select name="categoria_id"
                                class="form-select shadow-sm @error('categoria_id') is-invalid @enderror" required>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" @if($producto->categoria_id == $categoria->id) selected
                                    @endif>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categoria_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Precios --}}
                        <div class="col-12 col-lg-3">
                            <label class="form-label fw-semibold">Precio Compra <span class="text-danger">*</span></label>
                            <input type="number" name="precio_compra" step="0.01" value="{{ $producto->precio_compra }}"
                                class="form-control shadow-sm @error('precio_compra') is-invalid @enderror" required>
                            @error('precio_compra')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12 col-lg-3">
                            <label class="form-label fw-semibold">Precio Venta <span class="text-danger">*</span></label>
                            <input type="number" name="precio_venta" step="0.01" value="{{ $producto->precio_venta }}"
                                class="form-control shadow-sm @error('precio_venta') is-invalid @enderror" required>
                            @error('precio_venta')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Stock y Unidad --}}
                        <div class="col-12 col-lg-3">
                            <label class="form-label fw-semibold">Stock <span class="text-danger">*</span></label>
                            <input type="number" name="stock" value="{{ $producto->stock }}"
                                class="form-control shadow-sm @error('stock') is-invalid @enderror" required>
                            @error('stock')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12 col-lg-3">
                            <label class="form-label fw-semibold">Unidad de medida</label>
                            <input type="text" name="unidad_medida" value="{{ $producto->unidad_medida }}"
                                placeholder="Ej. kg, lt, unidad"
                                class="form-control shadow-sm @error('unidad_medida') is-invalid @enderror">
                            @error('unidad_medida')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Imagen --}}
                        <div class="col-12">
                            <label class="form-label fw-semibold">Imagen del Producto</label>
                            <div class="border border-dashed border-secondary rounded-lg p-3 text-center position-relative">
                                @if($producto->imagen)
                                    <img id="preview" src="{{ asset('storage/' . $producto->imagen) }}" class="img-fluid mb-2">
                                @else
                                    <img id="preview" src="" class="img-fluid d-none mb-2">
                                    <span id="placeholder" class="text-secondary">No hay imagen seleccionada</span>
                                @endif
                                <input type="file" name="imagen" id="imagen" accept="image/*" class="form-control mt-2">
                            </div>
                        </div>

                        {{-- Botones --}}
                        <div class="col-12 d-flex justify-content-end gap-3 mt-3">
                            <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary px-4">
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

    {{-- Script de vista previa de imagen --}}
    @push('scripts')
        <script>
            const input = document.getElementById('imagen');
            const preview = document.getElementById('preview');
            const placeholder = document.getElementById('placeholder');

            input.addEventListener('change', function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        preview.src = e.target.result;
                        preview.classList.remove('d-none');
                        if (placeholder) placeholder.classList.add('d-none');
                    }
                    reader.readAsDataURL(file);
                }
            });
        </script>
    @endpush
@endsection