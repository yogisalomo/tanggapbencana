@extends ('layouts.admin')

@section('content')
    @include('layouts.users_nav')
    <h2>Create User</h2>
<div class="row">

    <div class="col-sm-12">
        {{Form::model($user, array('class'=>'form-horizontal','files'=> true,'id'=>'form_user'))}}
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
                    {{Form::password('password',array(
                            'id'=> 'password'
                    ))}}
                </div>
                <br><label id="error_password" class="col-sm-3 control-label no-padding-right" for="form-field-1" style="color:red;">{{$errors->first('password')}}</label>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Picture </label>
                <div class="col-sm-9">
                    {{Form::file('picture',array(
                            'id'=> 'picture'
                    ))}}
                </div>
            <br><label id="error_picture" class="col-sm-3 control-label no-padding-right" for="form-field-1" style="color:red;">{{$errors->first('picture')}}</label>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Role </label>
                <div class="col-sm-9">
                    {{Form::select('role_id',array( 'seller'=>'Seller', 'buyer' =>'Buyer', 'cs officer'=>'CS Officer', 'admin'=>'admin'),'2',array(
                            'id'=> 'role_id'
                    ))}}
                </div>
            <br><label id="error_role_id" class="col-sm-3 control-label no-padding-right" for="form-field-1" style="color:red;">{{$errors->first('role_id')}}</label>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name </label>
                <div class="col-sm-9">
                    {{Form::text('first_name',null,array(
                            'id'=> 'first_name'
                    ))}}
                </div>
            <br><label id="error_first_name" class="col-sm-3 control-label no-padding-right" for="form-field-1" style="color:red;">{{$errors->first('first_name')}}</label>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name </label>
                <div class="col-sm-9">
                    {{Form::text('last_name',null,array(
                            'id'=> 'last_name'
                    ))}}
                </div>
            <br><label id="error_last_name" class="col-sm-3 control-label no-padding-right" for="form-field-1" style="color:red;">{{$errors->first('last_name')}}</label>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Birth Date</label>
                <div class="col-sm-9">
                    <input id="birthdate" name= "birthdate" type="text" id="birthdate" value="{{$user->birthdate}}" />
                </div>
            <br><label id="error_birthdate" class="col-sm-3 control-label no-padding-right" for="form-field-1" style="color:red;">{{$errors->first('birthdate')}}</label>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address Street</label>
                <div class="col-sm-9">
                    {{Form::text('address_street',null,array(
                            'id'=> 'address_street'
                    ))}}
                </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address City </label>
                <div class="col-sm-9">
                    {{Form::text('address_city',null,array(
                            'id'=> 'address_city'
                    ))}}
                </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address Province </label>
                <div class="col-sm-9">
                    {{Form::text('address_province',null,array(
                            'id'=> 'address_province'
                    ))}}
                </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address Country </label>
                <div class="col-sm-9">
                    {{Form::text('address_country',null,array(
                            'id'=> 'address_country'
                    ))}}
                </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Newsletter </label>
                <div class="col-sm-9">
                    {{Form::select('newsletter', array('1' => 'Subscribe', '0' => 'No Thanks'), '1',array(
                            'id'=> 'newsletter'
                    ))}}
                </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>
                <div class="col-sm-9">
                    {{Form::text('email',null,array(
                            'id'=> 'email'
                    ))}}
                </div>
            <br><label id="error_email" class="col-sm-3 control-label no-padding-right" for="form-field-1" style="color:red;">{{$errors->first('email')}}</label>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Phone Number </label>
                <div class="col-sm-9">
                    {{Form::text('phone_number',null,array(
                            'id'=> 'phone_number'
                    ))}}
                </div>
            <br><label id="error_phone_number" class="col-sm-3 control-label no-padding-right" for="form-field-1" style="color:red;">{{$errors->first('phone_number')}}</label>
        </div>
        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                {{Form::submit('Simpan', array('class'=>'btn btn-info'))}}

                                <a href="/admin/user/">
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
