@extends('layouts.dashboard')

@section('content')
<div class="page-breadcrumb">
	<div class="row">
			<div class="col-5 align-self-center">
					<h4 class="page-title">Dashboard</h4>
					<div class="d-flex align-items-center">
							<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Transactions</a></li>
											<li class="breadcrumb-item active" aria-current="page">Show Transaction</li>
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
                               Project
                            </td>
													<td>
                                {{ $transaction->project->name ?? '' }}
														</td>
												</tr>
												<tr>
													<td>
															Transaction Type
													</td>
													 <td>
                                {{ $transaction->transaction_type->name ?? ''  }}
                            </td>
												</tr>
												<tr>
													<td>Income Source</td>
													<td>{{$transaction->income_source->name ?? ''}}</td>
												</tr>
												<tr>
													<td>Amount</td>
													<td> {{ $transaction->amount ?? '' }}</td>
												</tr>
												<tr>
													<td>Name</td>
													<td> {{ $transaction->name  }}</td>
												</tr>
                        <tr>
													<td>Description</td>
													<td>
                              {!! $transaction->description !!}
                          </td>
												</tr> 
                        <tr>
													<td>Transaction Date</td>
													 <td>
                              {{  $transaction->transaction_date ?? '' }}

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
