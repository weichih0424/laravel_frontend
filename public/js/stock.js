function ajax_Highcharts(dataset, data_id, start_date, end_date, token){
    if(dataset=="" || data_id=="" || start_date=="" || end_date=="" || token==""){
        return false;
    }
    // api_url="https://api.finmindtrade.com/api/v4/data?dataset=TaiwanStockPrice&data_id=2883&start_date=2022-06-01&end_date=2022-07-01&token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRlIjoiMjAyMi0wNy0wNSAxNDoyMDo0NSIsInVzZXJfaWQiOiJFcmljX0Nob3UiLCJpcCI6IjEwMS4zLjEzOC40MyJ9.Fy5fy_wQn7SaOo2ao-cs1yb3f5tI_euCF5MjuRLFh1w";
    api_url="https://api.finmindtrade.com/api/v4/data?dataset="+dataset+"&data_id="+data_id+"&start_date="+start_date+"&end_date="+end_date+"&token="+token;
    Highcharts.getJSON(api_url, function (data) {
        if(data.data==""){
            alert("欄位輸入值有誤");
            return false;
        }
        var ohlc = [];
        for (var i = 0; i < data.data.length; i++) {
            ohlc.push([
                (new Date(data.data[i]['date'])).getTime(),
                parseFloat(data.data[i]['open']), // open
                parseFloat(data.data[i]['max']), // high
                parseFloat(data.data[i]['min']), // low
                parseFloat(data.data[i]['close']) // close
            ]);
        }
        Highcharts.setOptions({
            global: {
                timezoneOffset: -8 * 60  // +8 時區修正方法
            },
            lang:{
                viewFullscreen: "全螢幕",
                printChart: "列印圖表",
                downloadJPEG: "下載JPEG圖片",
                downloadPDF: "下載PDF文件",
                downloadPNG: "下載PNG文件",
                downloadSVG: "下載SVG文件",
                shortMonths: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
                weekdays: ['星期日',  '星期一', '星期二', '星期三', '星期四', '星期五', '星期六']
            }
        });
        // create the chart
        Highcharts.stockChart('container', {
            chart: {
                height: 600
            },
            rangeSelector: {
                selected: 1,
                inputDateFormat: '%Y-%m-%d',
            },
            title: {
                text: data.data[0]['stock_id']+' 歷史股價'
            },
            navigator: {
                series: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            plotOptions: {
                candlestick: {
                    tooltip: {
                        pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {series.name}</b><br/>' +
                        '開盤: {point.open}<br/>' +
                        '最高: {point.high}<br/>' +
                        '最低: {point.low}<br/>' +
                        '收盤: {point.close}<br/>'
                    }
                },
                series: {
                    showInLegend: true,
                    marker: {
                        enabled: false
                    }
                }
            },
            xAxis: {
                dateTimeLabelFormats: {
                    second: '%Y-%m-%d<br/>%H:%M:%S',
                    minute: '%Y-%m-%d<br/>%H:%M',
                    hour: '%Y-%m-%d<br/>%H:%M',
                    day: '%Y<br/>%m-%d',
                    week: '%Y<br/>%m-%d',
                    month: '%Y-%m',
                    year: '%Y'
                }
            },
            yAxis: [{
                labels: {
                    align: 'right',
                    x: -3
                },
                title: {
                    text: '股價'
                },
                height: '60%',
                // lineWidth: 2,
                // resize: {
                //     enabled: true
                // }
            }, {
                labels: {
                    align: 'right',
                    x: -3
                },
                title: {
                    text: 'KD'
                },
                top: '65%',
                height: '35%',
                offset: 0,
                lineWidth: 2
            }],
            tooltip: {
                split: true
            },
            series: [
                {
                    type: 'candlestick',
                    id: 'stock',
                    name: data.data[0]['stock_id'],
                    data: ohlc,
                    // 控制走势为跌的蜡烛颜色
                    color: 'green',
                    lineColor: 'green',

                    // 控制走势为涨的蜡烛颜色
                    upColor: 'red',
                    upLineColor: 'red',
                }, {
                    yAxis: 1,
                    type: 'stochastic',
                    linkedTo: 'stock',
                    color: 'green',
                    lineColor: 'red',
                }
            ]
        });
    })
}