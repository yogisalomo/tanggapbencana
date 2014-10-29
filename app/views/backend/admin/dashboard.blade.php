@extends('layouts.admin')

@section('content')
    <h2>Dashboard</h2>
    <div class="alert alert-info">You have {{$orderCount}} new orders today.</div>
    <h3>Order Funnel</h3>
    <div id="container" style="min-width: 410px; max-width: 800px; height: 400px; margin: 0 auto"></div>
@stop

@section('page_script')
    <script>
    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'funnel',
                marginRight: 100
            },
            title: {
                text: 'Sales funnel',
                x: -50
            },
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b> ({point.y:,.0f})',
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                        softConnector: true
                    },
                    neckWidth: '30%',
                    neckHeight: '25%'

                    //-- Other available options
                    // height: pixels or percent
                    // width: pixels or percent
                }
            },
            legend: {
                enabled: false
            },
            series: [{
                name: 'Unique users',
                data: [
                    <?php
                        foreach($statuses as $stat){
                            echo "['". AppConfig::getStatusName('order', $stat[0]) ."',". $stat[1] ."],";
                        }
                    ?>
                ]
            }]
        });
    });
    </script>
@stop
