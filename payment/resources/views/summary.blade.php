@inject('basket' , 'App\Support\Basket\Basket')
<div class="card bg-light">
	<div class="card-body">
		<h4>@lang('payment.cart summary')</h4>
		<hr>
		<div class="well">
			<table class='table'>
				<tr>
					<td>@lang('payment.item total')</td>
					<td> {{number_format($basket->subTotal())}} @lang('payment.toman')</td>
				</tr>
				<tr>
					<td>@lang('payment.shipping')</td>
					<td> {{number_format(10000)}} @lang('payment.toman')</td>
				</tr>
				<tr>
					<td>@lang('payment.basket total')</td>
					<td> {{number_format($basket->subTotal() + 10000 )}} @lang('payment.toman')</td>
				</tr>
			</table>
		</div>
	</div>
</div>

