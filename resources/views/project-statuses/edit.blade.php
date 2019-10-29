@extends('layouts.dashboard')

@section('content')
<div class="page-breadcrumb">
	<div class="row">
			<div class="col-5 align-self-center">
					<h4 class="page-title">Dashboard</h4>
					<div class="d-flex align-items-center">
							<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Project Statuses</a></li>
											<li class="breadcrumb-item active" aria-current="page">Edit Project Status</li>
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
								<form action="{{route('project-statuses.update', [$projectStatus->id])}}" method="POST">
									@csrf
									@method('PUT')
									<div class="form-group">
										<label>Name <span>*</span></label>	
										<input type="text" value="{{ old('name', isset($projectStatus) ? $projectStatus->name : '') }}" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" required title="Enter Project Status Name">
											@error('name')
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
