@inject('cost' , 'App\Support\Cost\Contracts\CostInterface')
<div class="card bg-light">
    <div class="card-body">
        <h4>@lang('payment.cart summary')</h4>
        <hr>
        <div class="well">
            <table class='table'>
                @foreach($cost->getSummary() as $description => $price)
                <tr>
                    <td>{{$description}}</td>
                    <td> {{number_format($price)}} @lang('payment.toman')</td>
                </tr>
                @endforeach
                <tr>
                    <td>@lang('payment.basket total')</td>
                    <td> {{number_format($cost->getTotalCosts())}} @lang('payment.toman')</td>
                </tr>
                <tr>
                    @auth
                    <td>
                        @lang('payment.coupon')
                    </td>
                    <td>
                        @if(session()->has('coupon'))
                        <form action="{{route('coupons.remove')}}" method="get">
                            @csrf
                            <div class="input-group">
                                <span >{{session()->get('coupon')->code}}</span>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-sm  ml-3" type="submit">@lang('payment.remove')</button>
                                </span>
                            </div>
                        </form>
                        @else
                        <form action="{{route('coupons.store')}}"  method="post">
                            @csrf
                            <div class="input-group">
                                <input id='coupon' name='coupon' type="text" class="form-control">
                                <span class="input-group-btn">
                                    <button id='coupon-apply' class="btn btn-primary  ml-3" type="submit">@lang('payment.apply')</button>
                                </span>
                            </div>
                        </form>
                        @endif

                    </td>
                    @endauth
                </tr>
            </table>
        </div>
    </div>
</div>

