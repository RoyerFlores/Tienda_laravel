@extends('layouts.app')
@section('title', ' - Register')
@push('styles')
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
@endpush
@section('body_style', '')
@section('content')
	<!-- [ auth-signin ] start -->
	<div class="auth-wrapper">
		<div class="auth-content text-center">
			<img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid mb-4">
			<div class="card borderless">
				<div class="row align-items-center ">
					<div class="col-md-12">
						<div class="card-body">
							<form method="post" action="">
								@csrf
								@error('name')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
								<div class="form-group mb-3">
									<input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
								</div>

								@error('email')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
								<div class="form-group mb-3">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email">
								</div>

								@error('password')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
								<div class="form-group mb-3">
									<input type="password" class="form-control" id="password" name="password"
										placeholder="Contraseña">

									<!-- Indicadores de requisitos de contraseña -->
									<div class="password-requirements" id="passwordRequirements" style="display: none;">
										<div class="requirement invalid" id="lengthReq">
											<div class="requirement-icon">✗</div>
											<div class="requirement-text">Al menos 8 caracteres</div>
										</div>
										<div class="requirement invalid" id="lowercaseReq">
											<div class="requirement-icon">✗</div>
											<div class="requirement-text">Una letra minúscula</div>
										</div>
										<div class="requirement invalid" id="uppercaseReq">
											<div class="requirement-icon">✗</div>
											<div class="requirement-text">Una letra mayúscula</div>
										</div>
										<div class="requirement invalid" id="numberReq">
											<div class="requirement-icon">✗</div>
											<div class="requirement-text">Un número</div>
										</div>
										<div class="requirement invalid" id="specialReq">
											<div class="requirement-icon">✗</div>
											<div class="requirement-text">Un carácter especial (!@#$%^&*)</div>
										</div>
									</div>

									<!-- Barra de fortaleza de contraseña -->
									<div class="password-strength" id="passwordStrength" style="display: none;">
										<div class="strength-bar" id="strengthBar"></div>
									</div>
								</div>

								<div class="form-group mb-4">
									<input type="password" class="form-control" id="password_confirmation"
										name="password_confirmation" placeholder="Confirmar contraseña">
									<div id="passwordMatchMsg" class="mt-2" style="display: none;"></div>
								</div>

								<button class="btn btn-block btn-primary mb-4" type="submit">Registrar</button>
								<hr>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- [ auth-signin ] end -->
@endsection
@push('scripts')
	<script src="{{ asset('assets/js/password_validate.js') }}"></script>
@endpush