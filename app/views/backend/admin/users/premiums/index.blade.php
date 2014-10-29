@extends('layouts.admin')
@section('content')
    @include('layouts.users_nav')
    <h2>Premium Sellers</h2>

    @if(Session::has('alert'))
      <div class="alert alert-success" role="alert">{{Session::get('alert')}}</div>
    @endif
    <a href="{{url('admin/premiums/create')}}" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> New Premium</a><br><br>
    <table id="table" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" width="100%">
      <thead>
          <tr>
            <td><b>ID</b></td>
            <td><b>User Name</b></td>
            <td><b>Expired Date</b></td>
            <td><b>Menu</b></td>
          </tr>
      </thead>
      <tbody>
        @foreach($premiums as $premium)
          <tr>
            <td>{{$premium->id}}</td>
            <td>{{User::getName($premium->id)}}</td>
            <td>{{$premium->premium_expired_date}}</td>
            <td><a href="{{url('admin/premiums/'.$premium->id.'/edit')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;<a href="{{url('admin/premiums/destroy/'.$premium->id)}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>

@stop

@section('page_script')
<script>
    $(document).ready(function() {
        $('#table').dataTable();
    });
</script>
@stop
