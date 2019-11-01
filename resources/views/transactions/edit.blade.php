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
											<li class="breadcrumb-item"><a href="#">Transactions</a></li>
											<li class="breadcrumb-item active" aria-current="page">Add Transaction</li>
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
								<h4 class="card-title">Transaction</h4>

								<form action="{{route('transactions.update', $transaction->id)}}" method="POST">
									@csrf
									@method('PUT')
									<div class="form-group">
										<label>Project <span class="txt-red">*</span></label>
										<select class="select2 form-control custom-select @error('project_id') is-invalid @enderror" style="width: 100%; height:36px;" name="project_id" >
											
										@foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ (isset($transaction) && $transaction->project ? $transaction->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
										</select>
										@error('project_id')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label>Transaction <span class="txt-red">*</span></label>
										<select class="select2 form-control custom-select @error('transaction_type_id') is-invalid @enderror" style="width: 100%; height:36px;" name="transaction_type_id" >
											
										@foreach($transaction_types as $id => $transaction_type)
                        <option value="{{ $id }}" {{ (isset($transaction) && $transaction->transaction_type ? $transaction->transaction_type->id : old('transaction_type_id')) == $id ? 'selected' : '' }}>{{ $transaction_type }}</option>
                    @endforeach
										</select>
										@error('transaction_type_id')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label>Income Source <span class="txt-red">*</span></label>
										<select class="select2 form-control custom-select @error('income_source_id') is-invalid @enderror" style="width: 100%; height:36px;" name="income_source_id" >
											
										@foreach($transaction_types as $id => $transaction_type)
                        <option value="{{ $id }}" {{ (isset($transaction) && $transaction->transaction_type ? $transaction->transaction_type->id : old('transaction_type_id')) == $id ? 'selected' : '' }}>{{ $transaction_type }}</option>
                    @endforeach
										</select>
										@error('income_source_id')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label>Currency <span class="txt-red">*</span></label>
										<select class="select2 form-control custom-select @error('currency_id') is-invalid @enderror" style="width: 100%; height:36px;" name="currency_id" >
											
										@foreach($currencies as $id => $currency)
                        <option value="{{ $id }}" {{ (isset($transaction) && $transaction->currency ? $transaction->currency->id : old('currency_id')) == $id ? 'selected' : '' }}>{{ $currency }}</option>
                    @endforeach
										</select>
										@error('currency_id')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group">
										<label>Name <span>*</span></label>	
										<input type="text" value="{{old('name', isset($transaction)? $transaction->name: '')}}" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" required title="Enter Transaction Name">
											@error('name')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
									</div>
									<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
										<label for="description">Description</label>
										<textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description' , isset($transaction) ? $transaction->description : '') }}</textarea>
										@error('description')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
											@enderror
								  </div>
									<div class="form-group">
										<label for="transaction_date">Transaction Date</label>
										<div class="input-group date">
												<input type="text"  name="transaction_date" class="form-control @error('transaction_date') is-invalid @enderror" value="{{ old('transaction_date',  isset($transaction) ? $transaction->transaction_date : '') }}">
												<span class="input-group-addon input-group-text" ><i class="icon-calender"></i></span>
										</div>
										
										@error('transaction_date')
										<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
										</span>
										@enderror
							
									</div>
									<div class="form-group">
										<label>Amount</label>	
										<input type="number" value="{{old('amount',  isset($transaction) ? $transaction->amount : '')}}" class="form-control form-control-lg @error('amount') is-invalid @enderror" name="amount"   title="Enter Amount"  min="0" step="0.01">
											@error('amount')
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