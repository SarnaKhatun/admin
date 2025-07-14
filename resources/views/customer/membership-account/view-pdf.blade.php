<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Membership Account PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2, h3 {
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
        img {
            max-width: 100px;
        }
    </style>
</head>
<body>
<h2>Membership Account Details</h2>
<table>
    <tr>
        <th>ClientId</th>
        <td>{{ $membershipAccount->customer->client_number ?? '' }}</td>
    </tr>
    <tr>
        <th>Client</th>
        <td>{{ $membershipAccount->customer->name ?? '' }}</td>
    </tr>
    <tr>
        <th>Director</th>
        <td>{{ $membershipAccount->director->name ?? '' }}</td>
    </tr>
    <tr>
        <th>Package</th>
        <td>{{ $membershipAccount->package->name ?? '' }}</td>
    </tr>
    <tr>
        <th>Opening Balance</th>
        <td>{{ $membershipAccount->opening_balance ?? '' }}</td>
    </tr>
    <tr>
        <th>Member Number</th>
        <td>{{ $membershipAccount->account_number ?? '' }}</td>
    </tr>
    <tr>
        <th>Member Name</th>
        <td>{{ $membershipAccount->name ?? '' }}</td>
    </tr>
    <tr>
        <th>Father's Name</th>
        <td>{{ $membershipAccount->customer->father_name_en ?? '' }}</td>
    </tr>
    <tr>
        <th>Mother's Name</th>
        <td>{{ $membershipAccount->customer->mother_name_en ?? '' }}</td>
    </tr>
    <tr>
        <th>Husband/Wife's Name</th>
        <td>{{ $membershipAccount->customer->husband_or_wife_name_bn ?? '' }}</td>
    </tr>
    <tr>
        <th>Present Address</th>
        <td>{{ $membershipAccount->customer->present_address_en ?? '' }}</td>
    </tr>
    <tr>
        <th>Permanent Address</th>
        <td>{{ $membershipAccount->customer->permanent_address_en ?? '' }}</td>
    </tr>
    <tr>
        <th>Phone</th>
        <td>{{ $membershipAccount->customer->phone ?? '' }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $membershipAccount->customer->email ?? '' }}</td>
    </tr>
    <tr>
        <th>Date of Birth</th>
        <td>{{ $membershipAccount->customer->dob ?? ''}}</td>
    </tr>
    <tr>
        <th>Blood Group</th>
        <td>{{ $membershipAccount->customer->blood_group ?? ''}}</td>
    </tr>
    <tr>
        <th>Occupation</th>
        <td>{{ $membershipAccount->customer->occupation ?? ''}}</td>
    </tr>
    <tr>
        <th>NID Number</th>
        <td>{{ $membershipAccount->customer->nid_number ?? ''}}</td>
    </tr>
    <tr>
        <th>TIN Number</th>
        <td>{{ $membershipAccount->customer->tin_number ?? ''}}</td>
    </tr>
    <tr>
        <th>Passport Number</th>
        <td>{{ $membershipAccount->customer->passport_number ?? ''}}</td>
    </tr>
    <tr>
        <th>Special Instruction</th>
        <td>{!! $membershipAccount->special_instruction ?? '' !!}</td>
    </tr>
    <tr>
        <th>Created Date</th>
        <td>{{ $membershipAccount->created_at->format('d-m-Y') ?? '' }}</td>
    </tr>
    <tr>
        <th>Image</th>
        <td>
            @if($membershipAccount->customer->image)
                <img src="{{ public_path('backend/images/customer/'.$membershipAccount->customer->image) }}" alt="Member Image">
            @else
                <img src="{{ public_path('backend/images/no-image.png') }}" alt="No Image">
            @endif
        </td>
    </tr>
</table>

<h3>Nominee Details</h3>
<table>
    <tr>
        <th>Name(English)</th>
        <td>{{ $membershipAccount->nominee_name_en ?? '' }}</td>
    </tr>
    <tr>
        <th>Name(Bangla)</th>
        <td>{{ $membershipAccount->nominee_name_bn ?? '' }}</td>
    </tr>
    <tr>
        <th>Relation with Member</th>
        <td>{{ $membershipAccount->relation_with_member ?? '' }}</td>
    </tr>
    <tr>
        <th>Date of Birth</th>
        <td>{{ $membershipAccount->nominee_dob ?? '' }}</td>
    </tr>
    <tr>
        <th>NID Number</th>
        <td>{{ $membershipAccount->nominee_nid_number ?? '' }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $membershipAccount->nominee_address ?? '' }}</td>
    </tr>
    <tr>
        <th>Client No.</th>
        <td>{{$membershipAccount->client_number}}</td>
    </tr>
    <tr>
        <th>Introductory Name</th>
        <td>{{$membershipAccount->introductory_name}}</td>
    </tr>
    <tr>
        <th>Image</th>
        <td>
            @if($membershipAccount->nominee_image)
                <img src="{{ public_path('backend/images/membership-accounts/'.$membershipAccount->nominee_image) }}" alt="Nominee Image">
            @else
                <img src="{{ public_path('backend/images/no-image.png') }}" alt="No Image">
            @endif
        </td>
    </tr>
    <tr>
        <th>Signature</th>
        <td>
            @if($membershipAccount->nominee_signature)
                <img src="{{ public_path('backend/images/membership-accounts/'.$membershipAccount->nominee_signature) }}" alt="Nominee Signature">
            @else
                <img src="{{ public_path('backend/images/no-image.png') }}" alt="No Signature">
            @endif
        </td>
    </tr>
</table>
</body>
</html>
