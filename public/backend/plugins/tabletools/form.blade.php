@extends('layouts.admin')

@section('content')
	@include('layouts.admin_nav')
<div class="row well">
	<h2>Create Admin</h2>
	
	<div class="col-sm-12">
		{{Form::model($admin, array('class'=>'form-horizontal', 'id'=>'form_user'))}}
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name </label>
				<div class="col-sm-9">
					{{Form::text('name',null,array(
							'id'=> 'name'
					))}}
				</div>
			<br><label id="error_name" class="col-sm-3 control-label no-padding-right" for="form-field-1" style="color:red;">{{$errors->first('name')}}</label>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>
                <div class="col-sm-9">
                    {{Form::text('username',null,array(
                            'id'=> 'username'
                    ))}}
                </div>
            <br><label id="error_username" class="col-sm-3 control-label no-padding-right" for="form-field-1" style="color:red;">{{$errors->first('username')}}</label>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password </label>
                <div class="col-sm-9">
                    {{Form::password('password',null,array(
                            'id'=> 'password'
                    ))}}
                </div>
            <br><label id="error_password" class="col-sm-3 control-label no-padding-right" for="form-field-1" style="color:red;">{{$errors->first('password')}}</label>
        </div>
		<div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                {{Form::submit('Simpan', array('class'=>'btn btn-info'))}}

                                <a href="/admin/admins/">
                                    <button class="btn">
                                        <i class="icon-undo bigger-110"></i>
                                        Kembali
                                    </button>
                                </a>
                            </div>
                            
                        </div>
         {{Form::close()}}
	</div>
</div>
@stop

@section('page_script')
	<script>
    $(function() {
        $( "#birthdate" ).datepicker({ dateFormat: 'yy-mm-dd', yearRange: "-100:+0", changeYear: true,changeMonth: true,defaultDate: new Date('1990-01-01')});
    });
    </script>
<script type="text/javascript">
jQuery( document ).ready( function( $ ) {
 
    $( '#form_user' ).on( 'submit', function() {
        //.....
        //show some spinner etc to indicate operation in progress
        //.....
        
        $.post(
            $( this ).prop( 'action' ),
            {
                "username": document.getElementById('username').value,
                "password": document.getElementById('password').value,
                "picture": document.getElementById('picture').value,
                "role_id": document.getElementById('role_id').value,
                "first_name": document.getElementById('first_name').value,
                "last_name": document.getElementById('last_name').value,
                "birthdate": document.getElementById('birthdate').value,
                "address_street": document.getElementById('address_street').value,
                "address_city": document.getElementById('address_city').value,
                "address_province": document.getElementById('address_province').value,
                "address_country": document.getElementById('address_country').value,
                "newsletter": document.getElementById('newsletter').value,
                "email": document.getElementById('email').value,
                "phone_number": document.getElementById('phone_number').value
            },
            function( data ) {
                if(data['status']=='success'){
                	var url = "{{url('admin/user/index')}}";
                	window.location.replace(url);
                }
                else{
                	var strName,strValue;
                	for(strName in data['msg']){
                		strValue = data['msg'][strName][0];
                		document.getElementById("error_".concat(strName)).innerHTML = strValue;
                	}
                }
            },
            'json'
        );
        //.....
        //do anything else you might want to do
        //.....
 
        //prevent the form from actually submitting in browser
 		
        
        return false;
    } );
 
} );
</script>
@stop