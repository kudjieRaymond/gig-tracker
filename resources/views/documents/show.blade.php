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
											<li class="breadcrumb-item"><a href="#">Documents</a></li>
											<li class="breadcrumb-item active" aria-current="page">All Documents</li>
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
								<a href="{{url()->previous()}}" class="btn btn-primary">Back to list </a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="zero_config" class="table table-striped table-bordered">
										
										<tbody>
												<tr>
													<td>Project</td>
													<td>
                                {{ $document->project->name ?? '' }}
													</td>
												</tr>
												<tr>
													<td>File</td>
													<td>
														@if($document->document_file)
                                    <a href="{{ $document->document_file->getFullUrl() }}" target="_blank">
                                        Download File
                                    </a>
                                @endif
													</td>
												</tr>
												<tr>
													<td>Name</td>
													<td>
                                {{ $document->name ?? '' }}
                          </td>
												</tr>	
												<tr>
													<td>Description</td>
													<td>
															{!! $document->description !!}
															
															
                            </td>
												</tr>
												
												
										</tbody>
									</table>
								</div>
							

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

@endsection