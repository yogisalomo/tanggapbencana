@extends('layouts.master')

@section('script')
	
<script>

<?php function ajax_refresh($fields, $field) { ?>
    $('#{{$fields}}-refresh').click(function (e) {
        var $btn = $(this);
        e.preventDefault();
        $btn.fadeOut('fast');
        $.get('{{url($fields.'/all')}}', function(data) {
            var $model = $('#{{$field}}_id');
            $model.empty();
            for (var key in data) {
                if (data.hasOwnProperty(key)) {
                    console.log(key + '->' + data[key]);
                    $model.append("<option value='"+ key +"'>" + data[key] + "</option>");        
                }
            }
            $btn.fadeIn('fast');
        });
    });
<?php } ?>

<?php ajax_refresh('salespersons', 'salesperson') ?>

</script>

@stop

@section('content')

	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<h1>New User</h1>
			
			<div class="well">
			{{Form::open(['route'=>'users.store'])}}
				
				<div class="form-group">
					{{Form::label('username', 'Username')}}
					{{Form::text('username', null, ['class'=>'form-control'])}}
					{{$errors->first('username')}}
				</div>

				<div class="form-group">
					{{Form::label('password', 'Password')}}
					{{Form::password('password', ['class'=>'form-control'])}}
					{{$errors->first('password')}}
				</div>

				<div class="form-group">
					{{Form::label('salesperson_id', 'Salesperson')}}
					{{Form::select('salesperson_id', Salesperson::lists('name', 'id'), null, ['class'=>'form-control'])}}
					{{$errors->first('salesperson_id')}}
				</div>

				<div class="form-group">
					<a href="{{url('salespersons/create')}}" target="_blank" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> New Sales Person</a> 
					<a href="#" class="btn btn-sm btn-primary" id="salespersons-refresh"><span class="glyphicon glyphicon-refresh"></span></a>
				</div>

				<div class="form-group">
					{{Form::label('role', 'Role')}}
					{{Form::select('role', [
						'Sales'=>'Sales',
						'Manager'=>'Manager',
						'Admin'=>'Admin',
					], null, ['class'=>'form-control'])}}
					{{$errors->first('role')}}
				</div>

				<div class="form-group">
					{{Form::submit('Save', ['class'=>'btn btn-primary'])}}
					{{Form::submit('Save & Add Another', ['class'=>'btn btn-success'])}}
				</div>

			{{Form::close()}}

			</div>

		</div>
	</div>
@stop