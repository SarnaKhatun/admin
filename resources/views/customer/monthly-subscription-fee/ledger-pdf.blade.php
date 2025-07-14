<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Collection Ledger</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Monthly Collection Ledger</h1>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Account No.</th>
        <th>Account Name</th>
        <th>Date Range</th>
        <th>Monthly Taka</th>
        <th>Due Taka</th>
        <th>Advanced Taka</th>
        <th>Created Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($monthlySubscriptionFeeLedger as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->monthlySubscriptionFee->membershipAccount->account_number }}</td>
            <td>{{ $row->monthlySubscriptionFee->membershipAccount->name }}</td>
            <td>{{ $row->date_range }}</td>
            <td>{{ $row->monthly_amount }}</td>
            <td>{{ $row->due_amount ?? '0.00' }}</td>
            <td>{{ $row->advanced_amount ?? '0.00' }}</td>
            <td>{{ $row->created_at->format('d M Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
