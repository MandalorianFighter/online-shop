<!DOCTYPE html>
<html>
    <head>
        <title>OneTech Order Invoice</title>
    </head>
        <body>
            <ul>
                <li>Paymnet ID: {{ $info['payment_id'] }} </li>
                <li>Total Amount: ${{ $info['total'] }} </li>
                <li>Payment Type: {{ $info['payment_type'] }} </li>
                <li>Status Code: {{ $info['status_code'] }} </li>
            </ul>
        </body>
</html>