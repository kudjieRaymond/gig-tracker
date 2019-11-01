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
											<li class="breadcrumb-item"><a href="#">Reports</a></li>
											<li class="breadcrumb-item active" aria-current="page">Client Reports</li>
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
		<form action="" method="GET">
    <div class="row">
        <div class="col-xs-6 col-md-5 form-group">
            <label class="control-label" for="project">Projects</label>
            <select name="project" class="form-control">
                @foreach($projects as $key => $value)
                    <option value="{{ $key }}" @if ($key==$currentProject) selected @endif>{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="control-label">&nbsp;</label><br>
            <input class="btn btn-primary" type="submit" value="Get Report">
        </div>
    </div>
</form>
	<div class="row">
			<div class="col-12">
					<div class="card">
							
							<div class="card-body">
								<div class="table-responsive">
									<table id="zero_config" class="table table-striped table-bordered">
										<thead>
												<tr>
														<th>Month</th>
														<th>Income</th>
														<th>Expenses</th>
														<th>Fees</th>
														<th>Total</th>
												</tr>
										</thead>
										<tbody>
											@foreach($entries as $date => $info)
                        @foreach($info as $currency => $row)
                            <tr>
                                <td>{{ $date }}</td>
                                <td>{{ number_format($row['income'],2) }} {{ $currency }}</td>
                                <td>{{ number_format($row['expenses'],2) }} {{ $currency }}</td>
                                <td>{{ number_format($row['fees'],2) }} {{ $currency }}</td>
                                <td>{{ number_format($row['total'],2) }} {{ $currency }}</td>
                            </tr>
                            <?php $date = ''; ?>
                        @endforeach
                    @endforeach
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