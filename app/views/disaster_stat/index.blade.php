@extends('layouts.master')

@section('script')
    <link rel="stylesheet" href="{{asset('css/timeline.css')}}">
    <script src="{{asset('js/highcharts.js')}}"></script>
    <script src="{{asset('js/d3.min.js')}}"></script>
    <script src="{{asset('js/eventDrops.js')}}"></script>
    <script src="{{asset('js/chart.js')}}"></script>
    <script src="{{asset('js/timelineChart.js')}}"></script>

    <script>

        $(document).ready(function() {
            $('#table').dataTable({
               "scrollX": true
            });
        });

    </script>
@stop

@section ('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
@stop

@section('content')
    <h3>Disaster Statistics</h3>

    <div class="row">
        <div class="col-lg-6">
            <div id="barchart" style="min-width: 410px; max-width: 600px; height: 450px; margin: 0 auto"></div>

        </div>
        <div class="col-lg-6">
            <div id="piechart" style="min-width: 310px; height: 450px; max-width: 600px; margin: 0 auto">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div id="timeline"></div>
        </div>
    </div>
@stop