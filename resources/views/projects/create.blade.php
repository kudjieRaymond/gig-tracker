@extends('layouts.dashboard')

@section('styles')

<link rel="stylesheet" type="text/css" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection
@section('content')
<div class="page-breadcrumb">
	<div class="row">
			<div class="col-5 align-self-center">
					<h4 class="page-title">Dashboard</h4>
					<div class="d-flex align-items-center">
							<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Projects</a></li>
											<li class="breadcrumb-item active" aria-current="page">Add Project</li>
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
								<h4 class="card-title">Project</h4>

								<form action="{{route('projects.store')}}" method="POST">
									@csrf
									<div class="form-group">
										<label>Name <span>*</span></label>	
										<input type="text" value="{{old('name')}}" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" required title="Enter Project Name">
											@error('name')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label>Client <span class="txt-red">*</span></label>
										<select class="select2 form-control custom-select @error('client_id') is-invalid @enderror" style="width: 100%; height:36px;" name="client_id" >
											
										@foreach($clients as $id => $client)
                        <option value="{{ $id }}" @if (old('client_id') == $id)  selected @endif>{{ $client }}</option>
                    @endforeach
										</select>
										@error('client_id')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
										<label for="description">Description</label>
										<textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
										@error('description')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
								  </div>
									<div class="form-group">
										<label for="start_date">Start Date</label>
										<div class="input-group date">
												<input type="text"  name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}">
												<span class="input-group-addon input-group-text" ><i class="icon-calender"></i></span>
										</div>
										
										@error('start_date')
										<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
										</span>
										@enderror
							
									</div>
									<div class="form-group">
										<label>Budget</label>	
										<input type="number" value="{{old('budget')}}" class="form-control form-control-lg @error('budget') is-invalid @enderror" name="budget"   title="Enter Budget"  min="0" step="0.01">
											@error('budget')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									
									<div class="form-group">
										<label>Project Status <span class="txt-red">*</span></label>
										<select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="status_id" >
											
											@foreach($statuses as $id => $status)
                        <option value="{{ $id }}" @if (old('status_id') == $id)  selected @endif>{{ $status }}</option>
                    @endforeach
										</select>
										@error('status_id')
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
@section('scripts')


<script src="{{asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('dist/js/pages/forms/select2/select2.init.js')}}"></script>

<script src="{{asset('assets/libs/moment/moment.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
    // Date Picker
    jQuery(' .input-group.date').datepicker();
   
    </script>
@endsection