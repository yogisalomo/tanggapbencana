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
<h3>Disaster</h3>
<div class="row">
    <div class="col-lg-4">
        <div class="well">
            {{Form::model($disaster, ['route'=>['admin.disasters.update', $disaster->id], 'method' => 'PUT'])}}
                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', null, ['class'=>'form-control'])}}
                    {{$errors->first('name')}}
                </div>

                <div class="form-group">
                    {{Form::label('disaster_category_id', 'Category')}}
                    {{Form::select('disaster_category_id', DisasterCategory::lists('name', 'id'), null, ['class'=>'form-control'])}}
                    {{$errors->first('disaster_category_id')}}
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
                    {{Form::label('start', 'Start')}}
                    <div class="input-group date" id="datepick1" data-date-format="YYYY-MM-DD">
                        {{Form::text('start', null, array('class'=>'form-control '))}}    
                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                    {{$errors->first('start')}}
                </div>

                <div class="form-group">                    
                    {{Form::label('end', 'End')}}
                    <div class="input-group date" id="datepick2" data-date-format="YYYY-MM-DD">
                        {{Form::text('end', null, array('class'=>'form-control '))}}    
                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                    {{$errors->first('end')}}
                </div>

                <div class="form-group">
                    {{Form::label('status', 'Status')}}
                    {{Form::text('status', null, ['class'=>'form-control'])}}
                    {{$errors->first('status')}}
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
                    <th>Name</th>
                    <th>Category</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Status</th>
                    <th>Menu</th>
                </tr>
            </thead>
     
     
            <tbody>
                @foreach ($disasters as $disaster)
                    <tr>
                        <td >{{$disaster->name}}</td>
                        <td >{{@DisasterCategory::find($disaster->disaster_category_id)->name}}</td>
                        <td >{{$disaster->latitude}}</td>
                        <td >{{$disaster->longitude}}</td>
                        <td >{{$disaster->start}}</td>
                        <td >{{$disaster->end}}</td>
                        <td >{{$disaster->status}}</td>
                        <td style="text-align:center">
                            <a href="{{url('admin/disasters/'.$disaster->id.'/edit')}}" class="btn btn-sm btn-success">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a> 
                            <a href="{{url('admin/disasters/destroy/'.$disaster->id)}}" class="btn btn-sm btn-primary" onClick="return confirm('Are you sure you want to delete?')">
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