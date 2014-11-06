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
<h3>Respon Bantuan</h3>
<div class="row">
    <div class="col-lg-4">
        <div class="well">
            {{Form::model($response, ['route'=>['admin.responses.update', $response->id], 'method' => 'PUT'])}}

                <div class="form-group">
                    {{Form::label('request_id', 'Permohonan')}}
                    {{Form::select('request_id', Quest::lists('title', 'id'), $response->request_id, ['class'=>'form-control'])}}
                    {{$errors->first('request_id')}}
                </div>

                <div class="form-group">
                    {{Form::label('user_id', 'User')}}
                    {{Form::select('user_id', User::lists('username', 'id'), $response->user_id, ['class'=>'form-control'])}}
                    {{$errors->first('user_id')}}
                </div>

                <div class="form-group">
                    {{Form::label('status', 'Status')}}
                    {{Form::select('status', [
                    'sent'=>'Sent',
                    'received'=>'Received',
                    'delivered'=>'Delivered'],
                    $response->status, ['class'=>'form-control'])}}
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
                    <th>Permohonan</th>
                    <th>User</th>
                    <th>Status</th>
                    <th>Menu</th>
                </tr>
            </thead>
     
     
            <tbody>
                @foreach ($responses as $response)
                    <tr>
                        <td >{{@Quest::find($response->request_id)->title}}</td>
                        <td >{{@User::find($response->user_id)->username}}</td>
                        <td >{{$response->status}}</td>
                        <td style="text-align:center">
                            <a href="{{url('admin/responses/'.$response->id.'/edit')}}" class="btn btn-sm btn-success">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a> 
                            <a href="{{url('admin/responses/destroy/'.$response->id)}}" class="btn btn-sm btn-primary" onClick="return confirm('Are you sure you want to delete?')">
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