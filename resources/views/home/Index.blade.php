
@extends('index')

@section('content')

    @push('css')
        <link rel="stylesheet" href="{{ url('css/style_cards.css') }}" />
    @endpush

    <h2>الرئيسية</h2>
    <div class="row">
        <div class="col-sm-4">
            <div class="card-default fixed-height">
                <h5 class="heading-warning">مبيعات اليوم</h5>
                <div class="body">
                    <h3><span class="text-success">{{ $salesDayCount }}</span> عملية بيع</h3>
                    <hr>
                    <h3>صافى الربح <span class="text-primary">{{ $salesDaySum }}</span> جنيه</h3>
                </div>
                <hr>
                <p class="small footer">لمزيد من التفاصيل <a href="{{ route('sales.day') }}">اضغط هنا</a></p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card-default fixed-height">
                <h5 class="heading-warning">مبيعات الشهر</h5>
                <div class="body">
                    <h3><span class="text-success">{{ $salesMonthCount }}</span> عملية بيع</h3>
                    <hr>
                    <h3>صافى الربح <span class="text-primary">{{ $salesMonthSum }}</span> جنيه</h3>
                </div>
                <hr>
                <p class="small footer">لمزيد من التفاصيل <a href="{{ route('sales.month') }}">اضغط هنا</a></p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card-default fixed-height">
                <h5 class="heading-warning">مبيعات السنة</h5>
                <div class="body">
                    <h3><span class="text-success">{{ $salesYearCount }}</span> عملية بيع</h3>
                    <hr>
                    <h3>صافى الربح <span class="text-primary">{{ $salesYearSum }}</span> جنيه</h3>
                </div>
                <hr>
                <p class="small footer">لمزيد من التفاصيل <a href="{{ route('sales.year') }}">اضغط هنا</a></p>
            </div>
        </div>
    </div>

@endsection
