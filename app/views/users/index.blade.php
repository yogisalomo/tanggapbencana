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

    <a href="{{url('users/create')}}" class="btn btn-primary form-control"><span class="glyphicon glyphicon-plus-sign"></span> New User</a>
    <hr>
    
    <div class="well"> <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>Salesperson</th>
                <th>Email</th>
                <th>Role</th>
                <th>Menu</th>
            </tr>
        </thead>
 
 
        <tbody>
            @foreach ($users as $user)
                
                <tr>
                    <td>{{$user->username}}</td>
                    <td>{{@$user->salesperson->name}}</td>
                    <td>{{@$user->salesperson->email}}</td>
                    <td>{{$user->role}}</td>
                    <td style="text-align:center">
                        <a href="{{url('users/'.$user->id.'/edit')}}" class="btn btn-sm btn-success">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a> 
                        <a href="{{url('users/destroy/'.$user->id)}}" class="btn btn-sm btn-primary" onClick="return confirm('Are you sure you want to delete?')">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            @endforeach            
        </tbody>
    </table> </div>
    
@stop