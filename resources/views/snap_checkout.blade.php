@extends('layouts.master')
@section('additional-css')
<link href="{{asset('/css/checkout.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <script type="text/javascript"
                    src="https://app.sandbox.midtrans.com/snap/snap.js"
                    data-client-key="<CLIENT-KEY>"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    <form id="payment-finish-form" method="post" action="{{url('/payment/finish')}}">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" name="result_type" id="result-type-f" value=""></div>
        <input type="hidden" name="result_data" id="result-data-f" value=""></div>
    </form>

    <form id="payment-unfinish-form" method="post" action="{{url('/payment/unfinish')}}">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" name="result_type" id="result-type-u" value=""></div>
        <input type="hidden" name="result_data" id="result-data-u" value=""></div>
    </form>

    <form id="payment-error-form" method="post" action="{{url('/payment/error')}}">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" name="result_type" id="result-type-e" value=""></div>
        <input type="hidden" name="result_data" id="result-data-e" value=""></div>
    </form>
    @if (empty($cart))
    <div class="container row" id="not-found">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <img src="{{asset('img/confused.png') }}" class="center-block img-responsive">
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <h1 class="center-block">Anda belum memasukkan kursus ke trolli</h1>
            <h2 class="center-block">Cari kursus sekarang</h2>

        </div>
    </div>
    <div class="container panel panel-default center-block" id="search-form">
        @include('search-form')
    </div>
    @else
    @foreach($cart as $result)
        <div class="space row course">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">c
                <img src="{{ asset('images/'.$result->image->ak_provider_img_path) }}">
            </div>
            <div class="parent col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <h1 class=""><a href="{{ URL::to('/courses/' . $result->ak_course_id) }}">{{ $result->ak_course_name }}</a></h1>
                <h2 class="margin-left-sml child set-up set-right red">Rp {{ $result->detail->ak_course_detail_price }}</h2>
                <p class="margin-down-sml">{{ $result->detail->ak_course_detail_desc }}</p>
            </div>
        </div>
    @endforeach
    <div class="panel panel-default">
    <button type="button" class="margin-down-big btn btn-danger width-sml sharp-box" id="pay-button">Pay!</button>
    </div>
    @endif

    <script type="text/javascript">

    $('#pay-button').click(function (event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        $.ajax({

            url: './snaptoken',
            cache: false,

            success: function(data) {
                console.log(data);
                console.log('token = '+data);
                
                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type,data){
                    $("#result-type-f").val(type);
                    $("#result-data-f").val(JSON.stringify(data));
                    $("#result-type-u").val(type);
                    $("#result-data-u").val(JSON.stringify(data));
                    $("#result-type-e").val(type);
                    $("#result-data-e").val(JSON.stringify(data));
                }

                snap.pay(data, {
                    
                    onSuccess: function(result){
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-finish-form").submit();
                    },
                    onPending: function(result){
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-unfinish-form").submit();
                    },
                    onError: function(result){
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-error-form").submit();
                    }
                });
            }
        });
    });
    </script>
@endsection