@inject('cost', 'App\Support\Cost\Contracts\CostInterface')
<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title></title>
    </head>
    <style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    text-align: right;
    padding: 8px;
}
body {
    font-family:  sans-serif;
}

tr:nth-child(even){background-color: #f2f2f2}
    </style>
    <body>


        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th>نام محصول</th>
                    <th>قیمت</th>
                    <th>تعداد</th>
                    <th>مجموع</th>

                </tr>
                @foreach($order->products as $product)
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->pivot->quantity}}</td>
                    <td>{{$product->price * $product->pivot->quantity}}</td>
                </tr>
                @endforeach
                @foreach($cost->getSummary() as $description => $price)
                <tr>
                    <td colspan=3>{{$description}}</td>
                    <td>{{$price}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan=3>مجموع</td>
                    <td>{{$cost->getTotalCosts()}}</td>

                </tr>
            </table>
        </div>
    </body>
</html>
