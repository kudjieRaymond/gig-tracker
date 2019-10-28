@extends('layouts.dashboard')

@section('styles')

<link rel="stylesheet" type="text/css" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">

@endsection
@section('content')
<div class="page-breadcrumb">
	<div class="row">
			<div class="col-5 align-self-center">
					<h4 class="page-title">Dashboard</h4>
					<div class="d-flex align-items-center">
							<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Clients</a></li>
											<li class="breadcrumb-item active" aria-current="page">Edit Client</li>
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
								<form action="{{route('clients.update', [$client->id])}}" method="POST">
									@csrf
									@method('PUT')
									<div class="form-group">
										<label>First name <span>*</span></label>	
										<input type="text" value="{{ old('first_name', isset($client) ? $client->first_name : '') }}" class="form-control form-control-lg @error('first_name') is-invalid @enderror" name="first_name" required title="Enter First Name">
											@error('first_name')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label>Last name <span>*</span></label>	
										<input type="text" value="{{ old('last_name', isset($client) ? $client->last_name : '') }}" class="form-control form-control-lg @error('last_name') is-invalid @enderror" name="last_name" required title="Enter Last Name">
											@error('last_name')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label>Company name </label>	
										<input type="text" value="{{old('company' , isset($client) ? $client->company : '')}}" class="form-control form-control-lg @error('company') is-invalid @enderror" name="company"  title="Enter Company Name">
											@error('company')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label>Email</label>	
										<input type="email" value="{{old('email' , isset($client) ? $client->email : '')}}" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"   title="Enter Email">
											@error('email')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label>Phone </label>	
										<input type="text" value="{{old('phone' , isset($client) ? $client->phone : '')}}" class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone"   title="Enter Phone">
											@error('phone')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label>Website </label>	
										<input type="text" value="{{old('website', isset($client) ? $client->website : '')}}" class="form-control form-control-lg @error('website') is-invalid @enderror" name="website"   title="Enter Website">
											@error('website')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label>Skype Id </label>	
										<input type="text" value="{{old('skype',  isset($client) ? $client->skype : '')}}" class="form-control form-control-lg @error('skype') is-invalid @enderror" name="skype"   title="Enter Skype Id">
											@error('skype')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label>Country </label>	
										<input type="text" value="{{old('country', isset($client) ? $client->country : '')}}" class="form-control form-control-lg @error('country') is-invalid @enderror" name="country"   title="Enter Country">
											@error('country')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label>Client Status <span class="txt-red">*</span></label>
										<select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="status" >
											
											<option disabled selected> Select Client Status</option>
											<option value="active" {{ (isset($client) && $client->status ? $client->status : old('status')) == 'active' ? 'selected' : '' }}>Active</option>
											<option value="inactive" {{ (isset($client) && $client->status ? $client->status : old('status')) == 'inactive' ? 'selected' : '' }}>
													Inactive
											</option>
									  </select>
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
@section('scripts')

<script src="{{asset('assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('dist/js/pages/forms/select2/select2.init.js')}}"></script>

@endsection