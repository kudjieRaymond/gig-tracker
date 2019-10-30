@extends('layouts.dashboard')

@section('content')
<div class="page-breadcrumb">
	<div class="row">
			<div class="col-5 align-self-center">
					<h4 class="page-title">Dashboard</h4>
					<div class="d-flex align-items-center">
							<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Projects</a></li>
											<li class="breadcrumb-item active" aria-current="page">Show Project</li>
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
								<a href="{{url()->previous()}}" class="btn btn-default">Back To List</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="zero_config" class="table table-striped table-bordered">
										
										<tbody>
											
												<tr>
													<td>
                                Name
                            </td>
													<td>
                                {{ $project->name ?? '' }}
														</td>
												</tr>
												<tr>
													<td>
															Client
													</td>
													 <td>
                                {{ $project->client->first_name ?? '' }}
                            </td>
												</tr>
                        <tr>
													<td>Description</td>
													<td>
                              {!! $project->description !!}
                          </td>
												</tr> 
                        <tr>
													<td>Start Date</td>
													 <td>
                              {{ $project->start_date }}

                            </td>
												</tr>    
                        <tr>
													<td>Budget</td>
													<td>
                                 {{ $project->budget }}
                            </td>
												</tr>
												<tr>
													<td>Status</td>
													<td>
                                {{ $project->status->name ?? '' }}
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
