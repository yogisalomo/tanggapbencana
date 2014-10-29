@extends('layouts.login')

<style>
    .top_distance {
        margin-top: 200px;
    }
</style>

@section('content')
<div class="row top_distance">
    <div class="col-lg-4 col-lg-offset-4 well">
        <h1>SuitCommerce</h1>

        {{Form::open(['route' => 'sessions.store'])}}

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
                    {{Form::captcha()}}
                    <div id="recaptcha_widget" style="display:none">

                        <div class="recaptcha_only_if_incorrect_sol" style="color:red">Incorrect please try again</div>
                        <label class="recaptcha_only_if_image control-label">Enter the words below:</label>
                        <label class="recaptcha_only_if_audio control-label">Enter the numbers you hear:</label>

                        <div class="form-group">
                            <a id="recaptcha_image" href="#"></a>
                        </div>

                        <div class="input-group">
                            <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" class="input-recaptcha form-control" tabindex="3" />
                            <span class="input-group-btn">
                                <a class="btn btn-default" href="javascript:Recaptcha.reload()"><span class="glyphicon glyphicon-refresh"></i></a>
                            </span>
                        </div><!-- /input-group -->
                    </div>
                    <div class="error">{{$errors->first('recaptcha_response_field')}}</div>
                </div>
            <div class="form-group">
                {{Form::submit('Login', ['class'=>'btn btn-primary form-control'])}}
            </div>
        <i>user: test, pass: test</i>
        {{Form::close()}}
    </div>
</div>
@stop
