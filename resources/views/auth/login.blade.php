@extends('layouts.app')

@section('title', 'Login')

@section('css')
	<style type="text/css">
		.login-cover {
		background: url({{ asset('img/site-bg.png') }}) no-repeat;
		background-size: cover
		}
	</style>
@endsection

@section('body-class', 'login-cover')

@section('body')
	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">
				<!-- Login form -->
				<form class="login-form" method="POST" action="{{ route('login') }}" autocomplete="off">
					@csrf
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Inicie sessión en su cuenta</h5>
								<span class="d-block text-muted">Ingrese sus credenciales</span>
							</div>
							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control" name="usuario" id="usuario" value="{{ old('usuario') }}" placeholder="Usuario">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>
							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="Contraseña">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
							</div>
							<div class="text-center">
								<a href="#">Forgot password?</a>
							</div>
						</div>
					</div>
				</form>
				<!-- /login form -->
			</div>
			<!-- /content area -->
			<!-- Footer -->
			@include('includes.footer')
			<!-- /footer -->
		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->
@endsection