account_number<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 50px;
            height: auto;
        }
    </style>
</head>
<body>
<h2>Membership Accounts</h2>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Customer (Client)</th>
        <th>Reference (Director)</th>
        <th>Package</th>
        <th>Opening Balance</th>
        <th>Member Name</th>
        <th>Member ID</th>
        <th>Phone</th>
        <th>Image</th>
        <th>Created Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($membershipAccounts as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->customer->name ?? '' }}</td>
            <td>{{ $row->director->name ?? '' }}</td>
            <td>{{ $row->package->name ?? '' }}</td>
            <td>{{ $row->opening_balance ?? '' }}</td>
            <td>{{ $row->name ?? '' }}</td>
            <td>{{ $row->account_number ?? '' }}</td>
            <td>{{ $row->customer->mobile_number ?? '' }}</td>
            <td>
                @if($row->customer->image)
                    <img src="{{ public_path('backend/images/customer/' . $row->customer->image) }}" alt="membership-account">
                @else
                    <img src="{{ public_path('backend/images/no-image.png') }}" alt="no-image">
                @endif
            </td>
            <td>{{ $row->created_at->format('d-m-Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
