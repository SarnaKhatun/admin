@extends('customer.layouts.master')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                {{--                <h3 class="fw-bold mb-3">Forms</h3>--}}
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Forms</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Basic Form</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt- pb-0">
                                <div class="card-title">Monthly Collection | Due Pay</div>
                                <div class="ms-md-auto py-0 py-md-0">
                                    <a href="{{ route('monthly-subscription-fees.index')  }}"
                                       class="btn btn-primary btn-sm">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('monthlySubsFee.due-pay.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $mSubsFeeLedger->id }}">
                                <div class="row p-2">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Due Amount</label>
                                            <input type="text" name="due_amount" id="dueAmount" value="{{ $mSubsFeeLedger->due_amount }}" class="form-control" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Pay Amount</label>
                                            <input type="text" name="pay_amount" id="payAmount"
                                                   value="{{ old('pay_amount') }}"
                                                   class="form-control" placeholder="Enter Amount" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">After Pay</label>
                                            <input type="text" name="after_pay" id="afterPay"
                                                   class="form-control" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 text-center">
                                    <button class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- Calculation --}}
    <script>
        let payAmountField = document.getElementById("payAmount");
        let dueAmountField = document.getElementById("dueAmount");
        let afterPayField = document.getElementById("afterPay");

        function calculateDuePayAmount()
        {
            let payAmount = parseFloat(payAmountField.value) || 0;
            let dueAmount = parseFloat(dueAmountField.value) || 0;

            if (payAmount > dueAmount) {
                alert('Pay amount cannot be greater than due amount');
                payAmountField.value = dueAmount;
                payAmount = dueAmount;
            }

            if(dueAmount > payAmount){
                let afterPayAmount = dueAmount - payAmount;
                afterPayField.value = afterPayAmount.toFixed(2);
            } else{
                afterPayField.value = "0.00";
            }
        }

        payAmountField.addEventListener("input", ()=>{
            calculateDuePayAmount();
        });
    </script>
@endpush
