<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Details Form | Client Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto Slab', serif;
            font-size: 16px;
            font-weight: 500
        }

        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .page {
            background: white;
            width: 21cm;
            /* height: 29.7cm; */
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
            /* overflow: hidden; */
        }

        .header {
            text-align: center;
            position: relative;
        }

        @media print {

            .print-btn {
                display: none
            }

            body .backBtn {
                display: none !important;
            }
        }

        .header img {
            width: 100%;
            height: auto;
        }

        /* Text positioned over the image */


        .content {
            margin-top: 150px;
        }

        /* Print button */
        .print-btn {
            padding: 10px 20px;
            background-color: #2661AC;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
            position: absolute;
            bottom: 0px;
            left: 480px;
            transform: translateX(-50%);
            z-index: 9999;
        }

        .print-btn:hover {
            background-color: #1e4a8b;
        }

        .content {
            position: absolute;
            top: 0px;
            left: 20px;

        }

        .top_content span {
            position: absolute;
            left: 180px;
            width: 325px;
            top: 143px;
            font-size: 16px;
            font-weight: 500;
        }

        img.main_photo {
            position: absolute;
            width: 110px;
            height: 136px;
            right: 2px;
            top: -107px;
            object-fit: cover;
        }

        .date {
            position: absolute;
            left: 530px;
            display: flex;
            top: 37px;
            width: 186px;
        }

        .date small {
            width: 20px;
            font-size: 15px;
            font-weight: normal;
            text-align: center;
        }

        .date small:nth-child(2) {
            position: absolute;
            left: 22px;
        }

        .date small:nth-child(3) {
            position: absolute;
            left: 52px;
        }

        .date small:nth-child(4) {
            position: absolute;
            left: 75px;
        }

        .date small:nth-child(5) {
            position: absolute;
            left: 103px;
        }

        .date small:nth-child(6) {
            position: absolute;
            left: 128px;
        }

        .date small:nth-child(7) {
            position: absolute;
            left: 152px;
        }

        .date small:nth-child(8) {
            position: absolute;
            left: 175px;
        }

        span.member_no {
            position: absolute;
            left: 555px;
            top: 70px;
            width: 162px;
            font-size: 15px;
            font-weight: 400;
            letter-spacing: 2px;
        }

        span.saving_amount {
            position: absolute;
            left: 555px;
            top: 100px;
            font-size: 15px;
            letter-spacing: 2px;
            font-weight: 500;
        }

        a.backBtn {
            background: #2661ac;
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            display: inline-block;
            position: absolute;
            bottom: 0;
            left: 320px;
        }

        h6.e_name,
        h6.m_name,
        h6.s_name,
        h6.ba_name {
            margin-top: 10px;
        }

        h6.f_name {
            margin-top: 10px;
        }

        h6.p_address {
            margin-top: 12px;
            width: 390px;
        }

        h6.p_village {
            margin-left: 40px;
            margin-top: 5px;
        }

        h6.p_thana {
            margin-left: 40px;
            width: 160px;
        }

        h6.p_district {
            margin-left: 42px;
        }

        h6.p_post {
            width: 190px;
        }

        h6.n_relation {
            margin-left: 50px;
            width: 187px;
        }

        h6.n_name {
            width: 237px;
        }

        .n_address {
            width: 465px;
            word-wrap: break-word;
            line-height: 2
        }

        h6.p_name {
            width: 230px;
        }

        h6.p_member_no {
            margin-left: 68px;
            width: 135px;
            letter-spacing: 2px;
        }

        img.nominy_photo {
            width: 110px;
            height: 136px;
            position: absolute;
            right: 3px;
            top: 570px;
            object-fit: cover;
        }
    </style>
</head>

<body>
<div>
    <button class="print-btn" onclick="window.print()">Print</button>
    <a href="{{ url()->previous() }}" class="backBtn">Back</a>
</div>

<div class="page" id="invoice_print">
    <div class="header">
        <img src="https://i.ibb.co.com/xY1ncMV/format.jpg" alt="Header Image">
    </div>

    <div class="content">
        <div class="top_content">
            <span>{{ $membershipAccount->customer->name_bn ?? 'N/A' }}</span>
            <div class="content_right">
                <img class="main_photo"
                     src="{{ asset('backend/images/customer/' . $membershipAccount->customer->image) }}"
                     alt="360-F-224869519-a-Rae-Lneq-ALf-PNBzg0xx-MZXghtv-BXkf-IA">

                <div class="content_right_info">


                    <div class="date">
                        @php
                            $dateString = \Carbon\Carbon::parse($membershipAccount->date)->format('dmY');
                            $dateCharacters = str_split($dateString);
                        @endphp
                        @foreach ($dateCharacters as $index => $char)
                            <small>{{ $char }}</small>
                        @endforeach
                    </div>
                    <div>
                        <span class="member_no">{{ $membershipAccount->account_number ?? 'N/A' }}</span>


                    </div>
                    <div>
                        <span class="saving_amount">{{$membershipAccount->package->value ?? 'N/A'}}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="main_content" style="margin-top: 220px;margin-left:140px">
            <h6 class="b_name">{{ $membershipAccount->customer->name_bn ?? 'N/A' }}</h6>
            <h6 class="e_name">{{ $membershipAccount->customer->name ?? 'N/A' }}</h6>
            <h6 class="f_name">{{ $membershipAccount->customer->father_name_bn ?? 'N/A' }}</h6>
            <h6 class="m_name">{{ $membershipAccount->customer->mother_name_bn ?? 'N/A' }}</h6>
            <h6 class="s_name">{{ $membershipAccount->customer->husband_or_wife_name_bn ?? 'N/A' }}</h6>
            <h6 class="ba_name">{{ $membershipAccount->customer->present_address_bn ?? 'N/A' }}</h6>

            <div style="display: flex; align-items:center;margin-top:7px">
                <h6 class="p_address">{{ $membershipAccount->customer->permanent_address_bn ?? 'N/A' }}</h6>
                <h6 class="p_village">{{ $membershipAccount->customer->village_bn ?? 'N/A' }}</h6>
            </div>
            <div style="display: flex; margin-top:6px">
                <h6 class="p_post">{{ $membershipAccount->customer->post_office_bn ?? 'N/A' }}</h6>
                <h6 class="p_thana">{{ $membershipAccount->customer->district->bn_name ?? 'N/A' }}</h6>
                <h6 class="p_district">{{ $membershipAccount->customer->thana->bn_name ?? 'N/A' }}</h6>
            </div>
            <div style="display: flex; margin-top:12px">
                <h6 class="p_post">{{ $membershipAccount->customer->phone ?? 'N/A' }}</h6>
                <h6 class="p_thana">{{ $membershipAccount->customer->mobile_number ?? 'N/A' }}</h6>
                <h6 class="p_thana">
                    @if ($membershipAccount->customer->email && strlen($membershipAccount->customer->email) <= 17)
                        {{ $membershipAccount->customer->email ?? 'N/A'}}
                    @else
                        {{ \Illuminate\Support\Str::limit($membershipAccount->customer->email, 17, '') ?? 'N/A' }}
                    @endif

                </h6>

            </div>
            <div style="display: flex; margin-top:12px">
                <h6 class="p_post">{{ $membershipAccount->customer->dob ?? 'N/A' }} </h6>
                <h6 class="p_thana">{{ $membershipAccount->customer->blood_group ?? 'N/A' }}</h6>
                <h6 class="p_district">{{ $membershipAccount->customer->occupation ?? 'N/A' }}</h6>
            </div>
            <div style="display: flex; align-items:center">
                <h6 class="p_address">{{ $membershipAccount->customer->nid_number ?? 'N/A' }}</h6>
                <h6 class="p_village">{{ $membershipAccount->customer->passport_number ?? 'N/A' }}</h6>
            </div>
            <div style="display: flex; margin-top:45px">
                <h6 class="n_name">{{ $membershipAccount->nominee_name_bn ?? 'N/A' }}</h6>
                <h6 class="n_relation">{{ $membershipAccount->relation_with_member ?? 'N/A' }} </h6>
            </div>
            <div style="display: flex; margin-top:15px">
                <h6 class="n_name">{{ $membershipAccount->nominee_dob ?? 'N/A' }}</h6>
                <h6 class="n_relation">{{ $membershipAccount->nominee_nid_number ?? 'N/A' }}</h6>
            </div>
            <h6 style="margin-top: 10px" class="n_address">{{ $membershipAccount->nominee_address ?? 'N/A' }}</h6>
            <div style="display: flex; margin-top:35px">
                <h6 class="p_name">{{ $membershipAccount->introductory_name ?? 'N/A' }}</h6>
                <h6 class="p_member_no">{{ $membershipAccount->customer->client_number ?? 'N/A' }}</h6>
            </div>

            <img src="{{ asset('backend/images/customer/' . $nomineeImage) }}"
                 alt="nominee_image" class="nominy_photo">

        </div>

    </div>
</div>


<script>
    function invoiceFunction(el) {
        let restorepage = document.body.innerHTML;
        let printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
        location.reload()
    }
</script>

</body>

</html>


