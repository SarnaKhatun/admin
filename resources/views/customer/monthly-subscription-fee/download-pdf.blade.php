<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Collection List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
<h2>Monthly Collection List (Page {{ $monthlySubscriptionFees->currentPage() }})</h2>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Account Number</th>
        <th>Account Name</th>
        <th>Director Name</th>
        <th>Scheme</th>
        <th>Total Collection</th>
    </tr>
    </thead>
    <tbody>
    @foreach($monthlySubscriptionFees as $index => $row)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $row->membershipAccount->account_number }}</td>
            <td>{{ $row->membershipAccount->name }}</td>
            <td>{{ $row->membershipAccount->director->name }}</td>
            <td>{{ $row->package->name }} - {{ $row->package_value }}</td>
            <td>{{ $row->total_amount }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
