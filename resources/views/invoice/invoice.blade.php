<!DOCTYPE html>
<html lang="pl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice {{ $order->id }}</title>
    <meta charset="UTF-8">

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">{{ $client->company_name }}</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Miejsce wystawienia:</span> <br>
                    <span> {{  $user->city }}</span> <br>
                    <span>Data wystawienia:</span> <br>
                    <span>{{ Carbon\Carbon::now()->toDateString() }}</span> <br>
                    <span>Data wykonania uslugi:</span> <br>
                    <span>{{ $order->end_date }} </span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Sprzedawca</th>
                <th width="50%" colspan="2">Nabywca</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Numer zamówienia:</td>
                <td>{{ $order->id }}</td>

                @if($client->company_name)
                    <td>Nazwa firmy, Imie i nazwisko</td>
                    <td>{{ $client->company_name }}, {{ $client->name }} {{ $client->surname }}</td>
                @else
                    <td>Imie i nazwisko</td>
                    <td>{{ $client->name }} {{ $client->surname }}</td>
                @endif
                
            </tr>
            <tr>
                <td>Nazwa firmy:</td>
                <td>{{ $client->company_name }}</td>
                @if($client->NIP)
                    <td>NIP:</td>
                    <td>{{$client->NIP }}</td>
                @else
                    <td>Email:</td>
                    <td>{{ $client->email }}</td>
                @endif
            </tr>
            <tr>
                <td>NIP:</td>
                <td>{{ $user->NIP }}</td>

                <td>Numer telefonu:</td>
                <td>{{ $client->phone }}</td>
            </tr>
            <tr>
                <td>Adres:</td>
                <td>{{ $user->street }}</td>

                <td>Adres:</td>
                <td>{{ $address->street }}</td>
            </tr>
            <tr>
                <td>{{ $user->ZIP }}</td>
                <td>{{ $user->city }}</td>

                <td>{{ $address->ZIP }}</td>
                <td>{{ $address->city }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Nazwa uslugi
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Usluga</th>
                <th>Cena</th>
                <th>VAT</th>
                <th>Cala kwota</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="10%">{{ $order->id }}</td>
                <td>
                   {{ $order->description }}
                </td>
                <td width="10%">{{ $order->price }}zl</td>
                <td width="10%">23%</td>
                <td width="15%" class="fw-bold">{{ ($order->price * 0.23) + $order->price }}zl</td>
            </tr>
        </tbody>
    </table>
</body>
</html>