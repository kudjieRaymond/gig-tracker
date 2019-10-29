@extends('layouts.dashboard')

@section('content')
<div class="page-breadcrumb">
	<div class="row">
			<div class="col-5 align-self-center">
					<h4 class="page-title">Dashboard</h4>
					<div class="d-flex align-items-center">
							<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Currencies</a></li>
											<li class="breadcrumb-item active" aria-current="page">Edit Currency</li>
									</ol>
							</nav>
					</div>
			</div>
	</div>
</div>
<div class="container-fluid">
	<!-- ============================================================== -->
	<!-- Datatable -->
	<!-- ============================================================== -->
	<div class="row">

	</div>
	<div class="row">
			<div class="col-12">
					<div class="card">
							
							<div class="card-body">
								<form action="{{route('currencies.update', [$currency->id])}}" method="POST">
									@csrf
									@method('PUT')
									<div class="form-group">
										<label>Name <span>*</span></label>	
										<input type="text" value="{{ old('name', isset($currency) ? $currency->name : '') }}" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" required title="Enter Currency Name">
											@error('name')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>

									<div class="form-group">
										<label>Code <span>*</span></label>	
										<input type="text" value="{{ old('code', isset($currency) ? $currency->code : '') }}" class="form-control form-control-lg @error('code') is-invalid @enderror" name="code" required title="Enter Currency code">
											@error('code')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									
									<div class="form-group">
										<h5>	Main Currency</h5>
										<label>
										<input type="radio" value="0" class="" name="main_currency" @if((isset($currency) && $currency->main_currency == '0') || old('main_currency') == 0) checked @endif >
										No </label>	
										<label>
											<input type="radio" value="1" class="" name="main_currency" @if((isset($currency) && $currency->main_currency == '1') || old('main_currency') == 1) checked @endif >Yes
										</label>
											@error('main_currency')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>

									<button type="submit" class="btn btn-primary">SAVE</button>
								</form>
							</div>
						</div>	
			</div>
		
	</div>
	<!-- ============================================================== -->

</div>
@endsection
