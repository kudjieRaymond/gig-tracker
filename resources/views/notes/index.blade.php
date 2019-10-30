@extends('layouts.dashboard')
@section('styles')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">

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
											<li class="breadcrumb-item active" aria-current="page">All Notes</li>
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
								<a href="{{route('notes.create')}}" class="btn btn-primary">Add New Note</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="zero_config" class="table table-striped table-bordered">
										<thead>
												<tr>
														<th>Project</th>
														<th>Note</th>
														<th>Action</th>
												</tr>
										</thead>
										<tbody>
												@forelse ($notes as $note)
												<tr>
													<td>
                                {{ $note->project->name ?? '' }}
                            </td>
                            <td>
															{!!substr($note->note_text, 0 , 40)!!}
															
															@if(strlen($note->note_text) > 40) 
															<a href="{{route('notes.show', [$note->id])}}"> See More >></a>
															@endif
                            </td>
														<td>
															<a href="{{route('notes.show', [$note->id])}}" class="btn btn-primary btn-sm">Show</a>
															<a href="{{route('notes.edit', [$note->id])}}" class="btn btn-warning btn-sm">Edit</a>
															
																<a href="" id="{{$note->id}}" data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-danger delete-note btn-sm">Delete</a>
															
														</td>
												</tr>
												@empty
												<tr>
														<td colspan="7">No Note</td>
												</tr>
												@endforelse
										</tbody>
									</table>
								</div>
								<!-- sample modal content -->
								<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
										<div class="modal-dialog modal-sm">
												<div class="modal-content">
														<div class="modal-header">
																<h4 class="modal-title" id="mySmallModalLabel">Confirm Action</h4>
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														</div>
														<div class="modal-body">
															<form method="POST" id ="delete-form">
																@csrf
																@method('DELETE')
																<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
																<button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>	
															</form>
														</div>
												</div>
												<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
								</div>
								<!-- /.modal -->

							</div>
						</div>	
			</div>
		
	</div>
	<!-- ============================================================== -->

</div>
@endsection

@section('scripts')

<!--This page plugins -->
<script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script src="{{asset('dist/js/pages/datatable/datatable-basic.init.js')}}"></script>

<script>
	const deleteNote = document.querySelectorAll('.delete-note');
	deleteNote.forEach(el =>{
    el.addEventListener('click', function(event){
			event.preventDefault();
			let url = "{{route('notes.destroy', ':note')}}" ;
			url = url.replace(":note", event.target.id) ;

			const deleteForm = document.querySelector('#delete-form');
			deleteForm.setAttribute('action', url);
			
    })
	})
	

</script>

@endsection