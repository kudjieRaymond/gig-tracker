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
											<li class="breadcrumb-item active" aria-current="page">Add Currency</li>
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
							 <h4 class="card-title">Currency</h4>

								<form action="{{route('currencies.store')}}" method="POST">
									@csrf
									<div class="form-group">
										<label>Name <span>*</span></label>	
										<input type="text" value="{{old('name')}}" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" required title="Enter Name">
											@error('name')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label>Code <span>*</span></label>	
										<input type="text" value="{{old('code')}}" class="form-control form-control-lg @error('code') is-invalid @enderror" name="code"  title="Enter Code">
											@error('code')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
								
								
									<div class="form-group">
										<h5>	Main Currency</h4>
										<fieldset class="radio form-control   @error('main_currency') is-invalid @enderror">	
											<label>	
											<input type="radio" value="0" class=" " name="main_currency" @if(old('main_currency') == 0) checked @endif >
										No</label>
										<label>
											<input type="radio" value="1" class="" name="main_currency" @if(old('main_currency') == 1) checked @endif >
											Yes
										</label>
									</fieldset>
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
