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
<h3>disaster_category</h3>
<div class="row">
    <div class="col-lg-4">
        <div class="well">
        {{Form::model($disaster_category, ['route'=>['admin.disaster_categories.update', $disaster_category->id], 'method' => 'PUT'])}}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', null, ['class'=>'form-control', 'rows' => 2])}}
                {{$errors->first('name')}}
            </div>
            <div class="form-group">
                {{Form::submit('Edit', ['class'=>'btn btn-primary', 'style'=>'width:100%'])}}
            </div>
        {{Form::close()}}
        </div>
    </div>
    <div class="col-lg-8">
        <div class="well"> <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Menu</th>
                </tr>
            </thead>
     
     
            <tbody>
                @foreach ($disaster_categories as $disaster_category)
                    
                    <tr>
                        <td >{{$disaster_category->name}}</td>
                        <td style="text-align:center">
                            <a href="{{url('admin/disaster_categories/'.$disaster_category->id.'/edit')}}" class="btn btn-sm btn-success">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a> 
                            <a href="{{url('admin/disaster_categories/destroy/'.$disaster_category->id)}}" class="btn btn-sm btn-primary" onClick="return confirm('Are you sure you want to delete?')">
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