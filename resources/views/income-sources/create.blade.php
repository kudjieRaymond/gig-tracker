@extends('layouts.dashboard')

@section('content')
<div class="page-breadcrumb">
	<div class="row">
			<div class="col-5 align-self-center">
					<h4 class="page-title">Dashboard</h4>
					<div class="d-flex align-items-center">
							<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Income Sources</a></li>
											<li class="breadcrumb-item active" aria-current="page">Add Income Source</li>
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
							 <h4 class="card-title">Income Sources</h4>

								<form action="{{route('income-sources.store')}}" method="POST">
									@csrf
									<div class="form-group">
										<label>Title <span>*</span></label>	
										<input type="text" value="{{old('name')}}" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" required title="Enter Income Source">
											@error('name')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
								
									<div class="form-group">
										<label>Fee Percent </label>	
										<input type="number" value="{{old('fee_perccent')}}" class="form-control form-control-lg @error('fee_percent') is-invalid @enderror" name="fee_percent" min="0"  title="Enter Fee Percent">
											@error('fee_percent')
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
