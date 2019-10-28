@extends('layouts.dashboard')
@section('styles')

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
											<li class="breadcrumb-item active" aria-current="page">Show Client</li>
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
                               First Name
                            </td>
													<td>
                                {{ $client->first_name ?? '' }}
														</td>
												</tr>
												<tr>
													<td>
														Last Name
													</td>
													 <td>
                                {{ $client->last_name ?? '' }}
                            </td>
												</tr>
                        <tr>
													<td>Company</td>
													<td>
                              {{ $client->company ?? '' }}
                          </td>
												</tr> 
                        <tr>
													<td>Email</td>
													 <td>
                                {{ $client->email ?? '' }}
                            </td>
												</tr>    
                        <tr>
													<td>Phone</td>
													<td>
                                {{ $client->phone ?? '' }}
                            </td>
												</tr>
												<tr>
													<td>Website</td>
													<td>
                                {{ $client->website ?? '' }}
                            </td>
												</tr>
                        <tr>
													<td>Skype</td>
													 <td>
                                {{ $client->skype ?? '' }}
                            </td>
												</tr>
												<tr>
													<td>Country</td>
													<td>
                                {{ $client->country ?? '' }}
                            </td>
												</tr>
												<tr>
													<td>Status</td>
													<td>
                                {{ $client->status ?? '' }}
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



@endsection