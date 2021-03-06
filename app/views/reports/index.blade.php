@extends('layouts.master')

@section('script')

    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.css')}}">
    <script src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.js')}}"></script>

    <script>

        $(document).ready(function() {
            $('#table').dataTable({
               "scrollX": true
            });
        });

    </script>

@stop

@section('content')
<h3>Report</h3>
<div class="row">
    <div class="col-lg-4">
        <div class="well">
            {{Form::open(['route'=>'admin.reports.store'])}}

                <div class="form-group">
                    {{Form::label('disaster_id', 'Bencana')}}
                    {{Form::select('disaster_id', Disaster::lists('name', 'id'), null, ['class'=>'form-control'])}}
                    {{$errors->first('disaster_id')}}
                </div>

                <div class="form-group">
                    {{Form::label('latitude', 'Latitude')}}
                    {{Form::text('latitude', null, ['class'=>'form-control'])}}
                    {{$errors->first('latitude')}}
                </div>

                <div class="form-group">
                    {{Form::label('longitude', 'Longitude')}}
                    {{Form::text('longitude', null, ['class'=>'form-control'])}}
                    {{$errors->first('longitude')}}
                </div>

                <div class="form-group">
                    {{Form::label('message', 'Message')}}
                    {{Form::textarea('message', null, ['class'=>'form-control'])}}
                    {{$errors->first('message')}}
                </div>

                <div class="form-group">
                    {{Form::submit('Save', ['class'=>'btn btn-primary'])}}
                </div>

            {{Form::close()}}
        </div>
    </div>
    <div class="col-lg-8">
        <div class="well"> <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Disaster</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Message</th>
                    <th>Menu</th>
                </tr>
            </thead>
     
     
            <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <td >{{@Disaster::find($report->disaster_id)->name}}</td>
                        <td >{{$report->latitude}}</td>
                        <td >{{$report->longitude}}</td>
                        <td >{{$report->message}}</td>
                        <td style="text-align:center">
                            <a href="{{url('admin/reports/'.$report->id.'/edit')}}" class="btn btn-sm btn-success">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a> 
                            <a href="{{url('admin/reports/destroy/'.$report->id)}}" class="btn btn-sm btn-primary" onClick="return confirm('Are you sure you want to delete?')">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach            
            </tbody>
        </table> </div>
    </div>
</div>    
@stop