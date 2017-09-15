@extends('side')
{{--<style>--}}
    {{--#here{--}}
        {{--background-color: black!important;--}}
    {{--}--}}
{{--</style>--}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
@section('data')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register Mother</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register/teacher') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                                <label for="fname" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="fname" type="text" class="form-control" name="fname" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('fname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fisrt name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                                <label for="lname" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control" name="lname" value="{{ old('Last Name') }}" required>

                                    @if ($errors->has('lname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone"  class="col-md-4 control-label">Phone Number</label>

                                <div class="col-md-6">
                                    <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                                <label  for="county" class="col-md-4 control-label">County</label>

                                <div class="col-md-6">
                                    <input id="county"  type="text" class="form-control" name="county" value="{{ old('county') }}" required autofocus>

                                    @if ($errors->has('county'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('county') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                                <label  for="district" class="col-md-4 control-label">District</label>

                                <div class="col-md-6">
                                    <input id="district"  type="text" class="form-control" name="district" value="{{ old('district') }}" required autofocus>

                                    @if ($errors->has('district'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('division') ? ' has-error' : '' }}">
                                <label  for="division" class="col-md-4 control-label">District</label>

                                <div class="col-md-6">
                                    <input id="division"  type="text" class="form-control" name="division" value="{{ old('division') }}" required autofocus>

                                    @if ($errors->has('division'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('division') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                <label  for="location" class="col-md-4 control-label">District</label>

                                <div class="col-md-6">
                                    <input id="location"  type="text" class="form-control" name="location" value="{{ old('location') }}" required autofocus>

                                    @if ($errors->has('location'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
                                <label  for="town" class="col-md-4 control-label">District</label>

                                <div class="col-md-6">
                                    <input id="town"  type="text" class="form-control" name="town" value="{{ old('town') }}" required autofocus>

                                    @if ($errors->has('town'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('village') ? ' has-error' : '' }}">
                                <label  for="town" class="col-md-4 control-label">District</label>

                                <div class="col-md-6">
                                    <input id="village"  type="text" class="form-control" name="village" value="{{ old('village') }}" required autofocus>

                                    @if ($errors->has('village'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('village') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>

                            {{--<div class="form-group{{ $errors->has('tsc') ? ' has-error' : '' }}">--}}
                                {{--<label  class="col-md-4 control-label">Tsc Number</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input  type="text" class="form-control" name="tsc_no" value="{{ old('tsc_no') }}" required autofocus>--}}

                                    {{--@if ($errors->has('tsc'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('tsc') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}




                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-6 col-md-offset-4">--}}
                                    {{--<button type="submit" class="btn btn-primary">--}}
                                        {{--Register--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        </form>
                    </div>
                </div>
            </div>
    </div>
    </div>
@endsection
<script src="/js/app.js"></script>