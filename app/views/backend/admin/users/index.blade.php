@extends('layouts.admin')
@section('content')
    @include('layouts.users_nav')
    <h2>Users</h2>
    <table id="user" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" width="100%">
      <thead>
          <tr>
            <td><b>ID</b></td>
            <td><b>Username</b></td>
            <td><b>Name</b></td>
            <td><b>Newsletter</b></td>
            <td><b>Email</b></td>
            <td><b>Phone Number</b></td>
            <td><b>Registration Date</b></td>
            <td><b>Role</b></td>
            <td><b>Active</b></td>
            <td><b>Premium</b></td>
            <td><b>Premium Expiration Date</b></td>
            <td><b>Deposit Amount</b></td>
            <td><b>Last Visit</b></td>
            <td><b>Menu</b></td>
            <td><b>Flag</b></td>
          </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td><a href="{{url('admin/user/view/'.$user->id)}}">{{$user->id}}</a></td>
            <td><a href="{{url('admin/user/view/'.$user->id)}}">{{$user->username}}</a></td>
            <td>{{$user->first_name}} {{$user->last_name}}</td>
            <td>
                @if ($user->newsletter ===1)
                    <img widht="5%" height="5%" src="{{asset('backend/img/tick1.png')}}" />
                @else
                    <img widht="5%" height="5%" src="{{asset('backend/img/tick0.png')}}" />
                @endif
            </td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone_number}}</td>
            <td>{{date("d F Y, G:i:s", strtotime($user->registration_date))}}</td>
            <td><b>{{User::getFormalRoleName($user->role)}}</b></td>
            <td>
                @if ($user->status === "active")
                    <a href="{{url('admin/user/activate/'.$user->id)}}"><img widht="5%" height="5%" src="{{asset('backend/img/tick1.png')}}" /></a>
                @else
                    <a href="{{url('admin/user/activate/'.$user->id)}}"><img widht="5%" height="5%" src="{{asset('backend/img/tick0.png')}}" /></a>
                @endif
            </td>
            <td>
                @if($user->role == "seller")
                    @if ($user->is_premium ===1)
                        <img widht="5%" height="5%" src="{{asset('backend/img/tick1.png')}}" />
                    @else
                        <img widht="5%" height="5%" src="{{asset('backend/img/tick0.png')}}" />
                    @endif
                @else
                N/A
                @endif
            </td>
            <td>{{$user->getPremiumExpiredDate()}}</td>
            <td>Rp{{$user->getEscrowAmount()}}</td>
            <td>{{$user->last_visit}}</td>
            <td><a href="{{url('admin/user/update/'.$user->id)}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;<a href="{{url('admin/user/delete/'.$user->id)}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
            <td><a href="{{url('admin/user/flag/'.$user->id)}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-flag"></span></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>

@stop

@section('page_script')
<script>
    $(document).ready(function() {
    $('#user').dataTable({
        "scrollX": true
    });
} );
</script>
@stop

