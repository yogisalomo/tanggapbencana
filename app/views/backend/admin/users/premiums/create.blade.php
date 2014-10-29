@extends('layouts.admin')
@section('content')
    @include('layouts.users_nav')
    <div class="row">
        <div class="col-sm-6">
            <h1>New Premium Seller</h1>
        <div class="well">

        {{Form::open(['route'=>'admin.premiums.store'])}}

            <div class="form-group">
                {{Form::label('user_id', 'User Name')}}
                {{Form::select('user_id', $users, null, ['class'=>'form-control'])}}
                {{$errors->first('user_id')}}
            </div>

            <div class="form-group">
                {{Form::label('premium_expired_date', 'Expired Date')}}
                {{Form::text('premium_expired_date', null, ['class'=>'form-control', 'id'=>'datepick', 'data-date-format'=>'YYYY-MM-DD'])}}
                {{$errors->first('premium_expired_date')}}
            </div>

            {{Form::submit('Save', ['class'=>'btn btn-primary'])}}

        {{Form::close()}}
        </div>

        </div>
    </div>
@stop

@section('page_script')
<script>
    $('#datepick').datetimepicker({
        pickTime: true,
        format: "yyyy-mm-dd"
    });
</script>
@stop
