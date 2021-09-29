@extends('layouts.app')


@section('content')

<div class="row mt-5">
	<div class="col-md-8">

		<div class="card">
			<div class="card-header">
				@lang('payment.user information')
			</div>
			<div class="card-body">
				<ul class="list-group list-group-flush">
					<li class="list-group-item">@lang('payment.grabber') : {{Auth::user()->name}}</li>
					<li class="list-group-item">@lang('payment.address') : {{Auth::user()->address}}</li>
					<li class="list-group-item">@lang('payment.phone number') : {{Auth::user()->phone_number}}</li>
				</ul>
			</div>
		</div>		
	</div>
	<div class="col-md-4">
		@include('summary')
		<a onclick="event.preventDefault();document.getElementById('checkout-form').submit()" class="btn btn-primary d-block w-100">@lang('payment.pay')</a>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				@lang('payment.pay ways')
			</div>
			<div class="card-body">
			<form action="{{route('basket.checkout')}}" id='checkout-form' method="post" >
					@csrf
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<div class="custom-control custom-radio col-md-6 custom-control-inline">
								<input type="radio" id="online" value="online" name="method" class="custom-control-input">
								<label class="custom-control-label" for="online">
									پرداخت آنلاین
								</label>

							</div>

							<select name='gateway'  class="custom-select col-md-4  custom-control-inline">
								<option value="saman">سامان</option>
								<option value="pasargad">پاسارگاد</option>
							</select>

							<p class='text-muted small'>
							در این روش شما میتونید درب منزل خود مبلغ را پرداخت نمایید
							</p>
						</li>

						<li class="list-group-item">
							<div class="custom-control custom-radio">
								<input type="radio" id="cash" value="cash" name="method" class="custom-control-input">
								<label class="custom-control-label" for="cash">
									پرداخت نقدی
								</label>
							</div>

							<p class='text-muted small'>
							در این روش شما میتونید درب منزل خود مبلغ را پرداخت نمایید
							</p>

						</li>
						<li class="list-group-item">
							<div class="custom-control custom-radio">
								<input type="radio" id="cart" value="cart" name="method" class="custom-control-input">
								<label class="custom-control-label" for="cart">
									کارت به کارت 
								</label>
							</div>

							<p class='text-muted small'>
							لطفا مبلغ را به شماره کارت ۵۵۵۵−۵۵۵۵−۵۵۵۵−۵۵۵۵ واریز نمایدد و کد پیگیری را به همکاران ما اطلاع دهید
							</p>

						</li>
					</ul>
				</form>
				@include('partials.validation')
			</div>
		</div>

	</div>
</div>



@endsection

