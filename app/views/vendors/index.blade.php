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
<h3>vendor</h3>
<div class="row">
    <div class="col-lg-4">
        <div class="well">
        {{Form::open(['route'=>'vendors.store'])}}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', null, ['class'=>'form-control', 'rows' => 2])}}
                {{$errors->first('name')}}
            </div>
            <div class="form-group">
                {{Form::label('area_of_expertise', 'area_of_expertise')}}
                {{Form::text('area_of_expertise', null, ['class'=>'form-control', 'rows' => 2])}}
                {{$errors->first('area_of_expertise')}}
            </div>
            <div class="form-group">
                {{Form::label('contract_status', 'contract_status')}}
                {{Form::text('contract_status', null, ['class'=>'form-control', 'rows' => 2])}}
                {{$errors->first('contract_status')}}
            </div>
            <div class="form-group">
                {{Form::label('performance_score', 'performance_score')}}
                {{Form::text('performance_score', null, ['class'=>'form-control', 'rows' => 2])}}
                {{$errors->first('performance_score')}}
            </div>
            <div class="form-group">
                {{Form::submit('Add', ['class'=>'btn btn-primary', 'style'=>'width:100%'])}}
            </div>
        {{Form::close()}}
        </div>

    </div>
    <div class="col-lg-8">
        <div class="well"> <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Expertise Area</th>
                    <th>Contract Status</th>
                    <th>Performace Score</th>
                    <th>Menu</th>
                </tr>
            </thead>
     
     
            <tbody>
                @foreach ($vendors as $vendor)
                    
                    <tr>
                        <td >{{$vendor->name}}</td>
                        <td >{{$vendor->area_of_expertise}}</td>
                        <td >{{$vendor->contract_status}}</td>
                        <td >{{$vendor->performance_score}}</td>
                        <td style="text-align:center">
                            <a href="{{url('vendors/'.$vendor->id.'/edit')}}" class="btn btn-sm btn-success">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a> 
                            <a href="{{url('vendors/destroy/'.$vendor->id)}}" class="btn btn-sm btn-primary" onClick="return confirm('Are you sure you want to delete?')">
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