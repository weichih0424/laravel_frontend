@extends('layouts.layout.index')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/data.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/indicators/indicators.js"></script>
{{-- <script src="https://code.highcharts.com/stock/modules/drag-panes.js"></script> --}}
{{-- <script src="https://code.highcharts.com/stock/modules/accessibility.js"></script> --}}
<script src="https://code.highcharts.com/stock/indicators/stochastic.js"></script>

@stop
@section('main')
<h3>本益比：(判斷股價是否合理)</h3>
<h5>歷年平均本益比25倍，若今年本益比20倍就是偏低，今年EPS=$5，股價至少要是$5x25倍=$125</h5>

<div class="container">
    <div class="alert alert-success" style="display:none"></div>
    {{-- <form id="myForm" method="POST" action="/stock/post"> --}}
        <div class="form-group">
            <label for="dataset">資料集</label>
            <select class="form-control" id="dataset" style="width: 15%">
                <option value="" selected disabled>請選擇股票資料集</option>
                <option value="TaiwanStockPrice">股價日成交資訊</option>
            </select>
        </div>
        <div class="form-group">
            <label for="data_id">股票代號</label>
            <input type="text" class="form-control" id="data_id" style="width: 15%">
        </div>
        <div class="form-group">
            <label for="start_date">開始日期</label>
            <input type="date" class="form-control" id="start_date" style="width: 15%">
        </div>
        <div class="form-group">
            <label for="end_date">結束日期</label>
            <input type="date" class="form-control" id="end_date" style="width: 15%">
        </div>
        {{-- <button type="submit" class="btn btn-primary" id="ajaxSubmit">Submit</button> --}}
        <button type="button" class="btn btn-primary" id="Submit" style="width: 15%">股票</button>
    {{-- </form> --}}
    <div id="container" style="width: 80%"></div>
    {{-- <div id="search_result"></div> --}}
    {{-- <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span> --}}
</div>
@stop

@section('js')
<script type="text/javascript" src="{{ URL::asset('/js/stock.js') }}"></script>
<script>
var date = new Date();
var year = date.getFullYear();
var month = date.getMonth()+1 < 10 ? "0"+(date.getMonth()+1) : (date.getMonth()+1);
var day = date.getDate() < 10 ? "0"+date.getDate() : date.getDate();
var max_day = date.getDate()-1 < 10 ? "0"+(date.getDate()-1) : (date.getDate()-1);
$("#start_date").val(year+"-01-01");
$("#end_date").val(year+"-"+month+"-"+max_day);
$("#end_date").attr("max",year+"-"+month+"-"+max_day);


$('#Submit').click(function(){
    const dataset = document.getElementById('dataset').value;
    const data_id = document.getElementById('data_id').value;
    const start_date = document.getElementById('start_date').value;
    const end_date = document.getElementById('end_date').value;
    const token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRlIjoiMjAyMi0wNy0wNSAxNDoyMDo0NSIsInVzZXJfaWQiOiJFcmljX0Nob3UiLCJpcCI6IjEwMS4zLjEzOC40MyJ9.Fy5fy_wQn7SaOo2ao-cs1yb3f5tI_euCF5MjuRLFh1w";
    if(dataset == "" || data_id == ""){
        alert("欄位不能為空白");
        return false;
    }
    if(end_date>=(year+"-"+month+"-"+day)){
        alert("日期選擇錯誤，請重新選擇");
        return false;
    }
    ajax_Highcharts(dataset,data_id,start_date,end_date,token);
});
</script>
@endsection
{{-- "dataset": "TaiwanStockPrice",
"data_id": "2883",
"start_date": "2022-01-01",
"end_date": "2022-07-01",
"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRlIjoiMjAyMi0wNy0wNSAxNDoyMDo0NSIsInVzZXJfaWQiOiJFcmljX0Nob3UiLCJpcCI6IjEwMS4zLjEzOC40MyJ9.Fy5fy_wQn7SaOo2ao-cs1yb3f5tI_euCF5MjuRLFh1w", # 參考登入，獲取金鑰 --}}
@section("script")
<script>
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    // $('#ajaxSubmit').click(function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         url: "/stock/post",
    //         type: "POST",
    //         data: JSON.stringify({
    //             "account": $('#account').val(), 
    //             "password": $('#password').val()
    //             }),
    //         dataType: "json",
    //         contentType: "application/json; charset=UTF-8", //註解
    //         success: function(data) {
    //             console.log(data);
    //             $("#myForm")[0].reset();
    //             $("#search_result").html("帳號: "+data.account+" 密碼: "+data.password);
    //             $(".success").html("帳號: "+data.account+" 密碼: "+data.password);
    //         },
    //         error: function (jqXHR,textStatus,errorThrown) {
    //             console.log(jqXHR)
    //         }
    //     });
    // })
</script>
@endsection
