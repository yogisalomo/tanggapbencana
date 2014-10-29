@extends('layouts.admin')
@section('content')
    @include('layouts.users_nav')
    <div class="row">
        <div class="col-sm-6">
            <h1>Edit Premium Seller</h1>
        <div class="well">

        {{Form::model($user, ['route'=>['admin.premiums.update', $user->id], 'method'=>'PUT'])}}

            <h2>Seller: {{User::getName($user->id)}}</h2>

            <div class="form-group">
                {{Form::label('premium_expired_date', 'Expired Date')}}
                {{Form::text('premium_expired_date', null, ['class'=>'form-control', 'id'=>'datepick', 'data-date-format'=>'YYYY-MM-DD hh:mm:ss'])}}
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
