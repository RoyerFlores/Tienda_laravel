@extends('layouts.app')
@section('title', 'Nueva Venta')
@push('styles')
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
@endpush
@section('body_style', 'id=page-top')
@section('content')
    @include('layouts.partials.menu')
    <div class="pcoded-main-container">
        <div class="container py-4">

            {{-- Encabezado --}}
            <div class="d-flex align-items-center mb-4">
                <h1 class="fw-bold text-primary m-0">
                    <i class="fas fa-shopping-cart me-2"></i> Nueva Venta
                </h1>
            </div>

            {{-- Formulario --}}
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <form action="{{ route('ventas.store') }}" method="POST" class="row g-4">
                        @csrf

                        {{-- Cliente --}}
                        <div class="col-12 col-lg-6">
                            <label class="form-label fw-semibold">Cliente <span class="text-danger">*</span></label>
                            <select name="cliente_id"
                                class="form-control shadow-sm @error('cliente_id') is-invalid @enderror" required>
                                <option value="">Seleccione un cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->nombre }} {{ $cliente->apellido }}
                                    </option>
                                @endforeach
                            </select>
                            @error('cliente_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Producto --}}
                        <div class="col-12 col-lg-6">
                            <label class="form-label fw-semibold">Producto <span class="text-danger">*</span></label>
                            <select name="producto_id" id="producto_id"
                                class="form-control shadow-sm @error('producto_id') is-invalid @enderror" required>
                                <option value="">Seleccione un producto</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}" 
                                            data-precio="{{ $producto->precio_venta }}"
                                            data-stock="{{ $producto->stock }}"
                                            {{ old('producto_id') == $producto->id ? 'selected' : '' }}>
                                        {{ $producto->nombre }} (Stock: {{ $producto->stock }}) - Bs. {{ number_format($producto->precio_venta, 2) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('producto_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Cantidad --}}
                        <div class="col-12 col-lg-4">
                            <label class="form-label fw-semibold">Cantidad <span class="text-danger">*</span></label>
                            <input type="number" name="cantidad" id="cantidad" min="1" value="{{ old('cantidad', 1) }}"
                                class="form-control shadow-sm @error('cantidad') is-invalid @enderror" required>
                            @error('cantidad')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <small class="text-muted">Stock disponible: <span id="stock-disponible">0</span></small>
                        </div>

                        {{-- Precio Unitario --}}
                        <div class="col-12 col-lg-4">
                            <label class="form-label fw-semibold">Precio Unitario</label>
                            <input type="text" id="precio_unitario" class="form-control shadow-sm" readonly>
                        </div>

                        {{-- Total --}}
                        <div class="col-12 col-lg-4">
                            <label class="form-label fw-semibold">Total</label>
                            <input type="text" id="total" class="form-control shadow-sm fw-bold text-success" readonly>
                        </div>

                        {{-- Botones --}}
                        <div class="col-12 d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ route('ventas.index') }}" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-times me-2"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success px-4 shadow-sm">
                                <i class="fas fa-save me-2"></i> Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productoSelect = document.getElementById('producto_id');
            const cantidadInput = document.getElementById('cantidad');
            const precioUnitarioInput = document.getElementById('precio_unitario');
            const totalInput = document.getElementById('total');
            const stockDisponible = document.getElementById('stock-disponible');

            function actualizarPrecios() {
                const selectedOption = productoSelect.selectedOptions[0];
                if (selectedOption && selectedOption.value) {
                    const precio = parseFloat(selectedOption.dataset.precio) || 0;
                    const stock = parseInt(selectedOption.dataset.stock) || 0;
                    const cantidad = parseInt(cantidadInput.value) || 0;

                    precioUnitarioInput.value = 'Bs. ' + precio.toFixed(2);
                    stockDisponible.textContent = stock;
                    cantidadInput.max = stock;

                    const total = precio * cantidad;
                    totalInput.value = 'Bs. ' + total.toFixed(2);
                } else {
                    precioUnitarioInput.value = '';
                    totalInput.value = '';
                    stockDisponible.textContent = '0';
                }
            }

            productoSelect.addEventListener('change', actualizarPrecios);
            cantidadInput.addEventListener('input', actualizarPrecios);

            // Inicializar si hay valores previos
            actualizarPrecios();
        });
    </script>
@endsection