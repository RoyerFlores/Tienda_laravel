@extends('layouts.app')
@section('title', ' Home')
@push('styles')
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
@endpush
@section('body_style', 'id=page-top')
@section('content')
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src=" {{ asset('assets/img/navbar-logo.svg') }}" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#inicio">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#productos">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#ofertas">Ofertas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#descuentos">Descuentos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contactos</a></li>
                    <li class="nav-item">
                        <a class="btn btn-primary text-uppercase ms-lg-3 text-dark fw-bold" href="{{ route('login') }}">
                            Iniciar Sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Inicio-->
    <header class="masthead" id="inicio">
        <div class="container">
            <div class="masthead-subheading">Bienvenido !</div>
            <div class="masthead-heading text-uppercase">Tienda AJ</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="{{ route('login') }}">Iniciar Sesion</a>
        </div>
    </header>
    <!-- Productos-->
    <section class="page-section bg-light" id="productos">
        <div class="container">
            <!-- Encabezado con búsqueda y filtro -->
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                <h2 class="section-heading text-uppercase mb-3">Nuestros Productos</h2>
                <div class="d-flex gap-2 flex-wrap">
                    <input id="searchInput" class="form-control" type="text" placeholder="Buscar producto...">
                    <select id="categoryFilter" class="form-select">
                        <option value="">Todas las categorías</option>
                        <option value="Ropa">Ropa</option>
                        <option value="Electrónica">Electrónica</option>
                        <option value="Hogar">Hogar</option>
                        <option value="Accesorios">Accesorios</option>
                    </select>
                </div>
            </div>

            <!-- Grid de productos -->
            <div class="row" id="productGrid">
                <!-- Producto ejemplo -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 product-card" data-category="Ropa" data-name="Camiseta Básica">
                    <div class="card h-100">
                        <img src=" {{ asset('assets/img/portfolio/1.jpg') }}" class="card-img-top" alt="Producto">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-1">Camiseta Básica</h5>
                            <p class="text-muted small mb-1">Categoría: Ropa</p>
                            <p class="fw-bold text-primary">$15.00</p>
                        </div>
                    </div>
                </div>

                <!-- Copia y cambia datos para más productos -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 product-card" data-category="Electrónica"
                    data-name="Auriculares Bluetooth">
                    <div class="card h-100">
                        <img src=" {{ asset('assets/img/portfolio/2.jpg') }}" class="card-img-top" alt="Producto">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-1">Auriculares Bluetooth</h5>
                            <p class="text-muted small mb-1">Categoría: Electrónica</p>
                            <p class="fw-bold text-primary">$35.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 product-card" data-category="Electrónica" data-name="Leche pil">
                    <div class="card h-100">
                        <img src=" {{ asset('assets/img/portfolio/2.jpg') }}" class="card-img-top" alt="Producto">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-1">Leche Pil 500ml</h5>
                            <p class="text-muted small mb-1">Categoría: Lacteos</p>
                            <p class="fw-bold text-primary">$35.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 product-card" data-category="Electrónica"
                    data-name="Auriculares Bluetooth">
                    <div class="card h-100">
                        <img src=" {{ asset('assets/img/portfolio/2.jpg') }}" class="card-img-top" alt="Producto">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-1">Fideo</h5>
                            <p class="text-muted small mb-1">Categoría: Abarrote</p>
                            <p class="fw-bold text-primary">$35.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 product-card" data-category="Electrónica"
                    data-name="Auriculares Bluetooth">
                    <div class="card h-100">
                        <img src=" {{ asset('assets/img/portfolio/2.jpg') }}" class="card-img-top" alt="Producto">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-1">Auriculares Bluetooth</h5>
                            <p class="text-muted small mb-1">Categoría: Electrónica</p>
                            <p class="fw-bold text-primary">$35.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 product-card" data-category="Electrónica"
                    data-name="Auriculares Bluetooth">
                    <div class="card h-100">
                        <img src=" {{ asset('assets/img/portfolio/2.jpg') }}" class="card-img-top" alt="Producto">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-1">Auriculares Bluetooth</h5>
                            <p class="text-muted small mb-1">Categoría: Electrónica</p>
                            <p class="fw-bold text-primary">$35.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 product-card" data-category="Electrónica"
                    data-name="Auriculares Bluetooth">
                    <div class="card h-100">
                        <img src=" {{ asset('assets/img/portfolio/2.jpg') }}" class="card-img-top" alt="Producto">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-1">Auriculares Bluetooth</h5>
                            <p class="text-muted small mb-1">Categoría: Electrónica</p>
                            <p class="fw-bold text-primary">$35.00</p>
                        </div>
                    </div>
                </div>

                <!-- Agregar más productos hasta un máximo de 12 -->
            </div>
        </div>
    </section>

    <!-- Ofertas -->
    <section class="page-section bg-light" id="ofertas">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-heading text-uppercase">Ofertas</h2>
                <h3 class="section-subheading text-muted">Descubre nuestras ofertas</h3>
            </div>

            <!-- Carrusel de Productos -->
            <div id="productosCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <!-- Grupo de 4 productos -->
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/1.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 1">
                                <div class="text-center mt-2">
                                    <h5>Producto 1</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/2.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 2">
                                <div class="text-center mt-2">
                                    <h5>Producto 2</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/3.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 3">
                                <div class="text-center mt-2">
                                    <h5>Producto 3</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/4.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 4">
                                <div class="text-center mt-2">
                                    <h5>Producto 4</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grupo siguiente -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/2.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 2">
                                <div class="text-center mt-2">
                                    <h5>Producto 2</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/3.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 3">
                                <div class="text-center mt-2">
                                    <h5>Producto 3</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/4.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 4">
                                <div class="text-center mt-2">
                                    <h5>Producto 4</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/5.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 5">
                                <div class="text-center mt-2">
                                    <h5>Producto 5</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grupo siguiente -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/3.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 3">
                                <div class="text-center mt-2">
                                    <h5>Producto 3</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/4.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 4">
                                <div class="text-center mt-2">
                                    <h5>Producto 4</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/5.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 5">
                                <div class="text-center mt-2">
                                    <h5>Producto 5</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/6.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 6">
                                <div class="text-center mt-2">
                                    <h5>Producto 6</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Controles -->
                <button class="carousel-control-prev" type="button" data-bs-target="#productosCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productosCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- Descuentos-->
    <section class="page-section bg-light" id="descuentos">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-heading text-uppercase">Descuentos</h2>
                <h3 class="section-subheading text-muted">Descubre nuestros decuentos</h3>
            </div>

            <!-- Carrusel de Productos -->
            <div id="productosCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <!-- Grupo de 4 productos -->
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/1.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 1">
                                <div class="text-center mt-2">
                                    <h5>Producto 1</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/2.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 2">
                                <div class="text-center mt-2">
                                    <h5>Producto 2</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/3.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 3">
                                <div class="text-center mt-2">
                                    <h5>Producto 3</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/4.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 4">
                                <div class="text-center mt-2">
                                    <h5>Producto 4</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grupo siguiente -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/2.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 2">
                                <div class="text-center mt-2">
                                    <h5>Producto 2</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/3.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 3">
                                <div class="text-center mt-2">
                                    <h5>Producto 3</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/4.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 4">
                                <div class="text-center mt-2">
                                    <h5>Producto 4</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/5.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 5">
                                <div class="text-center mt-2">
                                    <h5>Producto 5</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grupo siguiente -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/3.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 3">
                                <div class="text-center mt-2">
                                    <h5>Producto 3</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/4.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 4">
                                <div class="text-center mt-2">
                                    <h5>Producto 4</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/5.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 5">
                                <div class="text-center mt-2">
                                    <h5>Producto 5</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src=" {{ asset('assets/img/portfolio/6.jpg') }}" class="d-block w-100 rounded"
                                    alt="Producto 6">
                                <div class="text-center mt-2">
                                    <h5>Producto 6</h5>
                                    <p class="text-muted">Descripción breve.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Controles -->
                <button class="carousel-control-prev" type="button" data-bs-target="#productosCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productosCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contacto</h2>
                <h3 class="section-subheading text-muted">Llenar los campos correspondientes</h3>
            </div>
            <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" type="text" placeholder="Nombre *"
                                data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">Campo obligatorio</div>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="email" type="email" placeholder="Correo Electronico *"
                                data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">Campo obligatorio</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Correo electronico no valido</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" type="tel" placeholder="Numero de celular *"
                                data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">Campo obligatorio</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" placeholder="Mensaje *"
                                data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">Campo obligatorio</div>
                        </div>
                    </div>
                </div>
                <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center text-white mb-3">
                        <div class="fw-bolder">Formulario enviado exitosamente!</div>
                        <br />
                        <a href="https://startbootstrap.com/solution/contact-forms">Ingresar al link</a>
                    </div>
                </div>
                <div class="d-none" id="submitErrorMessage">
                    <div class="text-center text-danger mb-3">Error en el mensaje !</div>
                </div>
                <!-- Submit Button-->
                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton"
                        type="submit">Enviar mensaje</button></div>
            </form>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Tienda AJ 2025</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Politica de privacidad</a>
                    <a class="link-dark text-decoration-none" href="#!">Terminos y condiciones</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->

    <script>
        // Filtrar productos
        document.getElementById("searchInput").addEventListener("input", filterProducts);
        document.getElementById("categoryFilter").addEventListener("change", filterProducts);

        function filterProducts() {
            let searchValue = document.getElementById("searchInput").value.toLowerCase();
            let categoryValue = document.getElementById("categoryFilter").value;

            document.querySelectorAll(".product-card").forEach(card => {
                let name = card.getAttribute("data-name").toLowerCase();
                let category = card.getAttribute("data-category");

                let matchesSearch = name.includes(searchValue);
                let matchesCategory = categoryValue === "" || category === categoryValue;

                if (matchesSearch && matchesCategory) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            });
        }
    </script>

    <style>
        .card img {
            max-height: 180px;
            object-fit: cover;
        }

        .producto-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .producto-card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .product-card .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
            /* Para que parezca un link */
        }

        .product-card .card:hover {
            transform: scale(1.05);
            /* Aumenta ligeramente el tamaño */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            /* Sombra para resaltar */
        }

        .product-card .card:hover {
            border: 2px solid #007bff;
            /* Color del borde */
        }
    </style>
@endsection