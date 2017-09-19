@extends('side')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
@section('data')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel panel-inverse " >
                        <div class="panel-heading" style="background-color: #28abcb" >
                            <h4 style="background-color: #28abcb"> Register Nurse </h4>

                        </div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register/user') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="firstname" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required autofocus>

                                    @if ($errors->has('fullname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="lastName" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" required autofocus>

                                    @if ($errors->has('lastName'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                                {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                                    {{--@if ($errors->has('email'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group{{ $errors->has('idnumber') ? ' has-error' : '' }}">
                                <label  class="col-md-4 control-label">Id Number</label>

                                <div class="col-md-6">
                                    <input  type="number" class="form-control" name="idno" value="{{ old('idno') }}" required autofocus>

                                    @if ($errors->has('idnumber'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('id number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label  class="col-md-4 control-label">Phone Number</label>

                                <div class="col-md-6">
                                    <input  type="number" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" style="background-color: #28abcb">
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
<script src="/js/app.js"></script>