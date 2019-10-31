@extends('layouts.dashboard')

@section('styles')

<link rel="stylesheet" type="text/css" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/libs/dropzone/dist/min/dropzone.min.css')}}">

@endsection
@section('content')
<div class="page-breadcrumb">
	<div class="row">
			<div class="col-5 align-self-center">
					<h4 class="page-title">Dashboard</h4>
					<div class="d-flex align-items-center">
							<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Documents</a></li>
											<li class="breadcrumb-item active" aria-current="page">Add Document</li>
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
								<h4 class="card-title">Document</h4>

								<form action="{{route('documents.update', $document->id)}}" method="POST">
									@csrf
									@method('PUT')
									<div class="form-group">
										<label>Project <span class="txt-red">*</span></label>
										<select class="select2 form-control custom-select @error('project_id') is-invalid @enderror" style="width: 100%; height:36px;" name="project_id" required>
											
										@foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ (isset($document) && $document->project ? $document->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
										</select>
										@error('project_id')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group  @error('document_file') is-invalid @enderror">
										<label for="document_file">Document File*</label>
										<div class="needsclick dropzone" id="document_file-dropzone">

										</div>
										@error('document_file')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
										
									</div>
									<div class="form-group">
										<label>Title </label>	
										<input type="text" value="{{old('name', isset($document) ? $document->description : '')}}" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"  title="Enter Name">
											@error('name')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label for="description">Description</label>
										<textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" >{{ old('description', isset($document) ? $document->description : '') }}</textarea>
										@error('description')
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
<script src="{{asset('assets/libs/dropzone/dist/min/dropzone.min.js')}}"></script>

<script>
    Dropzone.options.documentFileDropzone = {
    url: '{{ route('documents.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="document_file"]').remove()
      $('form').append('<input type="hidden" name="document_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="document_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($document) && $document->document_file)
      var file = {!! json_encode($document->document_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="document_file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection