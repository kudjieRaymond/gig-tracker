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
											<li class="breadcrumb-item"><a href="#">Notes</a></li>
											<li class="breadcrumb-item active" aria-current="page">Edit Note</li>
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
								<h4 class="card-title">Note</h4>

								<form action="{{route('notes.update', $note->id)}}" method="POST">
									@csrf
									@method('PUT')
									
									<div class="form-group">
										<label>Project <span class="txt-red">*</span></label>
										<select class="select2 form-control custom-select @error('project_id') is-invalid @enderror" style="width: 100%; height:36px;" name="project_id"  required>
											
										@foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ (isset($note) && $note->project ? $note->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
										</select>
										@error('project_id')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label for="note_text">Note text</label>
										<textarea id="note_text" name="note_text" class="form-control @error('note_text') is-invalid @enderror" required>{{ old('note_text' , isset($note) ? $note->note_text : '') }}</textarea>
										@error('note_text')
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
    jQuery('.input-group.date').datepicker();
</script>
@endsection