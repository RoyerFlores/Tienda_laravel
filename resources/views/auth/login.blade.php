@extends('layouts.app')
@section('title', ' - Login')
@push('styles')
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
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
							@if(session('error'))
								<div class="alert alert-danger">
									{{ session('error') }}
								</div>
							@endif
							<form method="post" action="">
								@csrf
								<h4 class="mb-3 f-w-400">Iniciar Sesion</h4>
								<hr>
								@error('message')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
								<div class="form-group mb-3">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email">
								</div>
								<div class="form-group mb-4">
									<input type="password" class="form-control" id="calve" name="password"
										placeholder="Contraseña">
								</div>
								<button class="btn btn-block btn-primary mb-4" type="submit">Iniciar Sesion</button>
								<hr>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection