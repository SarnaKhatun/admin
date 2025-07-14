<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        img {
            width: 50px;
            height: auto;
        }
    </style>
</head>
<body>
<h2>Customer List</h2>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Client ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Mobile Number</th>
        <th>Email</th>
        <th>NID</th>
        <th>DOB</th>
        <th>Image</th>
        <th>Created Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($customers as $index => $customer)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $customer->client_number }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->mobile_number ?? '' }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->nid_number }}</td>
            <td>{{ $customer->dob }}</td>
            <td>
                @if($customer->image)
                    <img src="{{ public_path('backend/images/customer/' . $customer->image) }}" alt="customer" style="height: 40px; width: 40px;">
                @else
                    <img src="{{ public_path('backend/images/no-image.png') }}" alt="customer" style="height: 40px; width: 40px;">
                @endif
            </td>
            <td>{{ $customer->created_at->format('d-M-Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
