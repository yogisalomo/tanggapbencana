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
<h3>Permohonan Bantuan</h3>
<div class="row">
    <div class="col-lg-4">
        <div class="well">
            {{Form::open(['route'=>'admin.requests.store'])}}

                <div class="form-group">
                    {{Form::label('title', 'Judul Permohonan')}}
                    {{Form::text('title', null, ['class'=>'form-control'])}}
                    {{$errors->first('title')}}
                </div>

                <div class="form-group">
                    {{Form::label('disaster_id', 'Bencana')}}
                    {{Form::select('disaster_id', Disaster::lists('name', 'id'), null, ['class'=>'form-control'])}}
                    {{$errors->first('disaster_id')}}
                </div>

                <div class="form-group">
                    {{Form::label('description', 'Permohonan Bantuan')}}
                    {{Form::textarea('description', null, ['class'=>'form-control'])}}
                    {{$errors->first('description')}}
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
                    <th>Judul</th>
                    <th>Bencana</th>
                    <th>Permohonan Bantuan</th>
                    <th>Menu</th>
                </tr>
            </thead>
     
     
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td >{{$request->title}}</td>
                        <td >{{@Disaster::find($request->disaster_id)->name}}</td>
                        <td >{{$request->description}}</td>
                        <td style="text-align:center">
                            <a href="{{url('admin/requests/'.$request->id.'/edit')}}" class="btn btn-sm btn-success">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a> 
                            <a href="{{url('admin/requests/destroy/'.$request->id)}}" class="btn btn-sm btn-primary" onClick="return confirm('Are you sure you want to delete?')">
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