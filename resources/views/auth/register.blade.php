@extends('layouts.app')
<style type="text/css">
    .box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 5px;
        margin-bottom:10px;
        margin-left:20px;
        color:#636b6f;
        text-align:left;
        margin-bottom: 0px;
        padding-top: 7px;
    }
    .salestock{ background:white;}
    .bigstock{ background:white;}
    .smallstock{ background:white;}
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $("#hide").hide();

            }
        });
    }).change();
});
</script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telephone_number') ? ' has-error' : '' }}">
                            <label for="telephone_number" class="col-md-4 control-label">Telephone Number</label>

                            <div class="col-md-6">
                                <input id="telephone_number" type="text" class="form-control" name="telephone_number" value="{{ old('telephone_number') }}" required>

                                @if ($errors->has('telephone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('store_type') ? ' has-error' : '' }}">
                            <label for="store_type" class="col-md-4 control-label">Store Type</label>

                            <div class="col-md-6">
                                <select class="form-control" name="store_type" value="{ old('store_type') }}" name="store_type">
                                    <option value="">Please Select Store Type ?</option>
                                    <option value="bigstock">Big Stock</option>
                                    <option value="smallstock">Small Stock</option>
                                    <option value="salestock">Sale Stock</option>
                                </select>

                                @if ($errors->has('store_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('store_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="salestock box" >
                            <label for="user_type" class="col-md-4 control-label">User Type</label>
                            <div class="col-md-6">
                                <input id="user_type" type="text" class="form-control" name="user_type" value="seller" style="margin-bottom: 20px;">
                                 @if ($errors->has('user_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="smallstock box" >
                            <label for="user_type" class="col-md-4 control-label">User Type</label>
                            <div class="col-md-6">
                                <input id="user_type" type="text" class="form-control" name="user_type" value="stocker" style="margin-bottom: 20px;">
                                 @if ($errors->has('user_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="bigstock box" >
                            <label for="user_type" class="col-md-4 control-label">User Type</label>
                            <div class="col-md-6">
                                <input id="user_type" type="text" class="form-control" name="user_type" value="stocker" style="margin-bottom: 20px;">
                                 @if ($errors->has('user_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
